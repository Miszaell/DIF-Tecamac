<template>
    <v-row>
        <v-col v-for="item in records.slice().reverse()" :key="item.id" class="d-flex child-flex pa-5" cols="4">
            <v-img
                src="/assets/images/others/preview-doc.jpeg"
                lazy-src="/assets/images/others/preview-doc.jpeg"
                aspect-ratio="1"
                class="grey lighten-2 pa-5"
                @click="updateDoc(item)"
                style="cursor:pointer;"
            >
                <template v-slot:placeholder>
                    <v-row
                        class="fill-height ma-0"
                        align="center"
                        justify="center"
                    >
                        <v-progress-circular
                            indeterminate
                            color="grey lighten-5"
                        ></v-progress-circular>
                    </v-row>
                </template>
            </v-img>
        </v-col>
    </v-row>
</template>

<script>
export default {
    name: "GalleryDocs",

    props: {
        records: {
            type: Array,
            require: true,
        },
    },

    data() {
        return {
            server: "",
            url: "",
        };
    },

    mounted() {
        this.getData()
    },

    methods: {
        getData() {
            let getServer = localStorage.getItem("url").split("/api/")[0];

            if(getServer) {
                this.server = getServer;
            }
        },

        updateDoc(row) {
            this.records.map((item, index) => {
                item.selected = item === row;
                this.$set(this.records, index, item);
            });
            this.$router.push({
                name: "file_detail",
                params: { action: "put", doc: row },
            });
        },
    },
};
</script>
