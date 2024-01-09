<template>
    <div id="header">
        <div class="navbar__contacts"></div>
        <div class="navbar container">
            <div class="navbar__logo" >
                <img src="../../../public/img/logo.png" alt="" />
                <p class="logo_text">Бард-фест</p>
            </div>
            <ul class="navbar__list">
                <div >
                    <a href="#festival" class="navbar__item navbar__item_dropdown">Номинации</a>
                    <a href="#projects" class="navbar__item navbar__item_dropdown">Организаторы</a>
                    <a href="#projects-greyModule" class="navbar__item navbar__item_dropdown">Он-лайн конкурс</a>
                    <a href="#" class="navbar__item navbar__item_dropdown">Положение</a>
                    <a href="#entrants" class="navbar__item navbar__item_dropdown">Участники</a>
                    <a href="#experts" class="navbar__item navbar__item_dropdown">Жюри</a>
                    <a href="#" class="navbar__item navbar__item_dropdown">Контакты</a>
                    <a @click="goAuth" href="#" class="navbar__item navbar__item_dropdown">Вход</a>
                </div>
            </ul>
        </div>
    </div>
</template>

<script>
import router from "../router";

export default {
    name: "Header",
    data() {
        return {
        };
    },
    methods: {
        goAuth(){
            router.push({name:'Login'})
        }
    },
};
</script>

<style scoped>
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 100px;
}
.navbar__contacts {
    height: 60px;
    background-color: #ffa51d;
}
.navbar__list {
    text-transform: uppercase;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 16px;
    line-height: 1.42857143;
    color: #333;
    font-weight: 600;
}
.navbar__item {
    text-decoration: none;
    padding-left: 20px;
    color: #222222;
}
.navbar__item_dropdown_item {
    color: rgb(255, 255, 255);
    width: 215px;
}

.search img {
    height: 20px;
}

.navbar__logo {
    width: 200px;
    display: flex;
    align-items: center;
}

.logo_text{
    padding-left: 20px;
    font-family: "Helvetica Neue", sans-serif;
    font-size: 20px;
    color: #ae4d03;
    font-weight: 600;
}

.navbar__list {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    cursor: pointer;
}
</style>
