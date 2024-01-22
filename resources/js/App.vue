<template>
    <Header/>
    <router-view />

</template>

<script>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
import {mapActions} from "vuex/dist/vuex.mjs";

export default {
    name: "App",
    components: { Footer, Header },
    created(){
        this.setStore()
    },
    methods:{
        ...mapActions('auth', ['login']),

        setStore(){
            let payload = {
                first_name: sessionStorage.getItem('first_name'),
                last_name: sessionStorage.getItem('last_name'),
                sur_name: sessionStorage.getItem('sur_name'),
                id_role:Number(sessionStorage.getItem('id_role')),
                email: sessionStorage.getItem('email'),
                id_user: sessionStorage.getItem('id_user')
            }
            this.$store.dispatch('auth/login', payload)
        }
    },


};
</script>

<style scoped></style>
