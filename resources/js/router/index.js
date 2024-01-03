import { createWebHistory, createRouter } from "vue-router";
import routes from "./routes.js";

import MainPage from "../components/MainPage.vue";

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition;
        }
        if (to.hash) {
            return { el: to.hash };
        }
        return { x: 0, y: 0 };
    }

});

router.addRoute("/", { path: "/", component: MainPage });

export default router;
