<template>
    <div id="navbar">
        <div class="container navbar">
            <p class="text_for_niistrom">
                При поддержке
            </p>
            <a style="color: #eeeeee; text-decoration: none" href="https://niistrom.ru">
                <img class="logo_niistrom" src="../../../public/img/niistrom.png">
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Footer",

    data() {
        return {
            gallery: [
                {
                    image: "img/footerGalerry.jpg",
                },
                {
                    image: "img/footerGalerry.jpg",
                },
                {
                    image: "img/footerGalerry.jpg",
                },
                {
                    image: "img/footerGalerry.jpg",
                },
                {
                    image: "img/footerGalerry.jpg",
                },
                {
                    image: "img/footerGalerry.jpg",
                },
                {
                    image: "img/footerGalerry.jpg",
                },
                {
                    image: "img/footerGalerry.jpg",
                },
            ],
        };
    },
};
</script>

<style scoped>
#navbar {
    background-color: #000000;
    color: #fff;
}

.logo_niistrom{
    width: 160px;
    margin: 0 auto;
}

.navbar {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding: 110px 0 90px;
}
.text_for_niistrom {
    font-family: Montserrat, sans-serif;
    color: #fff;
    font-size: 22px;
    font-weight: 200;
    text-transform: uppercase;
}
.main_subtitle {
    padding: 0 0 20px;
    color: #a9aeba;
}
.contact_emoji {
    background-color: orange;
    padding: 10px;
    border-radius: 5px;
}
.contact_content {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    margin-bottom: 20px;
}
.contact_emoji {
    margin-right: 20px;
}
.contact_content .main_subtitle {
    padding: 0;
    line-height: 2;
}
.recent_post_img {
    width: 247px;
}
.posts {
    display: flex;
    flex-direction: column;
    width: 247px;
}
gallery img {
    width: 100px;
}
</style>
