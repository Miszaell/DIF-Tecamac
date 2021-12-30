<template>
    <v-app>
        <v-btn @click="prin()">print</v-btn>
        <VueTrix v-model="editorContent" localStorage />
    </v-app>
</template>

<script>
import VueTrix from "vue-trix";

export default {
    data() {
        return {
            editorContent: ""
        };
    },

    components: {
        VueTrix,
    },

    methods: {
        prin() {
            console.log(this.editorContent)
        }
    },
};
document.addEventListener("trix-file-accept", (event) => {
    event.preventDefault();
});
</script>
<style>
trix-toolbar [data-trix-button-group="file-tools"] {
    display: none;
}
</style>
