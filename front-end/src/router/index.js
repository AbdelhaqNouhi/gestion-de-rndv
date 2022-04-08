import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import Reservation from "../components/Reservation.vue";
import Sing_up from "../components/Sing_up.vue";
import Dashboardadmin from "../components/Dashboardadmin.vue";

const routes = [
    {
        path: "/",
        name: "home",
        component: HomeView,
    },
    {
        path: "/reservation",
        name: "Reservation",
        component: Reservation,
    },
    {
        path: "/sing_up",
        name: "Sing_up",
        component: Sing_up,
    },
    {
        path: "/Dashboardadmin",
        name: "Dashboardadmin",
        component: Dashboardadmin,
    }
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;
