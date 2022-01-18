<template>
  <div class="card-container">
    <Card
      v-for="card in cards"
      :key="card.id"
      :title="card.title"
      :description="card.description"
    ></Card>
  </div>
</template>

<script>
import Card from "./Card.vue";

export default {
  name: "CardContainer",

  components: {
    Card,
  },

  data() {
    return {
      cards: [
        {
          id: "carato",
          title: "Carato",
          description:
            "È una moneta digitale, token, creato grazie alla tecnologia blockchain.",
        },
        {
          id: "comunità",
          title: "Comunità",
          description:
            "Sii parte attiva di un cambiamento positivo. Solo insieme possiamo migliorare la realtà che ci circonda e creare un impatto positivo.",
        },
        {
          id: "associazioni",
          title: "Associazioni",
          description:
            "Eventi, incontri e attività promosse con obiettivi e valori condivisi. Attivismo sociale per un aiuto concreto e una trasformazione del territorio in cui viviamo.",
        },
        {
          id: "esercenti",
          title: "Esercenti",
          description:
            "Guidati dai valori di sostenibilità con grande entusiasmo mettono a disposizione della comunità carato degli sconti speciali per premiare le buone azioni.",
        },
      ],
    };
  },
};
</script>

<style>
</style>