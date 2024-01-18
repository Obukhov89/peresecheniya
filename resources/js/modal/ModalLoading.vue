<template>
    <transition name="modal-fade">
        <div class="modal-backdrop">
            <div class="modal_loading"
                 role="dialog"
                 aria-labelledby="modalTitle"
                 aria-describedby="modalDescription">
                <header
                    class="modal-header"
                    id="modalTitle">
                    <p class="modal-header-text">Загрузка нового произведения</p>
                    <slot name="btnClose"></slot>
                </header>
                <div>
                    <slot name="change_bar"></slot>
                    <slot name="info"></slot>
                    <slot name="form"></slot>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: "ModalLoading"
}
</script>

<style scoped>
    .modal-header-text{
        font-family: Montserrat, sans-serif;
        font-size: 18px;
    }

</style>

