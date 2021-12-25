require('./bootstrap');

window.Vue = require('vue').default;

import Vuetify from "../plugins/vuetify";
import router from "./router";


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// const app = new Vue({
//     vuetify: Vuetify,
//     el: '#app',
// });


const app = new Vue({
    vuetify: Vuetify,
    el: "#app-admin",
    router,
});
