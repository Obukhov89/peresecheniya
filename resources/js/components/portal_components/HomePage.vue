<template>
    <div class="container container_content">
        <div style="height: 45px">
            <button class="btn_admin" @click="goAdmin" v-if="admin">Панель администратора</button>
        </div>

        <div class="name_container">
            <p class="name_heading">{{getFirstName}} {{getLastName}}</p>
        </div>
        <div class="content_header">
            <button @click="toggleComposition(true)" class="text_btn">Мои произведения</button>
            <button @click="toggleComposition(false)" class="audio_btn">Мои аудио</button>
            <button @click="visible_modal" class="btn_add">Добавить произведение</button>
        </div>

        <div class="author_content">
            <div class="content" v-if="visible_text">
                <table class="table_text" v-if="arr_scripts.length !== 0">
                    <tr v-for="(text, number) in arr_scripts">
                        <td class="counter_text">{{number + 1}}</td>
                        <td class="text_item">{{text.name_composition}}</td>
                        <td class="btn_container"><button class="edit_btn">Редактировать</button></td>
                        <td class="btn_container"><button class="del_btn">Удалить</button></td>
                    </tr>
                </table>
                <p v-else class="name_heading">Здесь нет текста</p>
            </div>
            <div class="content" v-else>
                <table class="table_audio" v-if="arr_audio.length !== 0">
                    <tr v-for="(audio, number) in arr_audio" :key="audio.id">
                        <td class="counter_track">{{number + 1}}</td>
                        <td class="audio_item">
                            <p class="title_track">{{audio.name_composition}}</p>
                            <audio class="audio"  controls>
                                <source :src="audio.src">
                            </audio>
                        </td>
                        <td>
                            <button class="del_btn">Удалить</button>
                        </td>
                    </tr>
                </table>
                <p v-else class="name_heading">Здесь нет песен</p>

            </div>

        </div>
        <ModalLoading v-if="modal_add">
            <template v-slot:btnClose>
                <button @click="close_modal" class="btnClose">X</button>
            </template>
            <template v-slot:change_bar>
                <div class="type_content">
                    <div>
                        <label class="input_label_type_content">Текстовое произведение</label>
                        <input  type="radio" value="text" v-model="type_content">
                    </div>
                    <div>
                        <label class="input_label_type_content">Аудиозапись</label>
                        <input type="radio" value="audio" v-model="type_content">
                    </div>
                </div>
            </template>
            <template v-slot:form>
                <form enctype="multipart/form-data" method="post" @submit.prevent="onsubmit" class="form_composition">
                    <label class="input_label" >Название произведения:</label>
                    <input id="title_composition" type="text" v-model="name_composition">
                    <input class="content_file" @change="checkFile" type="file">
                    <button @click="downloadFile" class="btn_save" :disabled="toggle_disabled">Сохранить</button>
                </form>
            </template>
        </ModalLoading>
    </div>

</template>

<script>

import {mapState} from "vuex/dist/vuex.mjs";
import ModalLoading from "../../modal/ModalLoading.vue";
import axios from "axios";
import router from "../../router";

export default {
    name: "HomePage",
    components: {ModalLoading},
    data(){
        return{
            admin: false,
            user:{
                first_name: this.getFirstName,
                last_name: this.getLastName
            },
            visible_text: true,
            type_content: 'text',
            confirm_input: true,
            name_composition: '',
            file: null,
            modal_add: false,
            arr_scripts: [],
            arr_audio: [],
            current: {},
            player: new Audio()
        }
    },
    computed:{
        ...mapState('auth', ['state']),

        getAdmin(){
            return this.$store.state.auth.id_role
        },

        getFirstName(){
            return this.$store.state.auth.first_name
        },

        getLastName(){
            return this.$store.state.auth.last_name
        },

        getIdUser(){
            return this.$store.state.auth.id_user
        },
        toggle_disabled(){
            return this.confirm_input
        }
    },
    methods:{
        goAdmin(){
            router.push({name: 'AdminPanel'})
        },
        printId(){
            if (this.getAdmin === 1){
                this.admin = true
            }
        },
        getCompositions()
        {
            let data = {
                user_id: this.getIdUser
            }

            axios.post('/get_compositions', data).then((response) => {
                console.log(response.data)

                this.arr_scripts = response.data.text
                response.data.audio.forEach((item, index) => {
                    let file_way = `../../../../../storage/app/compositions/${item.id_author}/audio/${item.id}.mp3`
                    console.log(file_way)
                    this.arr_audio.push(
                        {
                            id: item.id,
                            author: `${this.getLastName} ${this.getFirstName}`,
                            name_composition: item.name_composition,
                            src: new URL(file_way, import.meta.url).href
                        })
                })

            })
        },

        toggleComposition(instance){
            this.visible_text = instance
        },

        checkFile(e){
            this.file = e.target.files[0]
            if (this.type_content === 'text')
            {
                if (e.target.files[0]['type'] !== 'text/plain'  && this.name_composition.length === 0)
                {
                    alert('Можно загружать только текстовые файлы с расширением ".txt"! ' +
                        'Пожайлуста выберете файл с нужным форматом.');
                }else {
                    this.confirm_input = false
                }
            }
            if (this.type_content === 'audio')
            {
                if ((e.target.files[0]['type'] !== 'audio/ogg' ||
                    e.target.files[0]['type'] !== 'audio/mpeg')  && this.name_composition.length === 0)
                {
                    alert('Можно загружать только аудиофайлы с расширением ".mp3"! ' +
                        'Пожайлуста выберете файл с нужным форматом.');
                }else {
                    this.confirm_input = false
                }
            }
            console.log(this.file)
        },

        downloadFile(){
            let formData = new FormData();

            formData.set('type_content', this.type_content);
            formData.set('user_id', this.getIdUser);
            formData.set('name_composition', this.name_composition);
            formData.set('file', this.file)
            console.log(formData.has('file'))

            axios.post('/downloadComposition', formData).then((response) => {
                console.log(response.data)
                this.close_modal()
            })
        },
        visible_modal(){
            this.modal_add = true
        },
        close_modal(){
            this.modal_add = false
        }
    },
    beforeMount() {
        this.printId()
        this.getCompositions()
    },
    created() {
        this.current = this.arr_audio.id
        this.player.src = this.arr_audio.src
    }
}
</script>

