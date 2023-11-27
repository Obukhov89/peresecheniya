<template>
    <div id="card">
        <div class="card__title">
            <img :src="require('../../../public/img' + card_data.image)" />
            <h3>jkhkhk{{ card.data.card__title }}</h3>
            <p>kjhkh{{ card.data.card__subtitle }}</p>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style scoped>
#festival {
    margin-top: 110px;
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
.card img {
    width: 360px;
}
.card__title {
    margin: 30px;
}
.card h3 {
    margin-bottom: 10px;
    font-family: "Montserrat", sanr-serif;
    font-size: 20px;
}

.card p {
    font-family: "Open Sans", sans-serif;
    font-size: 15px;
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
