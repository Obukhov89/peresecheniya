<template>
    <div id="experts">
        <div class="container">
            <h1 class="main_title">FESTIVAL CELEBRATION EXPERTS</h1>
            <p class="main_subtitle experts_subtitle">
                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                te consec tetur, adipisci velit, sed quia non numquam eius modi
                tempora incidunt
            </p>
            <div class="food_drinks__grid">
                <Card v-for="expert in experts" :key="expert">
                    <div class="card">
                        <img :src="expert.image" alt="" />
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
        </div>
    </div>
</template>

<script>
export default {
    name: "Experts",

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
        };
    },
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
.btn_orange {
    text-transform: uppercase;
    font-family: "Open Sans", sans-serif;
    font-size: 13px;
    font-weight: 600;
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
