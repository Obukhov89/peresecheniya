<template>
    <div class="container">
        <form @submit.prevent="onsubmit" class="auth_form">
            <label class="label">Почта</label>
            <input class="input_form" type="text" placeholder="bard@example.com" v-model="user.email">
            <label class="label">Пароль</label>
            <input class="input_form" type="password" placeholder="secret_pass" v-model="user.password">
            <button @click="login" class="btn_orange">Войти</button>
        </form>
    </div>

</template>

<script>
import axios from "axios";
import {mapActions} from "vuex/dist/vuex.mjs";
import router from "../../router";


export default {
    name: "Login",
    data(){
        return{
            user:{
                email: '',
                password: ''
            }
        }
    },

    methods:{
        ...mapActions('auth', ['login']),

        login(){
            axios.post('/login', this.user).then((response) => {
                this.$store.dispatch('auth/login', response.data)

                sessionStorage.setItem('first_name', response.data.first_name);
                sessionStorage.setItem('last_name', response.data.last_name);
                sessionStorage.setItem('sur_name', response.data.sur_name);
                sessionStorage.setItem('id_role', response.data.id_role)
                sessionStorage.setItem('email', response.data.email)

                router.push({name: 'HomePage'})
            })
        }
    }
}
</script>

<style scoped>
    .auth_form{

        width: 550px;
        display: flex;
        flex-direction: column;
        margin: 100px auto;
        height: 41.4vh;
    }

    .label{
        margin-top: 5px;
        font-family: "Montserrat", sanr-serif;
        font-size: 16px;
        color: #4b5563;
    }

    .input_form{
        margin-top: 10px;
        height: 35px;
        padding-left: 10px;
        border: 1px solid #f8bc6e;
        border-radius: 4px;
        box-shadow: 5px 5px 5px 0px rgba(146, 146, 146, 0.3);
    }

    .btn_orange{
        font-family: "Montserrat", sanr-serif;
        font-size: 16px;
        color: #ffffff;
        box-shadow: 5px 5px 5px 0px rgba(146, 146, 146, 0.3);
        margin: 35px auto;
        width: 150px;
        height: 35px;
        border: none;
        text-transform: uppercase;
    }
</style>
