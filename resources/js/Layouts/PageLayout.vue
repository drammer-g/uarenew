<script setup>
import {Head} from "@inertiajs/inertia-vue3";
</script>
<template>
    <Head :title="$page.props.page.title"/>
    <div class="pageLayout defaultLayout">
        <TopNav></TopNav>
        <main class="defaultLayout__main flex">
            <div id="pageLayout__sidebar">
                <div class="pageLayout__logo">
                    <a :href="`/${$page.props.locale}/`">
                        <img src="../../images/page_logo.webp">
                    </a>
                </div>
            </div>
            <div class="pageLayout__content pl-8 pr-10 pb-8">
                <h1 class="py-6 pageLayout__title">{{ menuLinks[$page.props.page.slug][$page.props.locale] }}</h1>
                <slot></slot>
            </div>
        </main>
        <FooterNav></FooterNav>
    </div>
</template>
<script>
import TopNav from "@/Navigations/TopNav.vue";
import FooterNav from "@/Navigations/FooterNav.vue";
import StickySidebar from 'sticky-sidebar';

export default {
    name: 'PageLayout',
    components: {TopNav, FooterNav},
    methods: {
        fixedSidebar() {
            const sidebar = new StickySidebar('#pageLayout__sidebar', {
                containerSelector: '.defaultLayout__main',
                innerWrapperSelector: '.pageLayout__logo',
                topSpacing: 50,
                bottomSpacing: 20,
                resizeSensor: true,
                minWidth: 992
            });
        }
    },
    computed: {
        menuLinks: {
            get() {
                return this.$page.props.menuLinks;
            }
        }
    },
    mounted() {
        this.fixedSidebar();
    }
}
</script>
