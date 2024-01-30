<template>
    <About/>
    <GetStarted/>
    <Festival></Festival>
    <Projects/>
    <food-drinks/>
    <Experts/>
    <Celebration/>
    <Footer/>
</template>

<script>
import About from "./About.vue";
import Festival from "./Festival.vue";
import FoodDrinks from "./FoodDrinks.vue";
import GetStarted from "./GetStarted.vue";
import Price from "./Price.vue";
import Projects from "./Projects.vue";
import Experts from "./Experts.vue";
import Celebration from "./Celebration.vue";
import Footer from "./Footer.vue";

export default {
    name: "MainPage",
    components: {
        Footer,
        About,
        GetStarted,
        Festival,
        Projects,
        FoodDrinks,
        Price,
        Experts,
        Celebration,
    },
};
</script>

<style scoped></style>
