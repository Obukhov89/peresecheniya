<template>

    <div class="container">
        <div class="container_buttons-nav">
            <button @click="goHomePage" class="editBtn">В профиль</button>
            <button @click="goToContestList" class="editBtn">К списоку конкурсантов</button>
        </div>
        <p class="title_track">Название композиции: {{ this.name_composition }}</p>
        <audio class="audio" controls preload="auto" :id="this.id_composition" ref="myAudio">
            <source
                :src="audio_src"
                type="audio/mpeg">
        </audio>
    </div>
</template>

<script>
import axios from "axios";
import router from "../../../router";

export default {
    name: "AudioPage",
    data() {
        return {
            id_composition: this.$route.query.composition_id,
            id_author: this.$route.query.author_id,
            id_contest: this.$route.query.id_contest,
            audio_src: '',
            name_composition: ''
        }
    },
    methods: {
        goHomePage() {
            router.push({name: 'HomePage'})
        },
        addInfoTrack() {
            let data = {
                id_composition: this.id_composition
            }
            this.audio_src = new URL(`../../../../../storage/app/public/compositions/8/audio/${this.id_composition}.mp3`,
                import.meta.url).href
            console.log(this.audio_src)
            axios.post('/getAudioComposition', data).then((response) => {
                this.name_composition = response.data;

            })
        },
        goToContestList() {
            router.push({path:'/contest/:contest_id?/', query:{contest_id: this.id_contest}})
        }
    },
    beforeMount() {
        this.addInfoTrack()
    }
}
</script>

<style scoped>
.title_track {
    padding-top: 40px;
    text-align: center;
    font-family: Montserrat, sans-serif;
    font-size: 18px;
    color: #4b5563;
}

.audio {
    margin-top: 100px;
    width: 100%;
    text-align: center;
}
</style>
