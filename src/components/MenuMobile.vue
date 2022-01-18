<template>
  <Slide right :closeOnNavigation="true" noOverlay>
    <ul>
      <li><router-link to="/">Home</router-link></li>
      <li><router-link to="/puntivendita">Punti vendita</router-link></li>
      <li><router-link to="/associazioni">Associazioni</router-link></li>
      <li><router-link to="/eventi">Eventi</router-link></li>
      <li><router-link to="/progetti">Progetti</router-link></li>
      <li><router-link to="/wallet">Wallet</router-link></li>
    </ul>

    <div class="menu-contatti">
      <a href="https://www.facebook.com/caratomonetavirtuosa" target="_blank"
        ><svg
          width="27"
          height="27"
          viewBox="0 0 27 27"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <g clip-path="url(#clip0_124_2)">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M23.7013 0C25.5219 0 27 1.47814 27 3.29875V23.7013C27 25.5219 25.5219 27 23.7013 27H18.0867V16.8267H21.5988L22.2671 12.4698H18.0867V9.64232C18.0867 8.45037 18.6707 7.28847 20.5431 7.28847H22.4438V3.57913C22.4438 3.57913 20.7188 3.28477 19.0697 3.28477C15.6268 3.28477 13.3765 5.37142 13.3765 9.14904V12.4698H9.54941V16.8267H13.3765V27H3.29875C1.47814 27 0 25.5219 0 23.7013V3.29875C0 1.47814 1.47809 0 3.29875 0H23.7013V0Z"
              fill="#6F966B"
            />
          </g>
          <defs>
            <clipPath id="clip0_124_2">
              <rect width="27" height="27" fill="white" />
            </clipPath>
          </defs>
        </svg>
      </a>

    
    </div>
  </Slide>
</template>

<script>
import { Slide } from "vue-burger-menu";

export default {
  name: "MenuMobile",

  data() {
    return {
      menuOpened: false,
      
    };
  },
  components: {
    Slide,
  },


};
</script>

<style>
</style>