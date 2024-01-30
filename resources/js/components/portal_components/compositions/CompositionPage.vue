<template>
    <div class="container">
        <button @click="toHomePage" class="editBtn">Мой профиль</button>
        <div class="content_area"></div>
        <p class="composition_title">{{this.name_composition}}</p>
        <button v-if="this.disabled" @click="openEdit" class="editBtn">Редактировать</button>
        <button v-else class="editBtn" @click="save_composition">Сохранить</button>
        <div class="container_article">
            <textarea id="text_area_composition" class="text_content" v-model="this.text" :disabled="disabled"></textarea>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import router from "../../../router";
export default {
    name: "CompositionPage",
    data() {
        return {
            composition_data: {
                text_id: this.$route.query.composition_id,
                author_id: this.$route.query.author_id
            },
            text: '',
            disabled: true,
            name_composition: ''
        }
    },
    methods: {
        getText() {
            axios.post('/get_composition', this.composition_data).then((response) => {
                let text = JSON.parse(response.data.text_composition)
                this.text = text
                this.name_composition = response.data.name_composition
            })
        },
        openEdit() {
            this.disabled = false
        },

        save_composition() {
            let data = {
                idAuthor: this.composition_data.author_id,
                idText: this.composition_data.text_id,
                text: this.text
            }

            axios.post('/edit_composition', data).then((response) => {
                console.log(response.data)
            })

            this.disabled = true
        },

        toHomePage(){
            router.push({name: 'HomePage'})
        }
    },
    beforeMount() {
        this.getText()
    }
}
</script>

<style scoped>
.content_area {
    margin-top: 100px;
}

.text_content {
    margin: 5px auto;
    border: 2px solid #ffa51d;
    border-radius: 3px;
    width: 100%;
    height: 400px;
    padding: 20px;
    font-family: Montserrat, sans-serif;
    font-size: 16px;
}
.composition_title{
    text-align: center;
    font-family: Montserrat, sans-serif;
    font-size: 18px;
    color: #4b5563;
}
</style>
