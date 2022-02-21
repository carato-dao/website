<template>
  <div class="navbar container-fluid">
    
    <router-link to="/"
      ><img  src="../assets/img/carato-logo.png" draggable="false" class="navbar-brand"
    /></router-link>

    <div class="nav-links">
      <router-link to="/puntivendita">Punti vendita</router-link>
      <router-link to="/associazioni">Associazioni</router-link>
      <!-- <router-link to="/eventi">Eventi</router-link> -->
      <router-link to="/progetti">Progetti</router-link>
    </div>

    <router-link to="/wallet" class="btn-wallet">Wallet</router-link>
  </div>
</template>

<script>
export default {
  name: "Navbar",
};
</script>

<style>
</style>