<template>
    <v-app>
        <v-app-bar
            absolute
            color="white"
            elevate-on-scroll
            scroll-target="#scrolling-techniques-7"
        >
            <v-toolbar-title>{{ doc_title }}</v-toolbar-title>
            <v-btn text class="mx-5" @click="sendBack()">
                <v-icon>keyboard_return</v-icon>
            </v-btn>
            <v-spacer></v-spacer>
            <span v-if="showAllPages" class="mx-2">
                {{ pageCount }} página(s)
            </span>
            <span v-else>
                <v-btn icon :disabled="page <= 1" @click="page--">
                    <v-icon>arrow_back_ios</v-icon>
                </v-btn>
                {{ page }} / {{ pageCount }}
                <v-btn icon :disabled="page >= pageCount" @click="page++">
                    <v-icon>arrow_forward_ios</v-icon>
                </v-btn>
            </span>
            <v-checkbox
                v-model="showAllPages"
                label="Ver todas las páginas"
                color="pink"
                class="right"
                hide-details
            ></v-checkbox>
        </v-app-bar>
        <v-sheet
            id="scrolling-techniques-7"
            class="overflow-y-auto"
            color="grey lighten-2"
            max-height="900"
        >
            <v-container style="height: 1500px">
                <div class="app-content" style="background: #e1e1e1">
                    <vue-pdf-embed
                        ref="pdfRef"
                        :source="pdfSource"
                        :page="page"
                        @rendered="handleDocumentRender"
                    />
                </div>
            </v-container>
        </v-sheet>
    </v-app>
</template>

<script>
import VuePdfEmbed from "vue-pdf-embed/dist/vue2-pdf-embed";

export default {
    components: {
        VuePdfEmbed,
    },
    data() {
        return {
            isLoading: true,
            page: null,
            doc_dta: {},
            pageCount: 1,
            pdfSource: "",
            doc_title: "Document",
            showAllPages: true,
        };
    },
    watch: {
        showAllPages() {
            this.page = this.showAllPages ? null : 1;
        },
    },

    mounted() {
        this.validate();
    },

    methods: {
        handleDocumentRender() {
            this.pageCount = this.$refs.pdfRef.pageCount;
        },
        handlePasswordRequest(callback, retry) {
            callback(prompt(retry ? "Enter password again" : "Enter password"));
        },
        validate() {
            if (this.$route.params.url) {
                if (this.$route.params.preview == "on") {
                    this.pdfSource = this.$route.params.url;
                } else {
                    this.pdfSource = this.$route.params.doc.document;
                }
                this.doc_dta = this.$route.params.doc;
                this.doc_title = this.$route.params.doc.name;
            } else {
                this.$router.push({ path: "file-detail" });
            }
        },
        sendBack() {
            this.$router.push({
                name: "file_detail",
                params: { doc: this.doc_dta, action: "put" },
            });
        },
    },
};
</script>
