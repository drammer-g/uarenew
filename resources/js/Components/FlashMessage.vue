<template>
    <div v-if="message" class="flash-message relative" :class="flashType">
        {{ message }}
        <span @click="close" class="close-flash">x</span>
    </div>
</template>

<script>
export default {
    name: "FlashMessage",
    props: {
        flash: Object
    },
    data() {
        return {
            flashType: '',
            showFlash: false
        }
    },
    methods: {
        close() {
            this.flash.message = '';
            this.flash.success = ''
        }
    },
    computed: {
        message: {
            get() {
                if (this.flash?.message) {
                    this.flashType = 'alert';
                    this.showFlash = true;
                    return this.flash.message;
                }
                if (this.flash?.success) {
                    this.flashType = 'success';
                    this.showFlash = true;
                    return this.flash.success;
                }
            }
        }
    }
}
</script>
