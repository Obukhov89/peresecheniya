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
                    <slot name="header_modal"></slot>
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
    name: "AddModal"
}
</script>

<style scoped>
.modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;

}

.modal {
    margin-top: 50px;
    width: 500px;
    height: 250px;
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
}

.modal-header,
.modal-footer {
    padding: 15px;
    display: flex;
}

.modal-header {
    background: #ffa51d;
    height: 25px;
    border-bottom: 1px solid #eeeeee;
    color: #eeeeee;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
