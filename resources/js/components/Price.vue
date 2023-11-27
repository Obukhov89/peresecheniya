<template>
    <div id="price">
        <div class="container">
            <div class="price__grid">
                <Prices v-for="price in prices" :key="price">
                    <div class="card">
                        <div class="card--orange">
                            <h3 class="main_title">{{ price.condition }}</h3>
                            <h3 class="main_title main_title_price">
                                {{ price.price }}
                            </h3>
                            <p class="main_subtitle per_month">Per Month</p>
                        </div>
                        <p class="main_subtitle variables">
                            {{ price.firstVar }}
                        </p>
                        <p class="main_subtitle variables">
                            {{ price.secondVar }}
                        </p>
                        <p class="main_subtitle variables">
                            {{ price.thirdVar }}
                        </p>

                        <button href="#" class="btn btn_orange">
                            choose plan
                        </button>
                    </div></Prices
                >
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Price",

    data() {
        return {
            prices: [
                {
                    condition: "WITH ACCOMMODATION",
                    price: "99",
                    firstVar: "17 Entertainment program",
                    secondVar: "20Accommodation in a hostel",
                    thirdVar: "4 Brazier and BBQ net",
                },
                {
                    condition: "WE PROVIDE A TENTS",
                    price: "299",
                    firstVar: "17 Entertainment program",
                    secondVar: "20Accommodation in a hostel",
                    thirdVar: "4 Brazier and BBQ net",
                },
                {
                    condition: "THE RENT OF CAMPING",
                    price: "499",
                    firstVar: "17 Entertainment program",
                    secondVar: "20Accommodation in a hostel",
                    thirdVar: "4 Brazier and BBQ net",
                },
            ],
        };
    },
};
</script>

<style scoped>
#price {
    padding: 110px 0 90px;
}

.price__grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 30px;
    text-align: center;
}
.card {
    /* border: 1px solid rgba(128, 128, 128, 0.271); */
    box-shadow: 0px 5px 30px rgba(180, 180, 180, 0.381);
    color: #fff;
}
.variables {
    padding: 0;
    margin: 30px;
}

.main_title,
.per_month {
    color: #fff;
}

.card--orange {
    background-color: #ffa51d;
    padding: 40px;
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
.main_title {
    margin: 30px 0 10px;
    font-family: "Montserrat", sanr-serif;
    font-size: 24px;
    text-transform: uppercase;
    color: #fff;
}
.main_title_price {
    font-size: 59px;
}
.btn_orange {
    border-radius: 50px;
    padding-bottom: 0px;
}

.btn {
    padding: 13px 30px;
    text-decoration: none;
    color: #fff;
    border: none;
    margin: 30px;
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
.main_title_price {
    font-size: 59px;
}
</style>
