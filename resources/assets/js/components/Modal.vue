<template>
    <transition name="slide-fade">
        <div class="modal is-active">
            <div class="modal-background" @click="$emit('close')"></div>
            <div class="modal-content">
                <div class="box">
                    <slot></slot>
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close" @click="$emit('close')"></button>
        </div>
    </transition>
</template>

<script>
    export default {
        mounted() {

        }
    }
</script>
