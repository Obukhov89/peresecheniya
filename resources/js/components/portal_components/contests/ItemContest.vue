<template>
    <div class="container">
        <div class="container_buttons-nav">
            <button @click="goHomePage" class="editBtn">В профиль</button>
            <button @click="goToContestList" class="editBtn">К списоку конкурсов</button>
            <button @click="judges_display" class="editBtn add_jude_btn" v-if="this.getIdRole === 1">
                Добавить члена жюри
            </button>
            <button @click="visible_modal" class="editBtn" v-else-if="this.getIdRole === 2">Принять участие</button>
        </div>
        <div class="info_contest">
            <div class="container_table_judges" v-if="list_judges">
                <div v-for="judge in this.judges_arr" :key="judge.judge_id">
                    <JudgeCard
                        :id_user="judge.judge_id"
                        :judge_avatar="judge.src"
                        :id_contest="this.contest_data.contest_id"
                        :judge_name="judge.judge_name"
                    />
                </div>
            </div>
            <p class="title_for_contest">Название конкурса:<br>
                <span class="item_contest">{{ this.name_contest }}</span>
            </p>
            <p class="title_for_contest">
                Время проведения конкурса:<br>
                <span class="item_contest">{{ this.event_of_range }}</span>
            </p>
            <p class="title_for_contest">
                Положение конкурса:<br>
                <span class="item_contest">{{ this.contest_position }}</span>
            </p>
            <div class="users_list_judge">
                <div class="judge_card"></div>
            </div>
        </div>
        <div class="judge_list">
            <p class="header_for_judge_list">Члены жюри</p>
            <div class="container_judges" v-for="(judge, number) in judges_list" :key="number">
                <JudgeInfo
                    :judge_name="judge.name_judge"
                    :judge_avatar="judge.avatar_judge"
                />
            </div>
        </div>
        <div class="list_contest_compositions">
            <p class="header_for_judge_list">Произведения участвующие в конкурсе</p>
            <table class="contest_list">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Автор</th>
                        <th>Название произведения</th>
                        <th>Вид произведения</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(composition, number) in arr_compositions" :key="composition.composition_id">
                        <td>{{number + 1}}</td>
                        <td>{{composition.author_name}}</td>

                        <td v-if="composition.type_composition === 'Текст'">
                            <router-link class="link_composition"
                                :to="{name:'CompositionPage',
                                query:{author_id: composition.id_author, composition_id: composition.composition_id}}">
                                 {{composition.name_composition}}
                            </router-link>
                        </td>
                        <td v-else>
                            <router-link class="link_composition"
                            :to="{name: 'AudioCompositionPage',
                            query:
                            {author_id: composition.id_author, composition_id: composition.composition_id, id_contest: contest_data.contest_id}}">
                                {{composition.name_composition}}
                            </router-link>
                           </td>
                        <td>{{composition.type_composition}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <ModalLoading v-if="vision_modal">
        <template v-slot:heading>
            <div class="header_modal">
                <p class="modal-header-text">Произведение для конкурса</p>
                <button @click="modal_close" class="btn_close">X</button>
            </div>
        </template>
        <template v-slot:change_bar>
            <div>
                <div class="type_content">
                    <div>
                        <label class="input_label_type_content">Новое произведение</label>
                        <input type="radio" value="new_composition" v-model="type_content">
                    </div>
                    <div>
                        <label class="input_label_type_content">Выбрать из списка</label>
                        <input type="radio" value="composition_list" v-model="type_content">
                    </div>
                </div>
            </div>
        </template>
        <template v-slot:form>
            <form enctype="multipart/form-data" method="post" @submit.prevent="onsubmit" class="form_composition"
                  v-if="type_content ==='new_composition'">
                <label class="input_label">Название произведения:</label>
                <input id="title_composition" type="text" v-model="name_composition">
                <input class="content_file" @change="checkFile" type="file">
                <button @click="newFileToContest" class="btn_save">Сохранить</button>
            </form>
            <form v-else class="exist_compositions" method="post" @submit.prevent="onsubmit">
                <label class="labelFor" for="compositionSelect">Выберите желаемое произведение:</label>
                <select id="compositionSelect" class="compositionInput" v-model="id_compositions">
                    <option v-for="item in names_composition" :value="item.id_composition">
                        {{ item.composition_name }}
                    </option>
                </select>
                <button @click="compositionToContest" class="btn_save">Сохранить</button>
            </form>
        </template>
    </ModalLoading>
</template>

<script>
import router from "../../../router";
import axios from "axios";
import month_name from "../help_functions/month_name";
import {mapState} from "vuex/dist/vuex.mjs";
import JudgeCard from "./JudgeCard.vue";
import JudgeInfo from "./JudgeInfo.vue";
import ModalLoading from "../../../modal/ModalLoading.vue";

export default {
    name: "ItemContest",
    components: {ModalLoading, JudgeInfo, JudgeCard},
    data() {
        return {
            contest_data: {
                contest_id: this.$route.query.contest_id
            },
            name_contest: '',
            event_of_range: '',
            contest_position: '',
            list_judges: false,
            judges_arr: [],
            judges_list: [],
            type_content: 'new_composition',
            name_composition: '',
            names_composition: [],
            id_compositions: 0,
            file: null,
            vision_modal: false,
            arr_compositions: []
        }
    },
    computed: {
        ...mapState('auth', ['store']),
        getIdRole() {
            return this.$store.state.auth.id_role
        },
        getIdUser() {
            return this.$store.state.auth.id_user
        }
    },
    methods: {
        goHomePage() {
            router.push({name: 'HomePage'})
        },
        goToContestList(){
            router.push({name: 'ListContests'})
        },
        getInfoContest() {
            axios.post('/get_info_contest', this.contest_data).then((response) => {
                this.name_contest = response.data.name_contest
                let date_start = new Date(response.data.date_start)
                let date_end = new Date(response.data.date_end)
                let name_month_start = month_name(date_start.getMonth() + 1)
                let name_month_end = month_name(date_end.getMonth() + 1);

                this.event_of_range = `${date_start.getDate()} ${name_month_start} ${date_start.getFullYear()}
                - ${date_end.getDate()} ${name_month_end} ${date_end.getFullYear()}`;

                this.contest_position = JSON.parse(response.data.contest_positions)
            })

            axios.get('/getUserList').then((response) => {
                response.data.forEach((item) => {
                    let avatar_way =
                        new URL(`../../../../../storage/app/public/avatars/${item.id}/${item.id}.jpg`, import.meta.url).href
                    let pre_name_judge = item.name.split(' ')
                    let name_judge = `${pre_name_judge[0]} ${pre_name_judge[1]}`
                    this.judges_arr.push({
                        judge_id: item.id,
                        judge_name: name_judge,
                        src: avatar_way
                    })
                })
            })

            axios.post('/get_judges', this.contest_data).then((response) => {
                response.data.forEach((item) => {
                    let avatar_judge = new URL(`../../../../../storage/app/public/avatars/${item.id}/${item.id}.jpg`, import.meta.url).href;
                    let pre_name_judge = item.name.split(' ')
                    let name_judge = `${pre_name_judge[0]} ${pre_name_judge[1]}`
                    this.judges_list.push({
                        name_judge: name_judge,
                        avatar_judge: avatar_judge
                    });
                })
                console.log(this.judges_list)
            })
            axios.post('/getContestParticipantsList', this.contest_data).then((response) => {
                response.data.forEach((item) => {
                    let composition_type = ''
                    if (item.type_composition === 'text'){
                        composition_type = 'Текст'
                    } else {
                        composition_type = 'Аудио'
                    }
                    this.arr_compositions.push({
                        name_composition: item.name_composition,
                        author_name: item.name,
                        type_composition: composition_type,
                        id_author: item.author_id,
                        composition_id: item.id_composition
                    })
                })
            })
        },
        judges_display() {
            this.list_judges = true;
        },
        getCompositionsAuthor() {
            let data = {
                user_id: this.getIdUser
            }
            axios.post('/get_names_compositions', data).then((response) => {
                console.log(response.data)
                if (response.data !== null) {
                    response.data.forEach((item) => {
                        this.names_composition.push({
                            id_composition: item.id,
                            composition_name: item.name_composition
                        })
                    })
                }
            })
        },
        checkFile(e) {
            this.file = e.target.files[0]
        },

        newFileToContest() {
            let form_data = new FormData();
            form_data.set('user_id', this.getIdUser);
            form_data.set('name_composition', this.name_composition);
            form_data.set('contest_id', this.contest_data.contest_id)

            if (this.file.type === 'text/plain') {
                form_data.set('type_content', 'text')
                form_data.set('file', this.file)
            } else if (this.file.type === 'audio/mpeg' || this.file.type === 'audio/ogg') {
                form_data.set('type_content', 'audio')
                form_data.set('file', this.file)
            } else {
                alert('Файл с таким расширением не может быть загружен. Пожалуйста, выберете файл с правильным расширением')
                this.file = null
            }

            if(this.file !== null){
                axios.post('/new_composition_to_contest', form_data).then((response) => {
                    console.log(response.data)
                    this.modal_close();
                })
            } else {
                alert('Поле файла пустое. Пожалуйста загузите файл')
            }
        },
        compositionToContest() {
            let data = {
                user_id: this.getIdUser,
                contest_id: this.contest_data.contest_id,
                id_composition: this.id_compositions
            }
            axios.post('/postCompositionToContest', data).then((response) => {
                this.modal_close();
            })
        },
        visible_modal() {
            this.vision_modal = true
        },
        modal_close() {
            this.vision_modal = false
        }
    },
    beforeMount() {
        this.getInfoContest()
        this.getCompositionsAuthor()
    }
}
</script>

<style scoped>
.container_buttons-nav {
    margin-top: 40px;
    display: flex;
    align-items: center;
}

.info_contest {
    margin: 50px 0 0 15px;
}

.title_for_contest {
    padding-top: 1rem;
    font-family: Montserrat, sans-serif;
    font-size: 24px;
    color: #4b5563;
}

.item_contest {
    display: block;
    font-family: Montserrat, sans-serif;
    font-size: 24px;
    color: #4b5563;
    margin-top: 20px;
}

.add_jude_btn {
    float: right;
}

.header_for_judge_list {
    font-family: Montserrat, sans-serif;
    color: #4b5563;
    font-size: 22px;
    text-align: center;
}

.header_modal {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.btn_close {
    width: 35px;
    height: 35px;
    border: none;
    background-color: #ffa51d;
    font-family: Montserrat, sans-serif;
    color: #eeeeee;
    font-size: 18px;
}

.exist_compositions {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.labelFor {
    margin: 1rem;
    font-family: Montserrat, sans-serif;
    font-size: 16px;
    color: #4b5563;
}

.compositionInput {
    width: 350px;
    padding-left: 5px;
    height: 35px;
    border: 1px solid #ffa51d;
}
.list_contest_compositions{
    height: 900px;
}
.contest_list{
    width: 100%;
    margin-top: 50px;
    border-collapse: collapse;
}
.contest_list th{
    text-align: center;
    font-family: Montserrat, sans-serif;
    font-size: 16px;
    color: #4b5563;
}
.contest_list tr{
    text-align: center;
}
.contest_list td{
    height: 70px;
    border-bottom: 1px solid #4b5563;
    font-family: Montserrat, sans-serif;
    font-size: 16px;
    color: #4b5563;
}
.link_composition{
    text-decoration: none;
    font-family: Montserrat, sans-serif;
    font-size: 16px;
    color: #4b5563;
}
</style>
