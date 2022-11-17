<script setup>
import {Link} from '@inertiajs/inertia-vue3';
</script>
<template>
    <ul class="menu">
        <li class="menu__item" v-for="(link, index) in menuLinks">
            <Link :href="route('pages.show', { locale: $page.props.locale, slug: link['en'].toLowerCase() })" class="menu__link"
                  :class="[(route().current('pages.show', { slug: link['en'].toLowerCase()})) ? 'active': null]">
                {{ link[$page.props.locale] }}
            </Link>
        </li>
    </ul>
</template>

<script>
export default {
    name: "NavigationList",
    data() {
        return {
            //
        }
    },
    computed: {
        menuLinks: {
            get() {
                return this.$page.props.menuLinks;
            }
        }
    }
};
</script>
