<template>
  <div class="eventi-page">
    <Navbar />
    <MenuMobile />
    <div class="eventi-text">
      <h1>Partecipa agli eventi per ricevere Carati</h1>
      <p>
        Lasciati coinvolgere dalle proposte delle nostre associazioni e
        arricchisci la tua vita di esperienze condivise.
      </p>
    </div>

    <div class="eventi-cards">
      <CardEventi
        class="col-md"
        v-for="evento in eventi"
        :key="evento.id"
        :associazione="evento.associazione"
        :nomeEvento="evento.nomeEvento"
        :giorno="evento.giorno"
        :orario="evento.orario"
        :dove="evento.dove"
      ></CardEventi>
    </div>

    <Footer />
  </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import Footer from "../components/Footer.vue";
import CardEventi from "../components/CardEventi.vue";
import MenuMobile from "../components/MenuMobile.vue";

export default {
  name: "Eventi",

  components: {
    Navbar,
    CardEventi,
    Footer,
    MenuMobile,
  },

  data() {
    return {
      eventi: [
        {
          id: "ragusa attiva",
          associazione: "Ragusa Attiva",
          nomeEvento: "RiattiviAmo C.da Grassullo",
          giorno: "19/09/2021",
          orario: "9:00",
          dove: "C.da Grassullo",
        },
        {
          id: "kanimannira",
          associazione: "KANIMANNIRA",
          nomeEvento: "Raccontinelbosco / kanstarsnight",
          giorno: "3/07/2021",
          orario: "16:00 - 22:00",
          dove: "Ragusa",
        },
        {
          id: "puliamo chiaramonte",
          associazione: "puliamo chiaramonte",
          nomeEvento: "Puliamo Chiaramonte",
          giorno: "23/05/2021",
          orario: "",
          dove: "Chiaramonte Gulfi",
        },
        {
          id: "collettivo ocra",
          associazione: "Collettivo Ocra",
          nomeEvento: "Ibla in bicicletta",
          giorno: "26/05/2021",
          orario: "18:00",
          dove: "Ibla",
        },
      ],
    };
  },
};
</script>

<style>
</style>