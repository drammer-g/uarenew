<template>
  <footer class="defaultLayout__footer">
    <div class="defaultLayout__footer-navigation">
      <span class="triangle"></span>
      <div class="footer-navigation__copyright">
        <p>© 2022 UaRenew Homes Project</p>
      </div>
    </div>
  </footer>
</template>

<script>
import NavList from "./NavList.vue";
export default {
  name: "FooterNav",
  components: {
      NavList,
  },
};
</script>
