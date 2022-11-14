<script setup>
import {Link} from '@inertiajs/inertia-vue3';
</script>
<template>
    <ul class="menu">
        <li class="menu__item">
            <Link :href="route('pages.show', { locale: $page.props.locale, slug: 'project' })" class="menu__link"
                  :class="[(route().current('pages.show', { slug: 'project'})) ? 'active': null]">Project
            </Link>
        </li>
        <li class="menu__item">
            <Link :href="route('pages.show', { locale: $page.props.locale, slug: 'house' })" class="menu__link"
                  :class="[(route().current('pages.show', { slug: 'house'})) ? 'active': null]">House
            </Link>
        </li>
        <li class="menu__item">
            <Link :href="route('pages.show', {locale: $page.props.locale, slug: 'partners' })" class="menu__link"
                  :class="[(route().current('pages.show', { slug: 'partners'})) ? 'active': null]">Partners
            </Link>
        </li>
        <li class="menu__item">
            <Link :href="route('pages.show', {locale: $page.props.locale, slug: 'contacts' })" class="menu__link"
                  :class="[(route().current('pages.show', {slug: 'contacts'})) ? 'active': null]">Contacts
            </Link>
        </li>
    </ul>
</template>

<script>
export default {
    name: "NavigationList",
};
</script>
