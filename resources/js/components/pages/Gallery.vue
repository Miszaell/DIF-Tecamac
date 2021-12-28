<template>
    <v-row>
        <v-col v-for="item in records.slice().reverse()" :key="item.id" class="d-flex child-flex" cols="4">
            <v-img
                :src="server + item.image"
                :lazy-src="server + item.image"
                aspect-ratio="1"
                class="grey lighten-2"
                @click="updateImage(item)"
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
    name: "Gallery",

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
    },
};
</script>
