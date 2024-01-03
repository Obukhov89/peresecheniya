<template>
    <div id="projects">
        <div class="container">
            <h1 class="main_title">Организаторы фестиваля</h1>
            <div class="projects__content">
                <img src="../../../public/img/sails.png">
                <img
                    src="../../../public/img/peresecheniya.png"
                    alt=""
                />
            </div>
        </div>
        <ProjectsGreyModule></ProjectsGreyModule>
    </div>
</template>

<script>
import ProjectsGreyModule from "./ProjectsGreyModule.vue";
export default {
    name: "Projects",
    components: {
        ProjectsGreyModule,
    },
};
</script>

<style scoped>
#projects {
    padding: 110px 0 90px;
}
.main_title {
    font-family: "Montserrat", sans-serif;
    font-size: 36px;
    margin-bottom: 100px;
    text-align: center;
    font-weight: 600;
    margin-bottom: 20px;
}

.main_subtitle {
    text-align: center;
    color: #222;
}
.projects__content__col1 p {
    text-align: left;
    margin: 20px 0 25px;
    padding: 0;
    color: #7d8f99;
}
.projects__content__col1 h4 {
    font-family: "Montserrat", sanr-serif;
    font-size: 24px;
    /* margin-bottom: 100px; */
}

.projects__content {
    display: flex;

    justify-content: space-between;
    gap: 30px;
    margin-top: 70px;
}
.projects_links {
    font-family: "Raleway", sans-serif;
    font-size: 16px;
    font-weight: 600;
}
.projects_links li,
a {
    padding-bottom: 10px;
    text-decoration: none;
    color: #7d8f99;
}
</style>
