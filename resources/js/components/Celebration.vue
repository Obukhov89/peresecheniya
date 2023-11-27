<template>
    <div id="celebration">
        <div class="container">
            <h1 class="main_title">FESTIVAL CELEBRATION</h1>
            <div class="dropdown_questions">
                <div class="main_subtitle question">
                    <span>﹀</span> How Can I Find the Schedule of Live Events??
                </div>
                <div class="main_subtitle question">
                    <span>﹀</span> Whit is the Procedure to Purchase Tickets?
                </div>
                <div class="main_subtitle question">
                    <span>﹀</span> Can i Leave the Festival and Come Back?
                </div>
                <div class="main_subtitle question">
                    <span>﹀</span> The Essential Guide to Upcomming Festivals
                </div>
            </div>
        </div>
        <div class="projects__counter">
            <div class="testimonials">
                <h2 class="main_title">
                    THE ESSENTIAL GUIDE TO UPCOMING FESTIVALS
                </h2>
                <button class="btn btn_orange">Request a qoute</button>
            </div>
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
    text-transform: capitalize;
    text-align: center;
    margin: 20px 0;
    color: #ffffff;
    line-height: 1.5;
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
</style>
