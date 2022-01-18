<template>
  <div class="howto-container container-fluid">
    <h1>Come funziona?</h1>
    
    
      <HowToCards class="container-fluid"/>
    
  </div>
</template>

<script>
import HowToCards from "../components/HowToCards.vue";


export default {
  name: "HowTo",

  components:{
    HowToCards,
  },
};
</script>

<style>
</style>