<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>
<template>
  <ul class="menu">
      <li class="menu__item">
      <Link :href="route('project')" class="menu__link" :class="[(route().current('project')) ? 'active': null]">Project</Link>
    </li>
    <li class="menu__item">
      <Link :href="route('house')" class="menu__link" :class="[(route().current('house')) ? 'active': null]">House</Link>
    </li>
    <li class="menu__item">
      <Link :href="route('partners')" class="menu__link" :class="[(route().current('partners')) ? 'active': null]">Partners</Link>
    </li>
    <li class="menu__item">
      <Link :href="route('contacts')" class="menu__link" :class="[(route().current('contacts')) ? 'active': null]">Contacts</Link>
    </li>
  </ul>
</template>

<script>
export default {
  name: "NavigationList",
};
</script>
