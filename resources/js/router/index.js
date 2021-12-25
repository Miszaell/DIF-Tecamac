import Vue from "vue";
import VueRouter from "vue-router";
import login from "../components/auth/Login.vue";
import inicio from "../components/Inicio.vue";
import users from "../components/Users.vue";
import comunication from "../components/Comunication.vue";
import documents from "../components/Documents.vue";
import images from "../components/Images.vue";

Vue.use(VueRouter);

const routes = [
    {
        path: "/login",
        name: "login",
        component: login,
    },
    {
        path: "/home",
        name: "inicio",
        component: inicio,
        meta: { requiresAuth: true }
    },
    {
        path: "/users",
        name: "users",
        component: users,
        meta: { requiresAuth: true }
    },
    {
        path: "/comunication",
        name: "comunication",
        component: comunication,
        meta: { requiresAuth: true }
    },
    {
        path: "/images",
        name: "images",
        component: images,
        meta: { requiresAuth: true }
    },
    {
        path: "/documents",
        name: "documents",
        component: documents,
        meta: { requiresAuth: true }
    },
];

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes,
});

router.beforeEach((to, from, next) => {
    let isAuthenticated = sessionStorage.getItem("Token");

    if (to.matched.some((record) => record.meta.requiresAuth)) {
        if (!isAuthenticated) {
            next({
                path: "/login",
                params: { nextUrl: to.fullPath },
            });
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;
