<template>
    <div id="about">
        <div class="title">
            <div class="title__small">INTRODUCING Festival Celebration</div>
            <div class="title__big">Festival Event!</div>
            <div class="title__text">
                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                consec tetur, adipisci velit, sed quia non numquam eius modi
                tempora incidunt ut labore et dolore magnam aliquam quaerat vort
            </div>
            <div>
                <a href="#" class="btn btn_orange">Get Tickets</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "About",
};
</script>

<style scoped>
#about {
    background-image: url(../../../../festival/public/img/about-slider1.jpg);
    background-repeat: no-repeat;
    background-size: 100%;
    background-position: top right;
    height: 900px;
    background-color: #ffa51d;
}

.title {
    font-family: "Open Sans", sans-serif;
    line-height: 1.7;
    color: white;
    text-transform: uppercase;
    text-align: center;
    padding: 300px 0 150px 0;
    height: 600px;
}

.title__small {
    font-size: 48px;
}
.title__big {
    font-size: 60px;
    margin: 5px auto 20px auto;
}
.title__text {
    font-size: 18px;
    text-transform: capitalize;
    color: #222;
    margin-bottom: 50px;
    padding: 0px 370px;
}
</style>
