<template>
    <div id="navbar">
        <div class="container navbar">
            <div class="galerry">
                <h1 class="main_title">Flickr galerry</h1>
                <Gallery v-for="galerry in galerries" :key="galerry">
                    <img :src="galerry.image" alt="" />
                </Gallery>
            </div>
            <div class="posts">
                <h1 class="main_title">Resent posts</h1>
                <a href=""
                    ><img
                        class="recent_post_img"
                        src="../../../public/img/footer.jpg"
                        alt=""
                /></a>
                <a href="" class="main_subtitle"
                    >Pellentesque velit mauris, cursus id eros.</a
                >
                <p class="main_subtitle">DEEC 23,2021</p>
            </div>
            <div class="links">
                <h1 class="main_title">Useful Link</h1>
                <li class="main_subtitle">○ About Us</li>
                <li class="main_subtitle">○ Calsses Timetable</li>
                <li class="main_subtitle">○ Popular Classes</li>
                <li class="main_subtitle">○ Shop Product</li>
                <li class="main_subtitle">○ Trainers</li>
                <li class="main_subtitle">○ Recent News</li>
                <li class="main_subtitle">○ Contact Us</li>
            </div>
            <div class="contact">
                <h1 class="main_title">Contact</h1>
                <li class="contact_content">
                    <div class="contact_emoji">✉</div>
                    <div class="main_subtitle">
                        Phone: +6789-875-2235<br />
                        Fax: +2390-875-2235
                    </div>
                </li>
                <li class="contact_content">
                    <div class="contact_emoji">✉</div>
                    <div class="main_subtitle">
                        info@example.com<br />
                        info@example.com
                    </div>
                </li>
                <li class="contact_content">
                    <div class="contact_emoji">✉</div>
                    <div class="main_subtitle">
                        New Hampshire Avenue<br />
                        North #100, New York-2573
                    </div>
                </li>
            </div>
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
    align-items: flex-start;
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
