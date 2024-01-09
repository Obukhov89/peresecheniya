import MainPage from "../components/MainPage.vue";
import Login from "../components/portal_components/Login.vue";
import HomePage from "../components/portal_components/HomePage.vue";

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
    // {
    //     path: "/",
    //     name: "Projects",
    //     component: Projects,
    // },
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
