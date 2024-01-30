<template>
    <table class="table_audio">
        <tr v-for="(audio, number) in tracks" :key="audio.id">
            <td class="counter_track">{{ number + 1 }}</td>
            <td class="audio_item">
                <p class="title_track">{{ audio.name_composition }}</p>
                <audio class="audio" controls preload="auto" :id="audio.id" ref="myAudio">
                    <source
                        :src="audio.src"
                        type="audio/mpeg">
                </audio>
            </td>
            <td>
                <button @click="delete_audio(audio.id, audio.author_id)" class="del_btn">Удалить</button>
            </td>
        </tr>
    </table>
</template>

<script>

import axios from "axios";

export default {
    name: "AudioPanel",
    props: ['audio_list'],
    data() {
        return {
            tracks: []
        }
    },

    methods: {
        add_tracks() {
            this.audio_list.forEach((item, idx) => {
                let file_way =
                    new URL(`../../../../storage/app/public/compositions/${item.id_author}/audio/${item.id}.mp3`, import.meta.url)
                this.tracks.push({
                    id: item.id,
                    author_id: item.id_author,
                    author: `${this.getLastName} ${this.getFirstName}`,
                    name_composition: item.name_composition,
                    src: file_way
                })

            })
        },

        delete_audio(id_audio, author_id) {
            let delete_data = {
                audioId: id_audio,
                authorId: author_id
            }
            axios.post('/delete_audio', delete_data).then((response) => {
                console.log(response.data)
                this.arr_audio = this.arr_audio.filter(item => item.id !== id_audio)
            })
        }
    },
    mounted() {
        this.add_tracks()
    }
}
</script>

<style scoped>
.table_audio {
    padding-top: 1rem;
    width: 100%;
    border-collapse: collapse;
}

.table_audio tr {
    border-bottom: 1px solid lightgrey;
}

.audio {
    width: 700px;
}

.title_track {
    font-family: Montserrat, sans-serif;
    font-size: 14px;
    padding-top: 20px;
}

.counter_track {
    width: 60px;
    font-family: Montserrat, sans-serif;
}

.del_btn {
    width: 140px;
    height: 30px;
    background-color: #9f4848;
    border: none;
    color: #eeeeee;
    border-radius: 3px;
}
</style>
