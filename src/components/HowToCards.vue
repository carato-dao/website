<template>
  <div>
    <flickity ref="flickity" :options="flickityOptions">
      <div class="carousel-cell">
        <div class="howtocard">
          <h2>1</h2>
          <div class="howto-txt">
            <p>
              Scarica sul tuo cellulare la Web App di Carato.
              <br />
              Qui hai la possibilità di creare la tua card Carato digitale
              dotata di QR-CODE che ti servirà per partecipare alle attività. Scegli il tuo PIN e conservalo, ti servirà per scambiare Carato.
            </p>
          </div>
          <div class="shadow-wrapper"></div>
        </div>
      </div>
      <div class="carousel-cell">
        <div class="howtocard">
          <h2>2</h2>
          <div class="howto-txt">
            <p>
              Svolta un’attività fai scansionare la tua card per poter
              ricevere il meritato Carato.
              <br />
              Non preoccuparti se non ti arriva immediatamente!
            </p>
          </div>
          <div class="shadow-wrapper"></div>
        </div>
      </div>
      <div class="carousel-cell">
        <div class="howtocard">
          <h2>3</h2>
          <div class="howto-txt">
            <p>
              Selezionato l’esercente presso il quale vuoi spendere
              Carato, dovrai far scansionare la card con l’app del punto
              vendita scelto e digitare il tuo PIN. <br />

              È semplicissimo, la logica di funzionamento non cambia da quella
              di un POS!
            </p>
          </div>
          <div class="shadow-wrapper"></div>
        </div>
      </div>
    </flickity>
  </div>
</template>

<script>
import Flickity from "vue-flickity";
export default {
  name: "HowToCards",

  components: {
    Flickity,
  },

  data() {
    return {
      flickityOptions: {
        initialIndex: 0,
        prevNextButtons: true,
        pageDots: false,
        wrapAround: false,
        draggable: true,
      },
    };
  },

  methods: {
    next() {
      this.$refs.flickity.next();
    },

    previous() {
      this.$refs.flickity.previous();
    },
  },
};
</script>

<style>
</style>