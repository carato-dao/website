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
          foto: "ES_ris_camiolo.png",
          nome: "Camiolo",
          indirizzo: "Ragusa, Via Matteotti, 71",
        },
        {
          id: "punto 2",
          tag: "Food",
          foto: "ES_ris_bistrot.png",
          nome: "Exè Bistrot",
          indirizzo: "Ragusa, Calle Bartolotti",
        },
        {
          id: "punto 3",
          tag: "Ristoranti",
          foto: "ES_ris_primaclasse.jpeg",
          nome: "Prima Classe",
          indirizzo: "Ragusa, Via Ercolano, 7",
        },
        {
          id: "punto 4",
          tag: "Ristoranti",
          foto: "ES_ris_sottosale.jpeg",
          nome: "SottoSale",
          indirizzo: "Ragusa, Via Venezia, 18",
        },

        {
          id: "punto 5",
          tag: "Ristoranti",
          foto: "ES_ris_cumannanti.png",
          nome: "Trattoria Nto' Cumannanti",
          indirizzo: "Ragusa, Via Archimede, 147",
        },
        {
          id: "punto 6",
          tag: "Servizi",
          foto: "ES_ser_barbering.jpeg",
          nome: "Art of Barbering",
          indirizzo: "Ragusa, Viale Europa, 294",
        },
        {
          id: "punto 7",
          tag: "Servizi",
          foto: "ES_ser_shumare.jpeg",
          nome: "Sherpa delle shumare",
          indirizzo: "Ragusa",
        },
        {
          id: "punto 8",
          tag: "Servizi",
          foto: "ES_ser_fototidona.jpeg",
          nome: "Studio Fotografico Emiliano Tidona",
          indirizzo: "Ragusa, Viale Europa, 21",
        },
        {
          id: "punto 9",
          tag: "Negozi",
          foto: "ES_neg_innovamove.jpeg",
          nome: "Innova Move",
          indirizzo: "Ragusa, Via Archimede, 73",
        },
        {
          id: "punto 10",
          tag: "Negozi",
          foto: "ES_neg_formiche.jpeg",
          nome: "Le Formiche",
          indirizzo: "Ragusa, Via Ozanam, 2/A",
        },
        {
          id: "punto 11",
          tag: "Negozi",
          foto: "ES_neg_flaccavento.jpeg",
          nome: "Libreria Flaccavento",
          indirizzo: "Ragusa, Piazza Matteotti, 99",
        },
        {
          id: "punto 12",
          tag: "Negozi",
          foto: "ES_neg_mercatopoli.jpeg",
          nome: "Mercatopoli",
          indirizzo: "Ragusa, Via Mongibello, 81",
        },
        {
          id: "punto 13",
          tag: "Negozi",
          foto: "ES_neg_beauty.jpeg",
          nome: "Natural Beauty",
          indirizzo: "Ragusa, Via Archimede, 119",
        },
        {
          id: "punto 14",
          tag: "Negozi",
          foto: "ES_neg_naturalbio.jpeg",
          nome: "Natural Bio",
          indirizzo: "Ragusa, Via dei Platani, 55",
        },
        {
          id: "punto 15",
          tag: "Negozi",
          foto: "ES_neg_tabtidona.jpeg",
          nome: "Tabacchi Tidona",
          indirizzo: "Ragusa, Corso Vittorio Veneto, 120",
        },
        {
          id: "punto 16",
          tag: "Negozi",
          foto: "ES_neg_ubikibla.jpeg",
          nome: "Ubik Ibla",
          indirizzo: "Ragusa, Corso XXV Aprile, 17",
        },
        {
          id: "punto 17",
          tag: "Food",
          foto: "ES_food_lagrotta.png",
          nome: "La Grotta",
          indirizzo: "Ragusa, Via Carta, 8",
        },
        {
          id: "punto 18",
          tag: "Farmacie",
          foto: "ES_far_farmibla.jpeg",
          nome: "Parafarmacia Ibla",
          indirizzo: "Ragusa, Largo Camerina, 19",
        },
        {
          id: "punto 19",
          tag: "Artigianato",
          foto: "ES_art_sartabri.jpeg",
          nome: "SArtaBRÌ",
          indirizzo: "Ragusa",
        },
        {
          id: "punto 20",
          tag: "Artigianato",
          foto: "ES_art_proxima.jpeg",
          nome: "Sartoria Sociale Proxima",
          indirizzo: "Ragusa, Via Spataro, 17/A",
        },
        {
          id: "punto 21",
          tag: "Agroalimentare",
          foto: "ES_agro_custodi_sensi.jpeg",
          nome: "Food Custodi dei Sensi",
          indirizzo: "Ragusa, Via Lombardia, 76",
        },
        {
          id: "punto 22",
          tag: "Agroalimentare",
          foto: "ES_agro_hyblasus.png",
          nome: "Hyblasus",
          indirizzo: "Ragusa, Via Lazio, 64",
        },
        {
          id: "punto 23",
          tag: "Agroalimentare",
          foto: "ES_agro_proxima.jpeg",
          nome: "Orti Sociali Proxima",
          indirizzo: "Ragusa, Via Monti Iblei, 45",
        },
        {
          id: "punto 24",
          tag: "Agroalimentare",
          foto: "ES_agro_verdevigna.png",
          nome: "Verde Vigna",
          indirizzo: "Ragusa, Via Nenni, 9",
        },
      ],
    };
  },
};
</script>


<style>
</style>