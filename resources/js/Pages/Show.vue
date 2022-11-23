<template>
    <PageLayout>
        <div class="content" :class="$page.props.page.slug" v-html="$page.props.page.content"></div>
        <div v-if="showContactForm" id='web-form-n7EOJScPaC320h9VNe8K314wzMCrEMsA4p6Z113NJXz5aRYJE6'></div>
    </PageLayout>
</template>

<script>

import PageLayout from "@/Layouts/PageLayout.vue";

export default {
    name: "ProjectPage",
    components: {PageLayout},
    data() {
        return {
            showContactForm: false
        }
    },
    computed: {
        //
    },
    mounted() {
        if (this.$page.props.page.slug === 'contacts') {
            this.showContactForm = true;
            setTimeout(() => {
                if (typeof window.lidFormGlobalInit !== 'undefined') {
                    window.lidFormGlobalInit();
                }
                ;
            }, 100)
        }
    },
    created() {
        console.log(window)
    }
};
</script>
<style>
.adjacent-center {
    max-width: 100% !important;
}
.anonymous-layout-container .center-box {
    max-width: 100% !important;
}
</style>
