<template>
    <Header />
    <MainPage />

    <!-- <Footer /> -->
</template>

<script>
import Header from "./components/Header.vue";
import MainPage from "./components/MainPage.vue";
import Footer from "./components/Footer.vue";
// console.log("here");
export default {
    name: "App",
    components: { Footer, MainPage, Header },
};
</script>

<style scoped></style>
