<template>
  <div class="associazioni-page">
    <Navbar />
    <MenuMobile />
    <h1>Associazioni</h1>
    <div class="associazioni-wrapper">
      <AssociazioneCard
        class="col-md"
        v-for="associazione in associazioni"
        :key="associazione.id"
        :foto="associazione.foto"
        :nome="associazione.nome"
        :descrizione="associazione.descrizione"
        :facebook="associazione.facebook"
        :instagram="associazione.instagram"
      />
    </div>
    <Footer />
  </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import Footer from "../components/Footer.vue";
import AssociazioneCard from "../components/AssociazioneCard.vue";
import MenuMobile from "../components/MenuMobile.vue";

export default {
  name: "Associazioni",

  components: {
    Navbar,
    Footer,
    AssociazioneCard,
    MenuMobile,
  },

  data() {
    return {
      associazioni: [
        {
          id: "collettivo ocra",
          nome: "Collettivo Ocra",
          foto: "collettivo-ocra-logo.png",
          descrizione: `Associazione culturale impegnata nella promozione di iniziative didattico-artistiche e riqualificazione artistica del contesto urbano.`,
          facebook: "https://www.facebook.com/collettivoOCRA/",
          instagram: "https://www.instagram.com/collettivoocra/",
        },
        {
          id: "ccn antica ibla",
          nome: "CCN Antica Ibla",
          foto: "antica-ibla-logo.png",
          descrizione: `È un progetto innovativo sostenuto da 90 imprese unite con l'obiettivo di valorizzare al meglio il quartiere barocco di Ragusa Ibla.`,
          facebook: "https://www.facebook.com/anticaiblaccn/",
          instagram: "https://www.instagram.com/anticaibla/",
        },

        {
          id: "legambiente",
          nome: "Legambiente",
          foto: "legambiente-logo.png",
          descrizione: `Il Circolo del Carrubo si ispira ai grandi valori di tutela dell’ambiente e del territorio, è oggi l’associazione ambientalista più diffusa sul nostro territorio.`,
          facebook: "https://www.facebook.com/legambienteragusa",
          instagram: "https://www.instagram.com/legambienteragusa/",
        },

        {
          id: "insieme in città",
          nome: "Insieme in città",
          foto: "insieme-in-citta-logo.jpg",
          descrizione: `Opera per la valorizzazione del centro storico di Ragusa Superiore e la creazione di una mappa di comunità fatta di saperi condivisi ed esperienze collettive.`,
          facebook: "",
          instagram: "",
        },

        {
          id: "puliamo chiaramonte",
          nome: "Puliamo Chiaramonte",
          foto: "puliamo-chiaramonte-logo.png",
          descrizione: `Amore per l’ambiente, volontariato e senso civico al servizio della collettività. Un progetto, un'idea, un aggregatore, un sogno.`,
          facebook: "https://www.facebook.com/puliamochiaramonte21/",
          instagram: "",
        },

        {
          id: "kanimannira",
          nome: "Kanimannira",
          foto: "kanimannira-logo.png",
          descrizione: `Associazione naturalistica promotrice di attività escursionistiche e progetti di tutela ambientale e socialità del bosco.`,
          facebook: "https://www.facebook.com/Kanimannira",
          instagram: "",
        },

        {
          id: "uici ragusa",
          nome: "UICI Ragusa",
          foto: "uici-ragusa-logo.jpg",
          descrizione: `Promuove e sostiene l’inclusione sociale delle persone con disabilità visiva e con minorazioni aggiuntive su tutto il territorio ibleo.`,
          facebook: "https://www.facebook.com/UnioneItalianaCiechiRagusa/",
          instagram: "",
        },

        {
          id: "rimboschiamo",
          nome: "Rimboschiamo",
          foto: "rimboschiamo-logo.jpg",
          descrizione: `Organizzazione di volontariato attiva e promotrice del recupero dei boschi autoctoni, la forestazione urbana e l'educazione ambientale.`,
          facebook: "https://www.facebook.com/RimboschiAmo-111898316905052/",
          instagram: "",
        },
      ],
    };
  },
};
</script>

<style>
</style>