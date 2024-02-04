<template>
    <div class="container">
        <div class="container_buttons-nav">
            <button @click="goHomePage" class="editBtn">В профиль</button>
            <button @click="showRequests" class="editBtn">Заявки на регистрацию</button>
            <button @click="showContests" class="editBtn">Конкурсы</button>
        </div>
        <div v-if="requests">
            <p class="header_request">Заявки на регистрацию</p>
            <table class="request_table" v-if="this.arr_data.length !== 0 ">
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
        <div v-else>
            <div class="contests_area">
                <button @click="vision" class="editBtn new_contest_btn">новый конкурс</button>
            </div>
            <PageContests/>
            <AddModal v-if="modal_vision">
                <template v-slot:header_modal>
                    <p class="header_modal">Новый конкурс</p>
                </template>
                <template v-slot:btnClose>
                    <button @click="close_vision" class="btn_close">X</button>
                </template>
                <template v-slot:change_bar>
                    <form enctype="multipart/form-data" method="post" @submit.prevent="onsubmit">
                        <div class="container_contest">
                            <div>
                                <p class="label_reg">Название конкурса</p>
                                <input class="input_contest" type="text" v-model="contest_name">
                                <p class="label_reg">Дата начала</p>
                                <input class="input_contest" type="date" v-model="date_start">
                            </div>
                            <div>
                                <p class="label_reg">Дата окончания</p>
                                <input class="input_contest" type="date" v-model="date_end">
                                <p class="label_reg">Положение конкурса</p>
                                <div class="container_radio_btn">
                                    <div class="radio_group">
                                        <label class="label_reg">Загрузить файл:</label>
                                        <input type="radio" value="file" v-model="type_contest_position">
                                    </div>
                                    <div class="radio_group">
                                        <label class="label_reg">Заполнить вручную:</label>
                                        <input type="radio" value="text" v-model="type_contest_position">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contest_position">
                            <textarea v-if="type_contest_position === 'text'" class="contest_position_textarea" v-model="textarea"></textarea>
                            <input @change="checkFileInput" v-else class="contest_position_input" type="file">
                        </div>
                        <div class="container_btn">
                            <button @click="save_contest" class="btn_save button_modal">Сохранить</button>
                        </div>
                    </form>
                </template>
            </AddModal>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import PageContests from "../contests/PageContests.vue";
import router from "../../../router";
import AddModal from "../../../modal/AddModal.vue";

export default {
    name: "AdminPanel",
    components: {AddModal, PageContests},
    data(){
        return{
            arr_data: [],
            requests: true,
            contests: false,
            modal_vision: false,
            textarea: '',
            file: null,
            contest_name: '',
            date_start: '',
            date_end: '',
            type_contest_position: 'text',
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
        },
        checkFileInput(e) {
            this.file = e.target.files[0]
            if (this.file.type !== 'text/plain'){
                alert('Допускается загрузка файлов только с расширением txt! Пожайлуста выберете файл нужного формата')
                this.file = null
            }
        },
        save_contest() {
            let form_data = new FormData();
            form_data.set('contest_name', this.contest_name);
            form_data.set('date_start', this.date_start);
            form_data.set('date_end', this.date_end);

            if (this.type_contest_position === 'text')
            {
                form_data.set('text', this.textarea)
                axios.post('/save_contest_with_text', form_data).then((response) => {
                    console.log(response.data)
                })
            }else {
                form_data.set('file', this.file);
                axios.post('/save_contest_with_file', form_data).then((response) => {
                    console.log(response.data)
                })
            }
        },

        close_vision() {
            this.modal_vision = false
        },
        showContests() {
            this.requests = false;
            this.contests = true;
        },
        showRequests() {
            this.requests = true;

        },
        goHomePage() {
            router.push({name: 'HomePage'})
        },
        vision() {
            this.modal_vision = true
        },
    },
    beforeMount() {
        this.get_turn()
    }
}
</script>

<style scoped>
    .container_buttons-nav{
        margin-top: 40px;
        display: flex;
    }
    .header_request{
        margin-top: 40px;
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
        font-family: Montserrat, sans-serif;
        font-size: 16px;
    }
    .reject_btn{
        width: 140px;
        height: 40px;
        background-color: #9f4848;
        border: none;
        color: #eeeeee;
        border-radius: 3px;
        font-family: Montserrat, sans-serif;
        font-size: 16px;
    }
    .contests_area {
        margin-top: 40px;
    }

    .new_contest_btn {
        float: right;
    }

    .header_modal {
        font-family: Montserrat, sans-serif;
        font-size: 18px;
        color: #eeeeee;
    }
    .container_contest {
        display: flex;
        justify-content: space-evenly;
    }
    .btn_close {
        width: 35px;
        height: 35px;
        border: none;
        background-color: #ffa51d;
        color: #eeeeee;
        font-size: 16px;
        margin-left: 400px;
    }
    .container_btn{
        text-align: center;
        margin: 10px auto;
    }
    .radio_group {
        margin-top: 10px;
    }
    .label_reg {
        padding: 10px;
        color: #4b5563;
        font-family: Montserrat, sans-serif;
        font-size: 16px;
    }
    .container_radio_btn {
        display: flex;
        flex-direction: column;
    }
    .contest_position{
        margin:30px 0 0 45px;
    }
    .contest_position_textarea{
        width: 560px;
        height: 150px;
    }
    .contest_position_input{
        width: 560px;
    }
    .input_contest {
        padding-left: 10px;
        font-family: Montserrat, sans-serif;
        font-size: 15px;
        margin: 10px;
        width: 250px;
        height: 35px;
        border: 1px solid #4b5563;
        border-radius: 3px;
    }

</style>
