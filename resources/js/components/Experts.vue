<template>
    <div id="experts">
        <div class="container">
            <h1 class="main_title">жюри</h1>
            <div class="food_drinks__grid" v-if="real_experts.length === 0">
                <Card v-for="expert in experts" :key="expert">
                    <div class="card">
                        <img :src="expert.image" alt=""/>
                        <div class="human_description">
                            <h1 class="experts_name main_title">
                                {{ expert.name }}
                            </h1>
                            <p class="experts_work main_subtitle">
                                {{ expert.work }}
                            </p>
                            <p class="experts_work main_subtitle"></p>
                        </div>
                    </div>
                </Card>
            </div>
            <div class="food_drinks__grid" v-else>
                <div class="judge_card" v-for="judge in real_experts">
                    <Avatar :name="judge.name_judge" size="150"
                            background="#ffa51d"
                            color="white"
                            :imageSrc="judge.src"/>
                    <p class="name_judge">{{ judge.name_judge }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Avatar from "vue3-avatar";

export default {
    name: "Experts",
    components: {Avatar},
    data() {
        return {
            experts: [
                {
                    image: "img/KevinPeter.jpg",
                    name: "Kevin Peter",
                    work: "Senior Architect",
                    description:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
                {
                    image: "img/KevinPeter.jpg",
                    name: "Kevin Peter",
                    work: "Senior Architect",
                    description:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
                {
                    image: "img/KevinPeter.jpg",
                    name: "Kevin Peter",
                    work: "Senior Architect",
                    description:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
                {
                    image: "img/KevinPeter.jpg",
                    name: "Kevin Peter",
                    work: "Senior Architect",
                    description:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
                {
                    image: "img/KevinPeter.jpg",
                    name: "Kevin Peter",
                    work: "Senior Architect",
                    description:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
                {
                    image: "img/KevinPeter.jpg",
                    name: "Kevin Peter",
                    work: "Senior Architect",
                    description:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
            ],
            real_experts: []
        };
    },
    methods: {
        getJudges() {
            axios.get('/getJudgeNewContest').then((response) => {
                console.log(response.data)
                if (response.data.length !== 0) {
                    response.data.forEach((item) => {
                        let pre_name = item.name.split(' ')
                        let fileWay = new URL(`../../../storage/app/public/avatars/${item.id_user}/${item.id_user}.jpg`, import.meta.url).href
                        this.real_experts.push({
                            src: fileWay,
                            name_judge: `${pre_name[0]} ${pre_name[1]}`
                        })

                    })
                    console.log(this.real_experts)

                }
            })
        }
    },
    beforeMount() {
        this.getJudges()
    }
};
</script>

<style scoped>
#experts {
    padding: 110px 0 90px;
}

.experts_subtitle {
    width: 700px;
    margin: 0 auto;
    text-align: center;
    color: #000;
}

.experts_name {
    text-align: center;
    margin: 0;
    font-size: 18px;
    font-weight: 400;
    text-transform: uppercase;
    color: #000;
    padding: 30px;
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
    position: relative;
}

.human_description {
    position: absolute;
    bottom: 10px;
    background-color: #fff;
    width: 370px;
    object-fit: cover;
}

.card img {
    width: 360px;
    object-fit: cover;
    padding: 0;
    margin: 0;
}

.name_judge {
    text-align: center;
    font-family: Montserrat, sans-serif;
    font-size: 18px;
    color: #4b5563;
}

.btn_orange {
    text-transform: uppercase;
    font-family: "Open Sans", sans-serif;
    font-size: 13px;
    font-weight: 600;
}
.judge_card{
    width: 190px;
}
.btn {
    text-align: center;
}

.main_title {
    color: #000;
    text-align: center;
    margin-bottom: 20px;
}

.experts_work {
    padding: 0;
}
</style>
