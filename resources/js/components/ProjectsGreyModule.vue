<template>
    <div id="projects-greyModule">
        <div class="container">
            <div class="card-wrapper">
                <Card v-for="card in cards" :key="card">
                    <img :src="card.image" alt="" />
                    <h2 class="main_title">{{ card.card__title }}</h2>
                </Card>
            </div>
        </div>
        <div class="projects__counter">
            <Counter v-for="count in counters" :key="count">
                <h2 class="main_title">{{ count.number }}</h2>
                <p class="main_subtitle">{{ count.counters__title }}</p>
            </Counter>
        </div>
        <div class="testimonials">
            <h1 class="main_title">TESTIMONIALS FROM OUR CLIENTS</h1>
            <p class="main_subtitle">
                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                te consec tetur, adipisci velit, sed quia non numquam eius modi
                tempora incidunt
            </p>

            <Clientcard v-for="clientcard in clientcards" :key="clientcard">
                <div class="clientcard">
                    <img :src="clientcard.image" alt="" />

                    <p class="main_title">{{ clientcard.name }}</p>

                    <p class="main_subtitle">{{ clientcard.profession }}</p>

                    <p class="main_subtitle">
                        {{ clientcard.description }}
                    </p>
                </div>
            </Clientcard>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProjectsGreyModule",
    data() {
        return {
            cards: [
                {
                    image: "img/cheerAndParty.jpg",
                    card__title: "cheer and party",
                },
                {
                    image: "img/birthdays.jpg ",
                    card__title: "birthdays",
                },
                {
                    image: "img/rolling.jpg ",
                    card__title: "rolling",
                },
                {
                    image: "img/attractions.jpg ",
                    card__title: "attractions",
                },
            ],
            counters: [
                {
                    number: "75",
                    counters__title: "YEARS OF EXPERIENCE",
                },
                {
                    number: "550",
                    counters__title: "FESTIVAL CELEBRATION",
                },
                {
                    number: "30",
                    counters__title: "RUNNING PROJECTS",
                },
                {
                    number: "600",
                    counters__title: "QUALIFIED WORKERS",
                },
            ],
            clientcards: [
                {
                    image: "img/client1.jpg",
                    name: "andrew dock",
                    profession: "CEO, Brand Architecture",
                    description:
                        "Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, te consec tetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore.",
                },
                {
                    image: "img/client2.jpg",
                    name: "stephan fleeming",
                    profession: "CEO, Brand Architecture",
                    description:
                        "Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, te consec tetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore.",
                },
            ],
        };
    },
};
</script>

<style scoped>
#projects-greyModule {
    margin: 110px 0 90px;
    padding: 110px 0 90px;
    background-color: #e5e5e595;
}
.card-wrapper {
    display: flex;
    justify-content: space-between;
    gap: 30px;
    margin-bottom: 90px;
}
.card-wrapper img {
    height: 260px;
}
.main_title {
    font-size: 30px;
    text-transform: capitalize;
    text-align: center;
    margin: 20px 0;
}
.projects__counter {
    background-image: url("../img/../../../../festival/public/img/projectBanner.jpg");
    display: flex;
    justify-content: space-around;
}
counter {
    color: rgb(255, 255, 255);
    padding: 100px 0 90px;
}

counter .main_title {
    font-size: 48px;
}

counter .main_subtitle {
    font-size: 18px;
    color: #526788;
    font-weight: 500;
}

.testimonials {
    padding: 100px 0 90px;
    width: 750px;
    margin: 0 auto;
}
.testimonials .main_subtitle {
    text-align: center;
    color: #000;
    margin-bottom: 100px;
}
.clientcard {
    text-align: center;
}
.clientcard img {
    border-radius: 50%;
}
.clientcard {
    padding: 30px;
    /* border: 1px solid grey; */
    background-color: #ffffff;
    box-shadow: 0px 5px 30px rgba(180, 180, 180, 0.381);
}
.clientcard .main_subtitle {
    margin-bottom: 0;
    color: #7d8f99;
}
</style>
