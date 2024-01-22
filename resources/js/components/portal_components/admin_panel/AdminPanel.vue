<template>
    <div class="container">
        <p class="header_request">Заявки на регистрацию</p>
        <table class="request_table" v-if="this.arr_data.length !== null ">
            <tr v-for="(request, number) in arr_data" :key="request.id">
                <td class="count_request">{{number + 1}}</td>
                <td class="name_request">{{request.name}}</td>
                <td class="role_request">{{request.name_role}}</td>
                <td class="email_request">{{request.email}}</td>
                <td class="container_btn"><button @click="accept(request.id)" class="accept_btn">Принять</button></td>
                <td class="container_btn"><button @click="reject(request.id)" class="reject_btn">Отклонить</button></td>
            </tr>
        </table>
        <p v-else>Очередь пуста</p>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "AdminPanel",
    data(){
        return{
            arr_data: []
        }
    },
    methods:{
        get_turn(){
            axios.get('/get_turn_request').then((response) => {
                this.arr_data = response.data
            })
        },
        accept(id){
            let data = {
                id_request: id
            }
            axios.post('/request_accept', data).then((response) => {
                this.arr_data = this.arr_data.filter(item => item.id !== id)
            })
        },
        reject(id){
            let data ={
                id_request:id
            }
            axios.post('/request_reject', data).then((response) => {
                this.arr_data = this.arr_data.filter(item => item.id !== id)
            })
        }
    },
    beforeMount() {
        this.get_turn()
    }
}
</script>

<style scoped>
    .header_request{
        text-align: center;
        font-family: Montserrat, sans-serif;
        font-size: 25px;
        color: #a0aec0;
    }
    .request_table{
        border-collapse: collapse;
        margin: 20px auto;
        width: 100%;
    }
    .request_table tr{
        height: 80px;
        border-bottom: 1px solid lightgrey;
    }
    .count_request{
        width: 60px;
        text-align: center;
        font-family: Montserrat, sans-serif;
        font-size: 18px;
    }
    .name_request{
        width: 300px;
        text-align: center;
        font-family: Montserrat, sans-serif;
        font-size: 18px;
    }
    .role_request{
        width: 100px;
        text-align: center;
        font-family: Montserrat, sans-serif;
        font-size: 18px;
    }
    .email_request{
        width: 100px;
        text-align: center;
        font-family: Montserrat, sans-serif;
        font-size: 16px;
    }
    .container_btn{
        text-align: center;
    }
    .accept_btn{
        width: 140px;
        height: 40px;
        background-color: #ffa51d;
        border: none;
        color: #eeeeee;
        border-radius: 3px;
    }
    .reject_btn{
        width: 140px;
        height: 40px;
        background-color: #9f4848;
        border: none;
        color: #eeeeee;
        border-radius: 3px;
    }

</style>
