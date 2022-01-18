<template>
  <div id="app">
    <vue-scroll-progress-bar height="7px" backgroundColor='#2F4858' />
    <vue-page-transition name="fade-in-up">
    <router-view></router-view>
    </vue-page-transition>
  </div>
</template>


<script>
import { VueScrollProgressBar } from "@guillaumebriday/vue-scroll-progress-bar";

export default {
  components: {
    VueScrollProgressBar,
  },
};
</script>

<style lang="scss">
@import "~bootstrap/scss/bootstrap";
@import "@/assets/scss/style.scss";
@import "@/assets/scss/resp.scss";
@import '~animate.css';

</style>
