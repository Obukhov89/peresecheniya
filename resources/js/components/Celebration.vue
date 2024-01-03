<template>
    <div id="celebration">
        <div class="container">
            <h1 class="main_title">форма регистрации</h1>
            <div class="dropdown_questions">
                <form class="registration">
                    <label for="fio" class="label_reg">ФИО:</label>
                    <input class="inputReg" type="text" id="fio" name="fio">
                    <label for="tel" class="label_reg">Телефон:</label>
                    <input class="inputReg" type="text" id="tel" >
                    <label class="label_reg" for="email">Email:</label>
                    <input type="text" class="inputReg" id="email">
                    <button class="btn btn_orange">Отправить</button>
                </form>
            </div>
        </div>
        <div class="projects__counter">
        </div>
    </div>
</template>

<script>
export default {
    name: "Celebration",
};
</script>

<style scoped>
#celebration {
    margin: 110px 0 90px;
    padding: 110px 0 0px;
    background-color: #e5e5e595;
}
.dropdown_questions {
    background-color: #ffffff;
    margin: 50px 0px;
}
.question {
    padding: 20px 50px 25px;
    color: #000;
    font-size: 18px;
    border-bottom: 0.5px solid #5267883b;
}
.question span {
    padding-right: 50px;
}

.main_title {
    font-size: 36px;
    text-align: center;
    margin: 20px 0;
    color: #282828;
    line-height: 1.5;
    text-transform: uppercase;
}

.registration{
    display: flex;
    flex-direction: column;
    background-color: #e5e5e595;
}

.inputReg{
    padding-left: 20px;
    width: inherit;
    height: 45px;
    border: 1px solid lightgray;
    border-radius: 5px;
}

.projects__counter {
    background-image: url("../img/../../../../festival/public/img/celebrateBanner.jpg");
    display: flex;
    justify-content: space-around;
}

.testimonials {
    padding: 100px 0 90px;
    width: 750px;
    margin: 0 auto;
}
.btn_orange {
    border-radius: 20px;
    border: none;
    text-transform: uppercase;
}

.label_reg{
    font-family: "Montserrat", sanr-serif;
    padding: 5px;
}
</style>
