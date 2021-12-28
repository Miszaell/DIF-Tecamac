<template>
    <v-app>
        <v-card elevation="2" shaped class="pa-4">
            <v-row>
                <v-col>
                    <v-text-field
                        label="Nombre"
                        :rules="nameRules"
                        v-model="name"
                    ></v-text-field>
                    <v-text-field
                        label="Password"
                        :rules="nameRules"
                        v-model="password"
                        :disabled="disablePassword"
                    ></v-text-field>
                </v-col>
                <v-col>
                    <v-text-field
                        label="Email"
                        :rules="emailRules"
                        v-model="email"
                    ></v-text-field>
                    <v-btn
                        color="green darken-2"
                        class="ma-2 white--text"
                        @click="sendTo()"
                    >
                        Guardar
                        <v-icon right dark> mdi-cloud-upload </v-icon>
                    </v-btn>

                    <v-btn
                        color="error"
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
    name: "user_detail",
    data() {
        return {
            message: "",
            color: "",
            snackbar: false,
            loader: null,
            loading: false,
            record: [],
            disablePassword: false,
            name:null,
            email:null,
            password:null,
            nameRules: [(value) => !!value || "Required."],
            emailRules: [
                (value) => !!value || "Required.",
                (value) => {
                    const pattern =
                        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return pattern.test(value) || "Invalid e-mail.";
                },
            ],
        };
    },

    mounted() {
        this.getUser();
    },

    methods: {
        getUser() {
            if (this.$route.params.action !== "post") {
                this.record = this.$route.params.user;
                this.name = this.record.name
                this.email = this.record.email

            }
        },

        sendTo(){
            if (this.$route.params.action == "put") {
                this.put()
            } else {
                this.post()
            }
        },

        put() {
            let formData = new FormData();
            formData.append("_method", "PUT");
            formData.append("id", this.record.id);
            formData.append("name", this.name);
            formData.append("email", this.email);
            api.put("admin/users/put", formData).then((response) => {
                if (response.data.detail == "success") {
                    this.message = "Acción exitosa";
                    this.color = "green";
                    this.snackbar = true;
                }
            });
        },

        post() {
            let formData = new FormData();
            formData.append("name", this.name);
            formData.append("email", this.email);
            formData.append("password", this.password);
            api.post("admin/users/post", formData).then((response) => {
                if (response.data.detail == "success") {
                    this.message = "Acción exitosa";
                    this.color = "green";
                    this.snackbar = true;
                }
            });
        },

        cancel() {
            this.record = {};
            this.$router.push({ path: "users" });
        },
    },
};
</script>
