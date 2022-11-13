<script setup>
import {Head} from "@inertiajs/inertia-vue3";
</script>
<template>
    <Head :title="$page.props.title"/>
    <div class="pageLayout defaultLayout">
        <TopNav></TopNav>
        <main class="defaultLayout__main flex">
            <div class="pageLayout__logo">
                <a href="/">
                    <img src="../../images/page_logo.webp">
                </a>
            </div>
            <div class="pageLayout__content px-3 py-8">
                <slot></slot>
            </div>
        </main>
        <FooterNav></FooterNav>
    </div>
</template>
<script>
import TopNav from "@/Navigations/TopNav.vue";
import FooterNav from "@/Navigations/FooterNav.vue";

export default {
    name: 'PageLayout',
    components: {TopNav, FooterNav}
}
</script>
