<template>
    <div class="container">
        <div class="container_contest_list">
            <table class="contest_list" v-if="this.getContestList.length !== 0">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Название конкурса</th>
                        <th>Дата начала</th>
                        <th>Дата окончания</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(contest, number) in this.getContestList">
                        <td>{{number + 1}}</td>
                        <td>
                            <router-link
                                :to="{name: 'ItemContest', query:{ contest_id: contest.id_contest} }" class="link_contest">
                                {{contest.contest_name}}{{contest.id}}
                            </router-link>
                        </td>
                        <td>{{contest.date_start}}</td>
                        <td>{{contest.date_end}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import month_name from "../help_functions/month_name";

export default {
    name: "PageContests",
    components: {},
    data() {
        return {
            arr_contests: [],
        }
    },
    computed:{
        getContestList() {
            let new_arr = []
            this.arr_contests.forEach((item, index) => {
                let start = new Date(item.date_start);
                let end = new Date(item.date_end)
                let name_month_start = month_name(start.getMonth() + 1);
                let name_month_end  = month_name(end.getMonth() + 1);
                new_arr.push({
                    id_contest: item.id,
                    contest_name: item.contest_name,
                    date_start: `${start.getDate()} ${name_month_start} ${start.getFullYear()}`,
                    date_end: `${end.getDate()} ${name_month_end} ${end.getFullYear()}`
                })
            })
            return new_arr;
        }
    },
    methods: {
        getAllContests() {
            axios.get('/get_list_contests').then((response) => {
                this.arr_contests = response.data
                console.log(this.arr_contests)
            })
        },

    },
    beforeMount() {
        this.getAllContests()
    }
}
</script>

<style scoped>

.contest_list{
    padding-top: 80px;
    width: 100%;
}

.contest_list th{
    text-align: center;
    font-family: Montserrat, sans-serif;
    font-size: 16px;
    color: #4b5563;
    border-bottom: 1px solid #4b5563;
}

.contest_list tr{
    text-align: center;
    font-family: Montserrat, sans-serif;
    font-size: 16px;
    color: #4b5563;
    border-bottom: 1px solid #4b5563;
}

.link_contest{
    text-decoration: none;
    font-family: Montserrat, sans-serif;
    font-size: 16px;
    color: #4b5563;
}

.contest_list td{
    height: 55px;
}
</style>
