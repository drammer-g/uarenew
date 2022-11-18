<script setup>
import {Head} from "@inertiajs/inertia-vue3";
</script>
<template>
    <Head :title="$page.props.title"/>
    <div class="defaultLayout">
        <TopNav></TopNav>
        <main class="defaultLayout__main">
            <slot></slot>
        </main>
        <FooterNav></FooterNav>
    </div>
</template>
<script>
import TopNav from "@/Navigations/TopNav.vue";
import FooterNav from "@/Navigations/FooterNav.vue";

export default {
    components: {TopNav, FooterNav}
}
</script>
