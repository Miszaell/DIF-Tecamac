<template>
    <v-app style="background: transparent">
        <v-card-title>
            Com
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
            :items="records"
            :sort-by="['Nombre']"
            :search="search"
            :loading="loading"
            @click:row="test"
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
            records: [],
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
                { text: "Titulo", value: "title" },
                { text: "Descripción", value: "description" },
            ],
        };
    },

    mounted() {
        this.getRecords();
    },
    methods: {
        test(row) {
            this.records.map((item, index) => {
                item.selected = item === row;
                this.$set(this.records, index, item);
            });

            this.$router.push({name: "comunication_detail", params: { action: "put", record: row }});
        },

        getRecords() {
            this.loading = true;
            api.get("admin/comunicacion/getAll")
                .then((response) => {
                    this.records = response.data;
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
