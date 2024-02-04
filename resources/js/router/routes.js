import MainPage from "../components/MainPage.vue";
import Login from "../components/portal_components/Login.vue";
import HomePage from "../components/portal_components/HomePage.vue";
import AdminPanel from "../components/portal_components/admin_panel/AdminPanel.vue";
import CompositionPage from "../components/portal_components/compositions/CompositionPage.vue";
import PageContests from "../components/portal_components/contests/PageContests.vue";
import ItemContest from "../components/portal_components/contests/ItemContest.vue";

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
    },
    {
        path: '/admin-panel/contests',
        name: 'ContestsAdmin',
        component: PageContests
    },
    {
        path: '/contest/:contest_id?/',
        name: 'ItemContest',
        component: ItemContest,
        props: {
            contest_id: 1
        }
    }
];
