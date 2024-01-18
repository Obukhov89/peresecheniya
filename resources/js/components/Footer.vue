<template>
    <div id="navbar">
        <div class="container navbar">

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

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 110px 0 90px;
}
.main_title {
    color: #fff;
    font-size: 18px;
    font-weight: 200;
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
