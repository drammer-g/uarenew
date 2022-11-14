<script setup>
import {Link} from '@inertiajs/inertia-vue3';
</script>
<template>
  <ul class="menu menu-languages">
    <li class="menu__item">
      <Link :href="route('set_locale', {locale: 'en'})" class="menu__link"
            :class="[($page.props.locale === 'en') ? 'active': null]">EN</Link>
    </li>
    <li class="menu__item">
        <Link :href="route('set_locale', {locale: 'pl'})" class="menu__link"
              :class="[($page.props.locale === 'pl') ? 'active': null]">PL</Link>
    </li>
    <li class="menu__item">
        <Link :href="route('set_locale', {locale: 'ua'})" class="menu__link"
              :class="[($page.props.locale === 'ua') ? 'active': null]">UA</Link>
    </li>
  </ul>
</template>

<script>
export default {
  name: "NavigationLanguages",
};
</script>
