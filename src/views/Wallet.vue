<template>
  <div class="wallet-page container-fluid">
    <Navbar />
    <MenuMobile />
    <div class="wallet-content container-fluid">
      <img src="../assets/img/carato-wallet.png" alt="" />

      <h1>Carato Wallet</h1>

      <div class="wallet-btns container-fluid">
        <button>Scansiona la tua Card Carato</button>
        <button>Crea una nuova Card Digitale</button>
        <a href="">Recupera wallet</a>
      </div>
      <p>2021 Carato - Moneta Virtuosa</p>
    </div>

    <!-- <Footer /> -->
  </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
// import Footer from "../components/Footer.vue";
import MenuMobile from "../components/MenuMobile.vue";

export default {
  name: "Wallet",

  components: {
    Navbar,
    MenuMobile,
    // Footer,
  },
};
</script>

<style>
</style>