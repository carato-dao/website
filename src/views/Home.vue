<template>
  <div>
    <Navbar />
    <MenuMobile />
    <div class="homepage-container container-fluid">
      <div class="homepage-content">
        <h1>Una buona azione <br />non è mai perduta</h1>
        <div>
          <p>
            Partecipa alle attività delle associazioni e ricevi Carato,
            <br />
            la moneta delle buone azioni.
          </p>
        </div>
      </div>

      <button>
        <a href="#carato"
          ><p>Inizia</p>
          <img src="../assets/img/arrow_down.svg" class="animate__animated animate__shakeY animate__slower 8s animate__infinite	infinite"
        /></a>
      </button>
    </div>

    <div id="carato"><WhatsCarato /></div>

    <Legenda />
    <HowTo />
    <Footer />
  </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import WhatsCarato from "../components/WhatsCarato.vue";
import Legenda from "../components/Legenda.vue";
import HowTo from "../components/HowTo.vue";
import Footer from "../components/Footer.vue";
import MenuMobile from "../components/MenuMobile.vue";

export default {
  name: "Home",

  components: {
    Navbar,
    WhatsCarato,
    HowTo,
    Footer,
    Legenda,
    MenuMobile,
  },
};
</script>



<style>
</style>