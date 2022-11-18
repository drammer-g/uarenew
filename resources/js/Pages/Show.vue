<template>
    <PageLayout>
        <div class="content" :class="$page.props.page.slug" v-html="$page.props.page.content"></div>
    </PageLayout>
</template>

<script>

import PageLayout from "@/Layouts/PageLayout.vue";

export default {
    name: "ProjectPage",
    components: {PageLayout},
};
</script>
