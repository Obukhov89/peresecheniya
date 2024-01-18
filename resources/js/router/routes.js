import MainPage from "../components/MainPage.vue";
import Login from "../components/portal_components/Login.vue";
import HomePage from "../components/portal_components/HomePage.vue";
import AdminPanel from "../components/portal_components/admin_panel/AdminPanel.vue";

export default [
    {
        path: '/',
        name: 'MainPage',
        component: MainPage
    },
    {
        path: "/auth/login",
        name: "Login",
        component: Login
    },
    {
        path: "/home",
        name: "HomePage",
        component: HomePage
    },
    {
        path: "/admin-panel",
        name: "AdminPanel",
        component: AdminPanel,
    },
    // {
    //     path: '/',
    //     name: 'ProjectsGreyModule',
    //     component: ProjectsGreyModule
    // },
    // {
    //     path: '/',
    //     name: 'Celebration',
    //     component: Celebration
    // }
];