<style scoped>
    .container_content
    {
        height: 100vh;
    }

    .btn_admin
    {
        float: right;
        width: 180px;
        height: 45px;
        border: none;
        background-color: #ffa51d;
        font-family: "Montserrat", sanr-serif;
        font-size: 16px;
        color: #ffffff;
        box-shadow: 5px 5px 5px 0px rgba(148, 147, 147, 0.3);
        text-transform: uppercase;
    }

    .name_container
    {
        margin-top: 40px;
        text-align: center;
    }

    .name_heading
    {
        font-family: "Montserrat", sanr-serif;
        color: #4b5563;
        font-size: 20px;
    }

    .content_header
    {
        margin-top: 50px;
        display: flex;
    }

    .text_btn
    {
        width: 180px;
        height: 45px;
        border: none;
        background-color: #ffa51d;
        font-family: "Montserrat", sanr-serif;
        font-size: 16px;
        color: #ffffff;
        text-transform: uppercase;
        box-shadow: 5px 5px 5px 0px rgba(148, 147, 147, 0.3);
    }

    .table_audio{
        padding-top: 1rem;
        width: 100%;
        border-collapse: collapse;
    }

    .table_audio tr{
        border-bottom: 1px solid lightgrey;
    }

    .audio{
        width: 700px;
    }
    .title_track{
        font-family: Montserrat, sans-serif;
        font-size: 14px;
        padding-top: 20px;
    }
    .edit_btn{
        width: 140px;
        height: 30px;
        background-color: #ffa51d;
        border: none;
        color: #eeeeee;
        border-radius: 3px;
    }
    .del_btn{
        width: 140px;
        height: 30px;
        background-color: #9f4848;
        border: none;
        color: #eeeeee;
        border-radius: 3px;
    }

    .table_text{
        padding-top: 1rem;
        width: 100%;
        border-collapse: collapse;

    }
    .table_text tr{
        border-bottom: 1px solid lightgrey;
        text-align: center;
        height: 55px

    }
    .btn_container{
        width: 200px;
    }
    .content{
        margin-top: 1rem;
    }
    .counter_text{
        width: 80px;
        text-align: center;
        font-family: Montserrat, sans-serif;
    }
    .text_item{
        width: 1000px;
        font-family: Montserrat, sans-serif;
    }
    .audio_btn
    {
        margin-left: 5px;
        width: 180px;
        height: 45px;
        border: none;
        background-color: #ffa51d;
        font-family: "Montserrat", sanr-serif;
        font-size: 16px;
        color: #ffffff;
        text-transform: uppercase;
        box-shadow: 5px 5px 5px 0px rgba(148, 147, 147, 0.3);
    }

    .btn_add{
        margin-left: 625px;
        width: 180px;
        height: 45px;
        border: none;
        background-color: #ffa51d;
        font-family: "Montserrat", sanr-serif;
        font-size: 16px;
        color: #ffffff;
        text-transform: uppercase;
        box-shadow: 5px 5px 5px 0px rgba(148, 147, 147, 0.3);
    }
    .counter_track{
        width: 60px;
        font-family: Montserrat, sans-serif;
    }
    .audio_item{
        width: 70%;
        text-align: center;
    }
    .author_content
    {
        text-align: center;
        margin-top: 10px;
        background-color: #f3f2f2;
        height: 500px;
        border-radius: 3px;
        box-shadow: 5px 5px 5px 2px rgba(102, 102, 102, 0.3);
    }

    .btnClose{
        width: 25px;
        height: 25px;
        text-align: center;
        border: none;
        background-color: #ffa51d;
        color: #eeeeee;
        margin-left: 130px;
    }
    .form_composition{
        margin-top: 20px;
        display: flex;
        flex-direction: column;
    }
    #title_composition{
        padding-left: 10px;
        width: 395px;
        height: 35px;
        border: 1px solid #ffa51d;
        margin-left: 50px;
        margin-top: 10px;
        border-radius: 3px;
    }
    .type_content{
        margin-top: 1rem;
        display: flex;
        justify-content: space-evenly;

    }
    .input_label{
        font-family: Montserrat, sans-serif;
        margin-left:50px;
    }

    .input_label_type_content{
        font-family: Montserrat, sans-serif;
        padding: 5px 5px 0 0;
    }
    .content_file{
        margin: 20px auto;
    }
    .btn_save:disabled,
    .btn_save[disabled]{
        border: 1px solid #999999;
        background-color: #cccccc;
        color: #666666;
    }
</style>
