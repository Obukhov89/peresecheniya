<template>
    <div class="wrapper">
        <div class="container get_started">
            <a href="#" class="btn btn_blue">Get Started</a>
            <p>LIVE EVERY DAY AS IF IT IS A FESTIVAL</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "About",
};
</script>

<style scoped>
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
