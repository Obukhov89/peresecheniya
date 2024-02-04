<template>
    <div class="container">
        <div class="container_buttons-nav">
            <button @click="goHomePage" class="editBtn">В профиль</button>
            <button class="editBtn">Список конкурсов</button>
        </div>
        <div class="info_contest">
            <p class="title_for_contest">Название конкурса:<br>
                <span class="item_contest">{{this.name_contest}}</span>
            </p>
            <p class="title_for_contest">
                Время проведения конкурса:<br>
                <span class="item_contest">{{this.event_of_range}}</span>
            </p>
            <p class="title_for_contest">
                Положение конкурса:<br>
                <span class="item_contest">{{this.contest_position}}</span>
            </p>
        </div>
    </div>
</template>

<script>
import router from "../../../router";
import axios from "axios";
import month_name from "../help_functions/month_name";

export default {
    name: "ItemContest",
    data() {
        return{
            contest_data: {
                contest_id: this.$route.query.contest_id
            },
            name_contest: '',
            event_of_range: '',
            contest_position: ''
        }
    },
    methods: {
        goHomePage() {
            router.push({name: 'HomePage'})
        },
        getInfoContest() {
            axios.post('/get_info_contest', this.contest_data).then((response) => {
                console.log(response.data)
                this.name_contest = response.data.name_contest
                let date_start = new Date(response.data.date_start)
                let date_end = new Date(response.data.date_end)
                let name_month_start = month_name(date_start.getMonth() + 1)
                let name_month_end = month_name(date_end.getMonth() + 1);

                this.event_of_range = `${date_start.getDate()} ${name_month_start} ${date_start.getFullYear()}
                - ${date_end.getDate()} ${name_month_end} ${date_end.getFullYear()}`;

                this.contest_position = JSON.parse(response.data.contest_positions)
            })
        }
    },
    beforeMount() {
        this.getInfoContest()
    }
}
</script>

<style scoped>
    .container_buttons-nav{
        margin-top: 40px;
        display: flex;
        align-items: center;
    }
    .info_contest{
        margin: 50px 0 0 15px;
    }
    .title_for_contest{
        padding-top: 1rem;
        font-family: Montserrat, sans-serif;
        font-size: 24px;
        color: #4b5563;
    }
    .item_contest{
        display: block;
        font-family: Montserrat, sans-serif;
        font-size: 24px;
        color: #4b5563;
        margin-top: 20px;
    }
</style>
