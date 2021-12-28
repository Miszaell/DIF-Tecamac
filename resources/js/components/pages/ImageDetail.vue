<template>
    <v-app>
        <v-card elevation="2" shaped class="pa-4">
            <v-toolbar flat>
                <v-icon class="mr-2">insert_photo</v-icon>
                <v-toolbar-title class="font-weight-light">
                    {{ titulo }}
                </v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn color="pink" fab small @click="isEditing = !isEditing">
                    <v-icon v-if="!isEditing" color="white"> mdi-close </v-icon>
                    <v-icon v-else color="white"> mdi-pencil </v-icon>
                </v-btn>
            </v-toolbar>
            <v-row>
                <v-col>
                    <v-text-field
                        label="Nombre"
                        color="pink"
                        v-model="title"
                        :disabled="isEditing"
                    ></v-text-field>
                    <v-autocomplete
                        v-model="location"
                        :disabled="isEditing"
                        :items="items"
                        color="pink"
                        hide-no-data
                        hide-selected
                        item-text="description"
                        item-value="value"
                        label="Ubicación de la imágen"
                        placeholder="Comienza a escribir para elegir"
                        prepend-icon="image_search"
                        return-object
                    ></v-autocomplete>
                </v-col>
                <v-col>
                    <v-file-input
                        v-model="media"
                        :disabled="isEditing"
                        @change="onImageChange()"
                        placeholder="Inserta una imágen"
                        color="pink"
                        label="Imágen"
                        show-size
                        prepend-icon="add_photo_alternate"
                    >
                        <template v-slot:selection="{ text }">
                            <v-chip
                                color="deep-purple accent-4"
                                dark
                                label
                                small
                            >
                                {{ text }}
                            </v-chip>
                        </template>
                    </v-file-input>
                    <v-card elevation="2" shaped class="pa-2">
                        <div
                            class="d-flex flex-column justify-space-between align-center"
                        >
                            <v-slider
                                v-model="width"
                                class="align-self-stretch"
                                min="400"
                                max="800"
                                color="pink"
                                step="1"
                            ></v-slider>

                            <v-img
                                :aspect-ratio="16 / 9"
                                :width="width"
                                min-height="350"
                                :src="preview"
                            >
                                <template v-slot:placeholder>
                                    <v-row
                                        class="fill-height ma-0"
                                        align="center"
                                        justify="center"
                                    >
                                        <v-progress-circular
                                            indeterminate
                                            color="pink darken-5"
                                        ></v-progress-circular>
                                    </v-row>
                                </template>
                            </v-img>
                        </div>
                    </v-card>
                    <v-btn
                        color="green darken-2"
                        class="ma-2 white--text"
                        @click="sendTo()"
                        v-show="!isEditing"
                    >
                        Guardar
                        <v-icon right dark> mdi-cloud-upload </v-icon>
                    </v-btn>
                    <v-btn
                        color="error"
                        class="ma-2 white--text"
                        @click="del()"
                        v-show="!isEditing"
                        :disabled="isEditing"
                        v-if="record"
                    >
                        Eliminar
                        <v-icon right dark> delete_forever </v-icon>
                    </v-btn>

                    <v-btn
                        color="blue"
                        class="ma-2 white--text"
                        @click="cancel()"
                    >
                        Cancelar
                        <v-icon right dark> backspace </v-icon>
                    </v-btn>
                </v-col>
            </v-row>
        </v-card>
        <v-snackbar
            :timeout="2000"
            v-model="snackbar"
            shaped
            prominent
            border="bottom"
            :color="color"
            style="position: fixed; z-index: 2000; top: 25%"
            right
            top
        >
            {{ message }}
        </v-snackbar>
    </v-app>
</template>

<script>
import api from "../../utils/request";
export default {
    data() {
        return {
            titulo: "Subir imágen",
            message: "",
            isEditing: false,
            color: "",
            snackbar: false,
            loader: null,
            loading: false,
            enableDelete: true,
            width: 500,
            record: null,
            title: "",
            location: "",
            media: [],
            preview: "https://cdn.vuetifyjs.com/images/parallax/material.jpg",
            items: [
                {
                    description: "Banner",
                    value: "banner",
                },
                {
                    description: "Nosotros",
                    value: "nosotros",
                },
                {
                    description: "Galería",
                    value: "galeria",
                },
                {
                    description: "Segundo banner",
                    value: "segundoBanner",
                },
                {
                    description: "Misión",
                    value: "mision",
                },
                {
                    description: "Visión",
                    value: "vision",
                },
            ],
        };
    },

    computed: {
        img: function () {
            return this.preview;
        },
    },

    mounted() {
        this.getImage();
    },

    methods: {
        getImage() {
            if (this.$route.params.action !== "post") {
                this.record = this.$route.params.user;
                if (this.record.id) {
                    this.isEditing = true;
                    this.titulo = "Actualizar datos de la imágen";
                    let url = localStorage.getItem("url").split("/api/")[0];
                    let image = this.record.image;
                    if (image) {
                        this.preview = url + this.record.image;
                    }
                    this.title = this.record.title;
                    this.location = this.record.location;
                }
            }
            if (!this.record.id) {
                this.isEditing = false;
                this.titulo = "Subir imágen";
                this.preview =
                    "https://cdn.vuetifyjs.com/images/parallax/material.jpg";
            }
        },

        onImageChange() {
            this.preview =
                "https://cdn.vuetifyjs.com/images/parallax/material.jpg";
            const files = this.media;
            if (files) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.preview = e.target.result;
                };
                reader.readAsDataURL(files);
            }
        },

        sendTo() {
            if (this.$route.params.action == "put") {
                this.put();
            } else {
                this.post();
            }
        },

        post() {
            this.isEditing = true;
            let formData = new FormData();

            formData.append("title", this.title);
            formData.append("location", this.location.value);
            formData.append("image", this.media);

            api.post("admin/images/post", formData)
                .then((response) => {
                    if (response.data.detail == "success") {
                        this.$router.push({ path: "media" });
                    } else {
                        this.message = "Opps, ha ocurrido un error inesperado";
                        this.color = "error";
                        this.snackbar = true;
                    }
                })
                .catch((error) => {
                    console.error(error);
                });
        },

        put() {
            let formData = new FormData();

            formData.append("_method", "PUT");
            formData.append("id", this.record.id);
            formData.append("title", this.title);

            if (typeof this.location == "object") {
                formData.append("location", this.location.value);
            } else {
                formData.append("location", this.location);
            }

            if (this.media) {
                formData.append("image", this.media);
            }

            api.post("admin/images/put", formData)
                .then((response) => {
                    if (response.data.detail == "success") {
                        this.isEditing = true;
                        this.message =
                            "La información fué guardada exitosamente";
                        this.color = "green";
                        this.snackbar = true;
                    } else {
                        this.message = "Opps, ha ocurrido un error inesperado";
                        this.color = "error";
                        this.snackbar = true;
                    }
                })
                .catch((error) => {
                    console.error(error);
                });
        },

        del() {
            let formData = new FormData();
            formData.append("_method", "delete");
            formData.append("id", this.record.id);

            api.post("admin/images/delete", formData)
                .then((response) => {
                    if (response.data.detail == "success") {
                        this.$router.push({ path: "media" });
                    } else {
                        this.message = "Opps, ha ocurrido un error inesperado";
                        this.color = "error";
                        this.snackbar = true;
                    }
                })
                .catch((error) => {
                    console.error(error);
                });
        },

        cancel() {
            this.record = null;
            this.$router.push({ path: "media" });
        },
    },
};
</script>
