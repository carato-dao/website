<template>
  <div class="progetti-page">
    <Navbar />
    <MenuMobile />

    <div class="progetti-content">
      <h1>Progetti</h1>

      <div class="progetto">
        <a href="https://munnizza.land/" target="_blank">
          <h2>MunnizzaLand</h2>
          <p>
            descrizione - Lorem ipsum dolor sit amet consectetur adipisicing
            elit. Similique?
          </p>
        </a>
      </div>
    </div>

    <Footer />
  </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import Footer from "../components/Footer.vue";
import MenuMobile from "../components/MenuMobile.vue";
export default {
  name: "Progetti",

  components: {
    Navbar,
    Footer,
    MenuMobile,
  },
};
</script>

<style>
</style>