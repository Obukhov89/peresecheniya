<template>
    <div id="celebration">
        <div class="container">
            <h1 class="main_title">форма регистрации</h1>
            <div class="dropdown_questions">
                <form @submit.prevent="onsubmit" class="registration">
                    <div class="select_role">
                        <p class="label_reg">
                            Зарегистрироваться как:
                        </p>
                        <label class="label_reg">Участник</label>
                        <input type="radio" v-model="data.id_role" :value="2">
                        <label class="label_reg">Зритель</label>
                        <input type="radio" v-model="data.id_role"  :value="3">
                    </div>

                    <label for="fio" class="label_reg">ФИО:</label>
                    <input class="inputReg" type="text" id="fio" name="fio" v-model="data.fio">
                    <label for="tel" class="label_reg">Телефон:</label>
                    <input class="inputReg" type="text" id="tel" v-model="data.tel">
                    <label class="label_reg" for="email">Email:</label>
                    <input type="text" class="inputReg" id="email" v-model="data.email">
                    <button @click="registration" class="btn_orange">Отправить</button>
                </form>
            </div>
        </div>
        <div class="projects__counter">
        </div>
    </div>
    <Modal v-if="info_reg">
        <template v-slot:heading>
            <p class="note_of_reg">Заявка отправлена!</p>
        </template>
        <template v-slot:info>
            <p class="text_note">
                Заявка на регистрацию на портале отправлена успешно.<br> Ожидайте письмо администрации о решении.
            </p>
        </template>
        <template v-slot:button>
            <button @click="close_info" class="btn_ok">ок</button>
        </template>
    </Modal>
</template>

<script>
import axios from "axios";
import Modal from "../modal/Modal.vue";
import router from "../router";

export default {
    name: "Celebration",
    components: {Modal},
    data(){
        return{
            info_reg: false,
            data:{
                fio:'',
                tel:'',
                email:'',
                id_role:2,
            }
        }
    },
    methods:{
        registration(){
            axios.post('/registration', this.data).then((response) => {
                this.info_reg = true
            })
        },

        close_info(){
            this.info_reg = false
            this.data.fio = '';
            this.data.email = '';
            this.data.tel = '';
            router.push({name: "Header", hash:"#header"})
        }
    }
};
</script>

<style scoped>
#celebration {
    margin: 110px 0 90px;
    padding: 110px 0 0px;
    background-color: #e5e5e595;
}
.dropdown_questions {
    background-color: #ffffff;
    margin: 50px 0px;
}
.question {
    padding: 20px 50px 25px;
    color: #000;
    font-size: 18px;
    border-bottom: 0.5px solid #5267883b;
}
.question span {
    padding-right: 50px;
}

.main_title {
    font-size: 36px;
    text-align: center;
    margin: 20px 0;
    color: #282828;
    line-height: 1.5;
    text-transform: uppercase;
}

.registration{
    display: flex;
    flex-direction: column;
    background-color: #e5e5e595;
}

.select_role{
    display: flex;
}

.inputReg{
    padding-left: 20px;
    width: inherit;
    height: 45px;
    border: 1px solid lightgray;
    border-radius: 5px;
}

.text_note{
    padding-top: 2rem;
    text-align: center;
    font-family: "Montserrat", sanr-serif;
    font-size: 16px;
}

.note_of_reg{
    text-align: center;
    font-family: "Montserrat", sanr-serif;
    font-size: 20px;
    color: #ffffff;
    font-weight: 600;
}

.btn_ok{
    margin: 45px auto;
    width: 150px;
    height: 35px;
    border: none;
    border-radius: 3px;
    background-color: #ffa51d;
    font-family: "Montserrat", sanr-serif;
    font-size: 20px;
    color: #ffffff;
    box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.3);
}

.projects__counter {
    display: flex;
    justify-content: space-around;
}

.testimonials {
    padding: 100px 0 90px;
    width: 750px;
    margin: 0 auto;
}
.btn_orange {
    font-family: "Montserrat", sanr-serif;
    font-size: 16px;
    color: #ffffff;
    box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.3);
    margin:1rem;
    width: 150px;
    height: 35px;
    border: none;
    text-transform: uppercase;
}

.label_reg{
    font-family: "Montserrat", sanr-serif;
    padding: 5px;
}
</style>
