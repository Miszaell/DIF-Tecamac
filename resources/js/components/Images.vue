<template>
    <v-app style="background: transparent">
        <v-card-title>
            Imágenes
            <v-spacer></v-spacer>
            <v-btn
                color="green darken-2"
                class="ma-2 white--text"
                @click="newImage()"
            >
                Nuevo
                <v-icon right dark> add_photo_alternate </v-icon>
            </v-btn>
        </v-card-title>
        <v-tabs right show-arrows>
            <v-tab> <v-icon left>account_tree</v-icon>Tabla de regisrtos</v-tab>
            <v-tab
                ><v-icon left>collections_bookmark</v-icon>Vista de galeria
            </v-tab>
            <v-tab-item>
                <div style="display: flex; align-items: flex-end">
                    <div style="width: 70%"></div>
                    <v-text-field
                        v-model="search"
                        append-icon="mdi-magnify"
                        label="Search"
                        single-line
                        hide-details
                        class="ma-2"
                        style="max-width: 30%"
                    ></v-text-field>
                </div>
                <v-data-table
                    :headers="headers"
                    :items="records"
                    :sort-by="['Nombre']"
                    :search="search"
                    :loading="loading"
                    @click:row="updateImage"
                    multi-sort
                    class="elevation-1"
                ></v-data-table>
            </v-tab-item>

            <v-tab-item>
                <galleryComponent :records="records" />
            </v-tab-item>
        </v-tabs>
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
import api from "../utils/request";
import galleryComponent from "./pages/Gallery.vue";
export default {
    name: "images",

    components: {
        galleryComponent,
    },

    data() {
        return {
            message: "",
            search: "",
            records: [],
            gelleryData: {},
            color: "",
            loading: true,
            snackbar: false,
            headers: [
                {
                    text: "ID",
                    align: "start",
                    sortable: false,
                    value: "id",
                },
                { text: "Nombre", value: "title" },
                { text: "Posición", value: "location" },
                { text: "Imagen", value: "image" },
            ],
        };
    },

    mounted() {
        this.getRecords();
    },
    methods: {
        newImage() {
            this.$router.push({
                name: "image_detail",
                params: { action: "post" },
            });
        },

        updateImage(row) {
            this.records.map((item, index) => {
                item.selected = item === row;
                this.$set(this.records, index, item);
            });
            this.$router.push({
                name: "image_detail",
                params: { action: "put", user: row },
            });
        },

        getRecords() {
            this.loading = true;
            api.get("admin/images/getAll")
                .then((response) => {
                    this.records = response.data;
                    this.gelleryData = response.data;
                    this.loading = false;
                })
                .catch((error) => {
                    this.message = "No se pudieron recuperar los registros";
                    this.color = "red";
                    this.snackbar = true;
                    console.error(error);
                });
        },
    },
};
</script>
