<template>
  <nav class="defaultLayout__nav">
    <div class="defaultLayout__nav-container" ref="mobileMenuList">
      <div class="mobile-menu">
        <button class="trigger" @click="menuTrigger">
          <span></span>
          <span></span>
        </button>
      </div>
      <NavList></NavList>
      <LangNav></LangNav>
    </div>
  </nav>
</template>

<script>
import NavList from "./NavList.vue";
import LangNav from "./LangNav.vue";
import Headroom from "headroom.js";

export default {
  name: "TopNav",
  components: {
      NavList,
      LangNav,
  },
  methods: {
    menuTrigger() {
      this.$refs.mobileMenuList.classList.toggle("active");
    },
  },
    mounted() {
        let headerMenu = document.querySelector(".defaultLayout__nav-container");
        let headroom = new Headroom(headerMenu, {
            offset: 63,
            tolerance: 5,
            classes: {
                initial: "headroom",
                pinned: "headroom--pinned",
                unpinned: "headroom--unpinned",
            },
        });
        headroom.init();
    }
};
</script>
