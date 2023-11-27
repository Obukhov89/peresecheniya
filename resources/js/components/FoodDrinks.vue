<template>
    <div id="food_drinks">
        <div class="container">
            <h1 class="main_title">FOOD & DRINKS</h1>
            <div class="food_drinks__grid">
                <Card v-for="card in cards" :key="card">
                    <div class="card">
                        <img :src="card.image" alt="" /></div
                ></Card>
            </div>
            <div class="btn">
                <a href="#" class="btn btn_orange">view all projects</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Festival",

    data() {
        return {
            cards: [
                {
                    image: "img/festivalCard1.jpg",
                    card__title: "free fall",
                    card__subtitle:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
                {
                    image: "img/festivalCard1.jpg ",
                    card__title: "carousel",
                    card__subtitle:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
                {
                    image: "img/festivalCard1.jpg ",
                    card__title: "ROLLER COASTER",
                    card__subtitle:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
                {
                    image: "img/festivalCard1.jpg ",
                    card__title: "HANGING CAROUSEL",
                    card__subtitle:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
                {
                    image: "img/festivalCard1.jpg ",
                    card__title: "FUUNY GLASSES",
                    card__subtitle:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
                {
                    image: "img/festivalCard1.jpg ",
                    card__title: "GIGGLE WHEEL",
                    card__subtitle:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
                {
                    image: "img/festivalCard1.jpg ",
                    card__title: "PETTING ZOO",
                    card__subtitle:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
                {
                    image: "img/festivalCard1.jpg ",
                    card__title: "ROCK CLIMBING WALL",
                    card__subtitle:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
                {
                    image: "img/festivalCard1.jpg ",
                    card__title: "GO CART",
                    card__subtitle:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
                {
                    image: "img/festivalCard1.jpg ",
                    card__title: "OUR FAVORITE ARTISTS",
                    card__subtitle:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
                {
                    image: "img/festivalCard1.jpg ",
                    card__title: "STREET CULT SHOW",
                    card__subtitle:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
                {
                    image: "img/festivalCard1.jpg ",
                    card__title: "THE BEST MUSICIANS",
                    card__subtitle:
                        "Neque porro quisquam est, qui dolor emr ipsum quia dolor sit amet, consec tetur is adipisci velit, sed quia non num.",
                },
            ],
        };
    },
};
</script>

<style scoped>
#food_drinks {
    padding-bottom: 90px;
}

.main_title {
    text-align: center;
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
</style>
