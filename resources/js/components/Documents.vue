<template>
    <v-app style="background: transparent">
        <v-card-title>
            Documentos
            <v-spacer></v-spacer>
            <v-text-field
                v-model="search"
                append-icon="mdi-magnify"
                label="Search"
                single-line
                hide-details
            ></v-text-field>
        </v-card-title>
        <v-data-table
            :headers="headers"
            :items="documents"
            :sort-by="['Nombre']"
            :search="search"
            :loading="loading"
            @click:row="updateDoc"
            multi-sort
            class="elevation-1"
        ></v-data-table>
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
export default {
    data() {
        return {
            message: "",
            search: "",
            documents: [],
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
                { text: "Nombre", value: "name" },
                { text: "Documento", value: "document" },
            ],
        };
    },

    mounted() {
        this.getDocuments();
    },
    methods: {
        newDoc() {
            this.$router.push({
                name: "file_detail",
                params: { action: "post" },
            });
        },


        updateDoc(row) {
            this.documents.map((item, index) => {
                item.selected = item === row;
                this.$set(this.documents, index, item);
            });
            this.$router.push({
                name: "file_detail",
                params: { action: "put", doc: row },
            });
        },

        getDocuments() {
            this.loading = true;
            api.get("admin/documents/getAll")
                .then((response) => {
                    this.documents = response.data;
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
