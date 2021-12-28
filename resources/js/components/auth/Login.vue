<template>
    <v-app>
        <v-card
            elevation="2"
            shaped
            class="py-4"
            style="
                margin-left: 30%;
                margin-right: 30%;
                padding-right: 10%;
                padding-left: 10%;
            "
        >
            <form>
                <v-text-field
                    v-model="email"
                    :error-messages="emailErrors"
                    label="E-mail"
                    required
                    @input="$v.email.$touch()"
                    @blur="$v.email.$touch()"
                ></v-text-field>
                <v-text-field
                    v-model="password"
                    :error-messages="passwordErrors"
                    label="Password"
                    required
                    @input="$v.password.$touch()"
                    @blur="$v.password.$touch()"
                ></v-text-field>

                <div
                    style="
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    "
                >
                    <v-btn class="ma-2" @click="submit" color="success">
                        submit
                        <v-icon right dark> login </v-icon>
                    </v-btn>
                    <v-btn class="ma-2" @click="clear" color="error">
                        clear
                        <v-icon right dark> clear </v-icon>
                    </v-btn>
                </div>
            </form>
        </v-card>
    </v-app>
</template>
<script>
import { validationMixin } from "vuelidate";
import { required, email } from "vuelidate/lib/validators";
import api from "../../utils/request";
export default {
    mixins: [validationMixin],

    validations: {
        password: { required },
        email: { required, email },
        select: { required },
        checkbox: {
            checked(val) {
                return val;
            },
        },
    },

    data: () => ({
        password: "",
        email: "",
        select: null,
        checkbox: false,
    }),

    computed: {
        passwordErrors() {
            const errors = [];
            if (!this.$v.password.$dirty) return errors;
            !this.$v.password.required &&
                errors.push("La contraseña es requerida");
            return errors;
        },
        emailErrors() {
            const errors = [];
            if (!this.$v.email.$dirty) return errors;
            !this.$v.email.email && errors.push("Ingresa un e-mail válido");
            !this.$v.email.required && errors.push("El email es requerido");
            return errors;
        },
    },

    methods: {
        submit() {
            let formData = new FormData();
            formData.append("email", this.email);
            formData.append("password", this.password);
            api.login("auth/login", formData)
                .then((response) => {
                    if (response.data.access_token) {
                        localStorage.setItem("userId", response.data.user.id);
                        localStorage.setItem(
                            "Token",
                            response.data.access_token
                        );
                        localStorage.setItem(
                            "userName",
                            response.data.user.name
                        );
                        if (localStorage.getItem("Token")) {
                            this.$router.push({
                                name: "home",
                                params: { from: "login" },
                            });
                        }
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        clear() {
            this.$v.$reset();
            this.name = "";
            this.email = "";
            this.select = null;
            this.checkbox = false;
        },
    },
};
</script>
