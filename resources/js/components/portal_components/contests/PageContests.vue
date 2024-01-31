<template>
    <div class="container">
        <div class="contests_area">
            <button class="editBtn new_contest_btn">новый конкурс</button>
        </div>
    </div>
    <add-modal>
        <template v-slot:header_modal>
            <p class="header_modal">Новый конкурс</p>
        </template>
        <template v-slot:btnClose>
            <button class="btn_close">X</button>
        </template>
    </add-modal>

</template>

<script>
import axios from "axios";
import AddModal from "../../../modal/AddModal.vue";
export default {
    name: "PageContests",
    components: {AddModal},
    data() {
        return{
            arr_contests: []
        }
    },
    methods: {
        getAllContests() {
            axios.get('/get_list_contests').then((response) => {
                this.arr_contests = response.data
                console.log(this.arr_contests)
            })
        }
    },
    beforeMount() {
        this.getAllContests()
    }
}
</script>

<style scoped>
    .contests_area{
        margin-top: 40px;
    }
    .new_contest_btn{
        float: right;
    }
    .header_modal {
        font-family: Montserrat, sans-serif;
        font-size: 18px;
        color: #eeeeee;
    }
    .btn_close{
        width: 35px;
        height: 35px;
        border: none;
        background-color: #ffa51d;
        color: #eeeeee;
        font-size: 16px;
        margin-left: 280px;
    }
</style>
