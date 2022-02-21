<template>
  <footer>
    <div class="footer-links">
      <img src="../assets/img/carato-wallet.png" draggable="false" />
      <a href="https://www.facebook.com/caratomonetavirtuosa" target="_blank">Facebook</a>
      <a href="https://www.instagram.com/carato_monetavirtuosa/" target="_blank">Instagram</a>
      <a v-clipboard:copy="toCopy" @click="onCopy">{{ link }}</a>
    </div>

    <div class="copy">
      <p>
        &#60;/&#62; with
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 17.12">
          <g id="Livello_2" data-name="Livello 2">
            <g id="Livello_1-2" data-name="Livello 1">
              <path
                d="M17.29,1.38l0,0c-2.2-2.17-5.47-1.46-7.76.38h0C7.21-.12,3.94-.83,1.74,1.34l0,0a5.89,5.89,0,0,0,0,8.33l7.08,7.13a1,1,0,0,0,.68.28h0a1,1,0,0,0,.68-.28l7.08-7.13A5.89,5.89,0,0,0,17.29,1.38Zm-1.35,7,0,0L9.5,14.82h0L3.08,8.36l0,0a4,4,0,0,1,0-5.64c1.49-1.48,4.09-.66,5.75,1a1,1,0,0,0,.67.27h0a1,1,0,0,0,.67-.27c1.66-1.63,4.26-2.45,5.75-1A4,4,0,0,1,15.94,8.33Z"
              />
            </g>
          </g>
        </svg>
        by <a href="https://yomi.digital/" target="_blank">Yomi</a>
      </p>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer",

  data: function () {
    return {
      link: "Email",
      toCopy: "caratomonetavirtuosa@gmail.com",
    };
  },

  methods: {
    onCopy() {
      this.link = "Copiato!";
      var v = this;

      setTimeout(function () {
        v.link = "Email";
      }, 1500);
    },
  },
};
</script>

<style>
</style>