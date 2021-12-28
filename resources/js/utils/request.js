import axios from "axios";
localStorage.setItem("url", "http://127.0.0.1:8000/api/");
const server = localStorage.getItem("url");

export default {
    login(url, params) {
        // Loading.show({
        //   spinner: QSpinnerTail,
        //   spinnerColor: "blue-grey-8",
        //   message: "Iniciando sesión...",
        // });
        return axios
            .post(server + url, params, {
                headers: { "Content-Type": "multipart/form-data" },
            })
            .then((response) => {
                // Loading.hide();
                // Notify.create({
                //   position: "top-right",
                //   type: "positive",
                //   message: "Bienvenido " + response.data.user.name,
                //   color: "#141536",
                // });
                return response;
            })
            .catch(function (error) {
                // Loading.hide();
                if (error.message == "Network Error") {
                    sessionStorage.setItem("login_status", error.message);
                    //   Notify.create({
                    //     type: "negative",
                    //     position: "top-right",
                    //     message:
                    //       "No se pudo conectar con el servidor, revisa tu conexión a internet o intentalo de nuevo mas tarde",
                    //   });
                } else if (error.response.status >= 400) {
                    sessionStorage.setItem("login_status", error.message);
                    if (error.response.status === 401) {
                        // Notify.create({
                        //   type: "negative",
                        //   position: "top-right",
                        //   message: "Usuario y/o contraseña incorrectos",
                        // });
                    } else {
                        // Notify.create({
                        //   type: "negative",
                        //   position: "top-right",
                        //   message: error.message + " " + error.response.data.message + "",
                        // });
                    }
                    console.log(
                        error.message + " " + error.response.data.message + ""
                    );
                } else {
                    sessionStorage.setItem("login_status", error.message);
                    //   Notify.create({
                    //     type: "negative",
                    //     position: "top-right",
                    //     message: "El servidor envió una respuesta inválida",
                    //   });
                }
                return error;
            });
    },

    logout() {
        axios
            .get(server + "auth/logout", {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("Token")}`,
                    "Content-Type": "application/json",
                },
            })
            .then((response) => {
                localStorage.clear();
                window.location.href = "/";
                return response;
            })
            .catch(function (error) {
                return error;
            });
    },

    get(url, params) {
        return axios
            .get(server + url, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("Token")}`,
                    "Content-Type": "application/json",
                },
                params: params,
            })
            .then((response) => {
                return Promise.resolve(response);
            })
            .catch(function (error) {
                if (error.message == "Network Error") {
                    // Notify.create({
                    //     type: "negative",
                    //     position: "top-right",
                    //     message:
                    //         "No se pudo conectar con el servidor, revisa tu conexión a internet o intentalo de nuevo mas tarde",
                    // });
                    console.log(
                        error.message + " " + error.response.data.message + ""
                    );
                } else if (error.response.status >= 400) {
                    if (error.response.status === 401) {
                        // Notify.create({
                        //     type: "negative",
                        //     position: "top-right",
                        //     message: error.response,
                        // });
                    } else {
                        // Notify.create({
                        //     type: "negative",
                        //     position: "top-right",
                        //     message:
                        //         error.message +
                        //         " " +
                        //         error.response.data.message +
                        //         "",
                        // });
                    }
                    console.log(
                        error.message + " " + error.response.data.message + ""
                    );
                } else {
                    // Notify.create({
                    //     type: "negative",
                    //     position: "top-right",
                    //     message: "El servidor envió una respuesta inválida",
                    // });
                }
                return error;
            });
    },

    post(url, params) {
        return axios
            .post(server + url, params, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("Token")}`,
                    "Content-Type": "application/json",
                },
            })
            .then((response) => {
                if (response.data == "incorrect password") {
                } else {
                    return response;
                }
            })
            .catch(function (error) {
                if (error.message == "Network Error") {
                    sessionStorage.setItem("status", error.message);
                } else if (error.response.status >= 400) {
                    sessionStorage.setItem("status", error.message);
                    if (error.response.status === 401) {
                    } else {
                    }
                    console.log(
                        error.message + " " + error.response.data.message + ""
                    );
                } else {
                    sessionStorage.setItem("status", error.message);
                }
                return error;
            });
    },

    put(url, params) {
        return axios
            .post(server + url, params, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("Token")}`,
                    "Content-Type": "application/json",
                },
            })
            .then((response) => {
                if (response.data == "incorrect password") {
                } else {
                    return response;
                }
            })
            .catch(function (error) {
                if (error.message == "Network Error") {
                    sessionStorage.setItem("status", error.message);
                } else if (error.response.status >= 400) {
                    sessionStorage.setItem("status", error.message);
                    if (error.response.status === 401) {
                    } else {
                    }
                    console.log(
                        error.message + " " + error.response.data.message + ""
                    );
                } else {
                    sessionStorage.setItem("status", error.message);
                }
                return error;
            });
    },
};
