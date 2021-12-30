<template>
    <v-app>
        <v-app-bar style="background: #d4447c" dark prominent>
            <v-app-bar-nav-icon
                v-if="$route.name !== 'login'"
                @click.stop="drawer = !drawer"
            ></v-app-bar-nav-icon>

            <v-toolbar-title>
                <v-img
                    src="./assets/images/logo.png"
                    style="width: 15%"
                ></v-img>
            </v-toolbar-title>
        </v-app-bar>

        <div v-if="$route.name !== 'login'">
            <v-navigation-drawer
                v-model="drawer"
                absolute
                temporary
                bottom
                style="background: #d4447c"
                dark
            >
                <v-list>
                    <v-list-item
                        v-for="item in items"
                        :key="item.title"
                        v-bind:to="item.to"
                    >
                        <v-list-item-icon>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>{{
                                item.title
                            }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <div class="pa-2">
                        <v-btn block @click="logout()"> Logout </v-btn>
                    </div>
                </v-list>
            </v-navigation-drawer>
        </div>

        <v-main style="padding: 30px;">
            <router-view />
        </v-main>
    </v-app>
</template>
<script>
import api from "../../utils/request";
export default {
    data: () => ({
        drawer: false,
        options: false,
        items: [
            { title: "Inicio", icon: "mdi-view-dashboard", to: "home" },
            { title: "Imágenes", icon: "mdi-image-filter", to: "media" },
            {
                title: "Documentos",
                icon: "mdi-file-document-outline",
                to: "files",
            },
            { title: "Comunicación", icon: "campaign", to: "comunication" },
            { title: "Usuarios", icon: "people", to: "users" },
        ],
        user: {
            name: function(){
                return localStorage.getItem("userName")
            },
            id: null,
        },
    }),

    mounted() {
        this.updateUser();
    },

    watch: {
        group() {
            this.drawer = false;
        },
    },

    methods: {
        updateUser() {
            this.user.name = localStorage.getItem("userName");
            this.user.id = localStorage.getItem("userId");
        },

        logout() {
            api.logout();
        },
    },
};
</script>
