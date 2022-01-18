<template>
  <div class="punti-vendita-page">
    <Navbar />
    <MenuMobile />
    <h1>Punti vendita</h1>
    <div class="categorie">
      <div
        id="punti-vendita"
        name="punti vendita"
        @click="showTags = !showTags"
      >
        <button
          class="categorie-btn"
          :style="showTags ? 'border-bottom: 0' : ''"
        >
          {{ tagSelected }}
          <img
            class="select-arrow"
            src="../assets/img/arrow_down.svg"
            draggable="false"
          />
        </button>
        <div class="categorie-nomi" v-show="showTags">
          <div
            class="categorie-tags"
            v-for="tag in tags"
            @click="changeTag(tag)"
            :key="tag"
            v-show="tag != tagSelected"
          >
            {{ tag }}
          </div>
        </div>
      </div>
    </div>

    <div class="punti-vendita-wrapper">
      <PuntoVendita
        v-for="puntovendita in puntivendita.filter((el) =>
          this.tagSelected != 'Mostra tutti'
            ? el.tag === this.tagSelected
            : true
        )"
        :key="puntovendita.id"
        :foto="puntovendita.foto"
        :tag="puntovendita.tag"
        :nome="puntovendita.nome"
        :indirizzo="puntovendita.indirizzo"
      />
    </div>
    <Footer />
  </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import Footer from "../components/Footer.vue";
import PuntoVendita from "../components/PuntoVendita.vue";
import MenuMobile from "../components/MenuMobile.vue";

export default {
  name: "Puntivendita",

  components: { Navbar, Footer, PuntoVendita, MenuMobile },

  methods: {
    changeTag(tag) {
      this.tagSelected = tag;
    },
  },

  data() {
    return {
      tagSelected: "Mostra tutti",
      showTags: false,

      tags: [
        "Mostra tutti",
        "Ristoranti",
        "Food",
        "Negozi",
        "Agroalimentare",
        "Artigianato",
        "Farmacie",
        "Servizi",
      ],

      puntivendita: [
        {
          id: "punto 1",
          tag: "Ristoranti",
          foto: "punto-vendita-1.png",
          nome: "Ristorante 1",
          indirizzo: "Via pluto 15, Ragusa",
        },
        {
          id: "punto 2",
          tag: "Food",
          foto: "punto-vendita-2.png",
          nome: "Food 1",
          indirizzo: "Via pluto 15, Ragusa",
        },
        {
          id: "punto 3",
          tag: "Ristoranti",
          foto: "punto-vendita-3.png",
          nome: "Ristorante 2",
          indirizzo: "Via pluto 15, Ragusa",
        },
        {
          id: "punto 4",
          tag: "Negozi",
          foto: "punto-vendita-4.png",
          nome: "Negozio 1",
          indirizzo: "Via pluto 15, Ragusa",
        },
        {
          id: "punto 5",
          tag: "Negozi",
          foto: "punto-vendita-4.png",
          nome: "Negozio 1",
          indirizzo: "Via pluto 15, Ragusa",
        },
        {
          id: "punto 6",
          tag: "Negozi",
          foto: "punto-vendita-4.png",
          nome: "Negozio 1",
          indirizzo: "Via pluto 15, Ragusa",
        },
        {
          id: "punto 7",
          tag: "Negozi",
          foto: "punto-vendita-4.png",
          nome: "Negozio 1",
          indirizzo: "Via pluto 15, Ragusa",
        },
      ],
    };
  },
};
</script>


<style>
</style>