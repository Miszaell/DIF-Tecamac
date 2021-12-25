<template>
    <v-app>
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

            <v-btn class="mr-4" @click="submit"> submit </v-btn>
            <v-btn @click="clear"> clear </v-btn>
        </form>
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
            !this.$v.password.required && errors.push("La contraseña es requerida");
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
                        sessionStorage.setItem("userId", response.data.user.id);
                        sessionStorage.setItem("Token", response.data.access_token);
                        sessionStorage.setItem("userName", response.data.user.name);
                        if(sessionStorage.getItem("Token")){
                            window.location.href = "home";
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
