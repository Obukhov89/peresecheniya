<template>
    <div id="entrants">
        <div class="container">
            <h1 class="main_title">Участники</h1>
            <div class="food_drinks__grid" v-if="this.real_users.length === 0">
                <Card v-for="card in cards" :key="card">
                    <div class="card">
                        <p :src="card.header" alt="" >{{ card.header }}</p>
                    </div>
                </Card>
            </div>
            <div v-else class="food_drinks__grid">
                <div class="judge_card" v-for="user in real_users">
                    <Avatar
                        :name="user.name_user" size="150"
                        background="#ffa51d"
                        color="white"
                        :imageSrc="user.src"
                    />
                    <p class="name_user">{{ user.name_user }}</p>
                </div>
            </div>

            <button class="btn_orange"><a class="link_registration" href="#celebration">Зарегистрироваться</a></button>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Avatar from "vue3-avatar";
export default {
    name: "Festival",
    components: {Avatar},
    data() {
        return {
            cards: [
                {
                    header: "Валерий Афанасьев - Чуточка любви",
                },
                {
                    header: "Георгий Балакин - Станция с названием КИСЕГАЧ",
                },
                {
                    header: "Александр Белоусов - Домой",
                },
                {
                    header: "Михаил Вахе aka Tin A. Hunter - Чуткие уши",
                },
                {
                    header: "Светлана Гаврилова - Смерти нет",
                },
                {
                    header: "Константин Грин - В прогнозах - Норд",

                },
                {
                    header: "Игорь Замолотов - дедулино напутствие",

                },
                {
                    header: "Екатерина Захарова aka Озерина - Пожелание другу",

                },
                {
                    header: "Иван Зеленков - Самым близким друзьям",
                },
                {
                    header: "Олеся Конопля - 20:09",
                },
                {
                    header: "Мария Котлова - Колыбельная для внутреннего ребенка",
                },
                {
                    header: "Михаил Куршин aka MLK - На лезвии",
                },
                {
                    header: "Андрей Пономарев aka Андрей Даргоглов - Сон со среды на четверг",
                },
                {
                    header: "Анна Соловьева aka Солованна - Кот-коуч",
                },
                {
                    header: "Андрей Феттер - Этот мир",
                },
            ],
            real_users: []
        };
    },
    methods: {
        getUsersContest() {
            axios.get('/getContestParticipantsUsers').then((response) => {
                response.data.forEach((item) => {
                    let pre_name = item.name.split(' ')
                    let fileWay = new URL(`../../../storage/app/public/avatars/${item.id_user}/${item.id_user}.jpg`, import.meta.url).href
                    this.real_users.push({
                        src: fileWay,
                        name_user: `${pre_name[0]} ${pre_name[1]}`
                    })
                })
            })
        }
    },
    beforeMount() {
        this.getUsersContest()
    }
};
</script>

<style scoped>
#food_drinks {
    padding-bottom: 90px;
}

.main_title {
    text-align: center;
    text-transform: uppercase;
}
.food_drinks__grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 30px;
    text-align: center;
    margin-bottom: 50px;
}
.card {
    box-shadow: 0px 5px 30px rgba(180, 180, 180, 0.381);
    height: 100px;
}
.card p{
    color: #000;
    padding: 10%;
    font-family: Montserrat, sans-serif;
    font-size: 14px;
}
.judge_card{
    width: 190px;
}
.name_user{
    text-align: center;
    font-family: Montserrat, sans-serif;
    font-size: 18px;
    color: #4b5563;
}
.link_registration {
    text-decoration: none;
    color: #fff;
}

.card img {
    width: 360px;
    object-fit: cover;
    padding: 0;
    margin: 0;
}
.btn_orange {
    font-family: "Montserrat", sanr-serif;
    font-size: 16px;
    color: #ffffff;
    box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.3);
    margin:1rem;
    width: 230px;
    height: 35px;
    border: none;
    text-transform: uppercase;
}
.btn {
    text-align: center;
}
</style>
