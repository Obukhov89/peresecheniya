<template>
    <div id="header">
        <div class="navbar__contacts"></div>
        <div class="navbar container">
            <div class="navbar__logo">
                <img src="../../../../festival/public/img/logo.png" alt="" />
            </div>
            <ul class="navbar__list">
                <div v-for="folder in folders" :key="folder">
                    <div
                        class="navbar__item navbar__item_dropdown"
                        @mouseover="toggle(folder.name)"
                    >
                        {{ folder.name }}
                    </div>

                    <div v-show="false" :id="folder.name">
                        <div v-for="page in folder.pages" :key="page">
                            <div
                                class="navbar__item navbar__item_dropdown_item"
                                style="background-color: #ffa51d"
                            >
                                {{ page.name }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <li class="navbar__item">home</li>
                <li class="navbar__item">about</li>
                <li class="navbar__item">services</li>
                <li class="navbar__item">projects</li>
                <li class="navbar__item">pages</li>
                <li class="navbar__item">shop</li>
                <li class="navbar__item">blog</li>
                <li class="navbar__item">contact</li> -->
            </ul>
            <div class="search">
                <img
                    src="../../../../festival/public/img/header-search.png"
                    alt=""
                />
            </div>
        </div>
    </div>
</template>

<script>
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
            folders: [
                {
                    name: "home",
                },

                {
                    name: "about",
                },
                {
                    name: "services",
                    pages: [{ name: "services" }, { name: "services details" }],
                },
                {
                    name: "projects",
                    pages: [
                        { name: "projects 1" },
                        { name: "project details 1" },
                        { name: "project details 2" },
                    ],
                },
                {
                    name: "pages",
                    pages: [
                        { name: "team" },
                        { name: "pricing" },
                        { name: "faqs" },
                        { name: "process" },
                        { name: "testimonials" },
                        { name: "404 page" },
                    ],
                },
                {
                    name: "shop",
                    pages: [
                        { name: "shop filter full" },
                        { name: "shop left sidebar" },
                    ],
                },
                {
                    name: "blog",
                    pages: [
                        { name: "blog post 1" },
                        { name: "blog post 2" },
                        { name: "blog details" },
                    ],
                },
                {
                    name: "contact",
                },
            ],
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
    color: white;
}

.navbar__list {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    cursor: pointer;
}
</style>
