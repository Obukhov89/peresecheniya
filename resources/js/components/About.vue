<template>
    <div id="about">
        <div class="title">
            <div class="title__small">Третий ежегодный фестиваль<br>авторской песни<br>КАП "Паруса Надежды"</div>
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

    background-image: url('../../../public/img/slider.png');
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
    padding: 30px 0 150px 30px;
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
