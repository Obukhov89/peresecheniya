<template>
    <div id="projects">
        <div class="container">
            <h1 class="main_title">BIRTHDAY PARTIES IN OUR PROJECTS</h1>
            <p class="main_subtitle">
                You will remember this wonderful holiday!
            </p>
            <div class="projects__content">
                <div class="projects__content__col1">
                    <h4>You will remember this wonderful holiday</h4>
                    <p class="main_subtitle">
                        Neque porro quisquam est, qui dolorem ipsum quia dolor
                        sit amet, te consec tetur, adipisci velit, sed quia non
                        numquam eius modi tempora incidunt ut labore et dolore
                        magnam aliquam quaerat voluptatem. tempora incidunt ut
                        labore et dolore magnam aliquam quaerat.
                    </p>
                    <div class="projects_links">
                        <li>
                            <a href=""
                                >You will remember this wonderful holiday!</a
                            ><br />
                        </li>
                        <li>
                            <a href=""
                                >Let’s arrange an unforgettable birthday!</a
                            ><br />
                        </li>
                        <li>
                            <a href="">
                                Interesting entertainment attractions, and
                                balloons are waiting for you!
                            </a>
                        </li>
                    </div>
                </div>
                <img
                    src="../../../public/img/projectsBaloons.jpg"
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
