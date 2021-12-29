<template>
    <v-app>
        <v-card elevation="2" shaped class="pa-4">
            <v-toolbar flat>
                <v-icon class="mr-2">drive_folder_upload</v-icon>
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
                        v-model="name"
                        :disabled="isEditing"
                    ></v-text-field>
                    <div
                        class="d-flex flex-column justify-space-between align-center mb-5"
                    >
                        <span v-if="record">Ver documento</span>
                        <v-btn
                            color="success"
                            fab
                            x-large
                            v-if="record"
                            dark
                            @click="readDoc()"
                        >
                            <v-icon x-large>description</v-icon>
                        </v-btn>
                    </div>
                </v-col>
                <v-col class="py-5">
                    <v-file-input
                        v-model="media"
                        :disabled="isEditing"
                        @change="onDocChange()"
                        accept="application/pdf"
                        placeholder="Inserta un documento"
                        class="mb-5"
                        color="pink"
                        label="Documento"
                        show-size
                        prepend-icon="upload_file"
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
                    <v-btn
                        color="green darken-2"
                        class="mx-3 white--text"
                        @click="sendTo()"
                        v-show="!isEditing"
                    >
                        Guardar
                        <v-icon right dark> mdi-cloud-upload </v-icon>
                    </v-btn>
                    <v-btn
                        color="error"
                        class="mx-3 white--text"
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
                        class="mx-3 white--text"
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
            titulo: "Subir documento",
            message: "",
            isEditing: false,
            color: "",
            snackbar: false,
            loader: null,
            loading: false,
            enableDelete: true,
            width: 500,
            record: {},
            name: "",
            location: "",
            media: [],
            preview: this.img,
            doc_preview: "off",
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
        doc: function () {
            return this.preview;
        },
    },

    mounted() {
        this.getImage();
    },

    methods: {
        getImage() {
            if (this.$route.params.action !== "post") {
                this.record = this.$route.params.doc;
                if (this.record.id) {
                    this.isEditing = true;
                    this.titulo = "Actualizar datos del documento";
                    let document = this.record.document;
                    if (document) {
                        this.preview = this.record.document;
                    }
                    this.name = this.record.name;
                    this.location = this.record.location;
                } else {
                    this.isEditing = false;
                    this.titulo = "Subir documento";
                    this.preview =
                        "https://cdn.vuetifyjs.com/images/parallax/material.jpg";
                }
            }
        },

        readDoc() {
            this.$router.push({
                name: "read_pdf",
                params: { doc: this.record, url: this.preview, preview: this.doc_preview},
            });
        },

        onDocChange() {
            this.preview = "";
            const files = this.media;
            if (files) {
                this.doc_preview = "on"
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

            formData.append("name", this.name);
            formData.append("document", this.media);

            api.post("admin/docs/post", formData)
                .then((response) => {
                    if (response.data.detail == "success") {
                        this.$router.push({ path: "files" });
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
            formData.append("name", this.name);

            if (this.media) {
                formData.append("document", this.media);
            }

            api.post("admin/docs/put", formData)
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

            api.post("admin/docs/delete", formData)
                .then((response) => {
                    if (response.data.detail == "success") {
                        this.$router.push({ path: "files" });
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
            this.$router.push({ path: "files" });
        },
    },
};
</script>
