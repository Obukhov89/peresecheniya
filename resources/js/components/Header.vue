<template>
    <div id="header">
        <div class="navbar__contacts"></div>
        <div class="navbar container">
            <div class="navbar__logo" >
                <img src="../../../public/img/logo.png" alt="" />
                <p class="logo_text">Бард-фест</p>
            </div>
            <ul class="navbar__list">
                <div v-for=" folder in folders" :key="folder">
                    <div
                        class="navbar__item navbar__item_dropdown"
                    >
                        {{folder.name}}
                    </div>
                </div>
            </ul>
        </div>
    </div>
</template>

<script>
import ways from "./ways/ways.js";
export default {
    name: "Header",
    methods: {
        toggle: function (idname) {
            if (document.getElementById(idname).style.display == "none") {
                document.getElementById(idname).style.display = "inline";
            } else {
                document.getElementById(idname).style.display = "none";
            }
        },
    },
    data() {
        return {
            folders: ways
        };
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
    padding-left: 20px;
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
