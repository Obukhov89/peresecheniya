import Festival from "../components/Festival.vue";
import Projects from "../components/Projects.vue";
import ProjectsGreyModule from '../components/ProjectsGreyModule.vue'
import Celebration from '../components/Celebration.vue'
export default [
    {
        path: "/",
        name: "Festival",
        component: Festival
    },
    {
        path: "/",
        name: "Projects",
        component: Projects,
    },
    {
        path: '/',
        name: 'ProjectsGreyModule',
        component: ProjectsGreyModule
    },
    {
        path: '/',
        name: 'Celebration',
        component: Celebration
    }
];
