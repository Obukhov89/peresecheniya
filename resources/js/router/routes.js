import MainPage from "../components/MainPage.vue";
import Login from "../components/portal_components/Login.vue";
import HomePage from "../components/portal_components/HomePage.vue";
import AdminPanel from "../components/portal_components/admin_panel/AdminPanel.vue";
import CompositionPage from "../components/portal_components/compositions/CompositionPage.vue";

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
    {
        path: "/composition-page/:author_id?/:composition_id?",
        name: "CompositionPage",
        component: CompositionPage,
        props: {
            author_id: 1
        }
    }
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
