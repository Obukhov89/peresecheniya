<template>
    <div class="judge_container">
        <Avatar class="avatar_judge"
                :name="this.judge_name"
                size="70"
                background="#ffa51d"
                color="white"
                :imageSrc="this.judge_avatar"
        />
        <p class="judge_name">{{this.judge_name}}</p>
    </div>
</template>

<script>
import Avatar from "vue3-avatar";

export default {
    name: "JudgeInfo",
    components:{Avatar},
    props: ['judge_name', 'judge_avatar'],

    methods:{
        printName(){
            console.log(this.judge_name)
        }
    },
    beforeMount() {
        this.printName()
    }

}
</script>

<style scoped>
.judge_container {
    margin-top: 20px;
    width: 145px;
    height: 200px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
}
.avatar_judge{
    width: 75px;

}
.judge_name{
    font-family: Montserrat, sans-serif;
    color: #4b5563;
    font-size: 18px;
    text-align: center;
}
</style>
