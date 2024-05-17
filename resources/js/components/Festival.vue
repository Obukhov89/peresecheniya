<template>
    <div id="festival">
        <div class="container">
            <h1>Номинации</h1>
            <div class="festival__grid">
                <Card v-for="card in cards" :key="card">
                    <div class="card">
                        <img :src="card.image" alt="" />
                        <h3>{{ card.card__title }}</h3>
                        <p class="main_subtitle">{{ card.card__subtitle }}</p>
                    </div></Card
                >
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
                    image: "img/guitar.png",
                    card__title: "Автор",
                },
                {
                    image: "img/ispolnitel.jpg ",
                    card__title: "Исполнитель",
                },
                {
                    image: "img/kompositor.jpg ",
                    card__title: "Композитор",
                },
                {
                    image: "img/duet.jpg ",
                    card__title: "Дуэт",
                },
                {
                    image: "img/ansambl.jpg ",
                    card__title: "Ансамбль",
                },
                {
                    image: "img/poet.jpg ",
                    card__title: "Поэт",
                },
            ],
        };
    },
};
</script>

<style scoped>
#festival {
    padding: 110px 0 90px;
}
#festival h1 {
    font-family: "Montserrat", sanr-serif;
    font-size: 32px;
    margin-bottom: 100px;
}
.festival__grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 30px;
    text-align: center;
}
.card {
    /* border: 1px solid rgba(128, 128, 128, 0.271); */
    box-shadow: 0px 5px 30px rgba(180, 180, 180, 0.381);
}
.card img {
    width: 370px;
    object-fit: cover;
    padding: 0;
    margin: 0;
}
.card__title {
    margin: 30px;
}
.card h3 {
    margin: 30px 0 10px;
    font-family: "Montserrat", sanr-serif;
    font-size: 20px;
    text-transform: uppercase;
    color: #526788;
}



.btn {
    padding: 13px 30px;
    text-decoration: none;
    color: #fff;
}

.btn_blue {
    background-color: #337ab7;
    text-transform: uppercase;
    font-size: 16px;
    font-family: "Open Sans", sans-serif;
    margin: 0 15px;
    font-weight: 500;
}
.wrapper {
    background-color: #ffa51d;
}
.get_started {
    padding: 50px 0;
    display: flex;
    justify-content: flex-start;
}

.get_started p {
    font-size: 32px;
    font-family: "Montserrat", sans-serif;
    color: #fff;
    font-weight: 600;
    padding: 0 15px;
}

.navbar__list {
    text-transform: uppercase;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 16px;
    line-height: 1.42857143;
    color: #333;
    font-weight: 600;
}
</style>
