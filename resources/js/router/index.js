import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        component: () => import("../components/layouts/Admin.vue"),
        children: [
            {
                path: "/login",
                name: "login",
                component: () => import("../components/auth/Login.vue"),
            },
            {
                path: "/home",
                name: "home",
                component: () => import("../components/Inicio.vue"),
                meta: { requiresAuth: true },
            },
            {
                path: "/users",
                name: "users",
                component: () => import("../components/Users.vue"),
                meta: { requiresAuth: true },
            },
            {
                path: "/user-detail",
                name: "user_detail",
                component: () => import("../components/pages/UserDetail.vue"),
                meta: { requiresAuth: true },
            },
            {
                path: "/comunication",
                name: "comunication",
                component: () => import("../components/Comunication.vue"),
                meta: { requiresAuth: true },
            },
            {
                path: "/media",
                name: "media",
                component: () => import("../components/Images.vue"),
                meta: { requiresAuth: true },
            },
            {
                path: "/image-detail",
                name: "image_detail",
                component: () => import("../components/pages/ImageDetail.vue"),
                meta: { requiresAuth: true },
            },
            {
                path: "/files",
                name: "files",
                component: () => import("../components/Documents.vue"),
                meta: { requiresAuth: true },
            },
            {
                path: "/file-detail",
                name: "file_detail",
                component: () => import("../components/pages/DocumentDetail.vue"),
                meta: { requiresAuth: true },
            },
        ],
    },
];

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes,
});

router.beforeEach((to, from, next) => {
    let isAuthenticated = localStorage.getItem("Token");

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
