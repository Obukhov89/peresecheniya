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
        <button @click="accept_judge" class="accept_btn_judge">Добавить в жюри</button>
    </div>
</template>

<script>
import Avatar from "vue3-avatar";
export default {
    name: "JudgeCard",
    components:{Avatar},
    props: ['judge_avatar', 'id_contest', 'judge_name', 'id_user'],

    methods: {
        accept_judge(){
            let data = {
                id_user: this.id_user,
                id_contest: this.id_contest
            }
            axios.post('/accept_judge', data).then((response) => {
                console.log(response.data)
            })
        }
    },
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
.accept_btn_judge{
    height: 50px;
    background-color: #ffa51d;
    border: none;
    color: #eeeeee;
    font-family: Montserrat, sans-serif;
    text-transform: uppercase;
    border-radius: 4px;
    box-shadow: 5px 5px 5px 0px rgba(148, 147, 147, 0.3);
}
</style>
