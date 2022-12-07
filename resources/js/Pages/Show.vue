<template>
    <PageLayout>
        <div class="content" :class="$page.props.page.slug" v-html="$page.props.page.content"></div>
        <WebForm v-if="showContactForm"></WebForm>
    </PageLayout>
</template>

<script>

import PageLayout from "@/Layouts/PageLayout.vue";
import WebForm from "@/Components/WebForm.vue";

export default {
    name: "ProjectPage",
    components: {PageLayout, WebForm},
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
