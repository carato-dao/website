<template>
  <div class="punto-vendita">
    <h3>{{ tag }}</h3>
    <img :src="require(`../assets/img/${foto}`)" />
    <h3>{{ nome }}</h3>
    <p>{{ indirizzo }}</p>
  </div>
</template>

<script>
export default {
  name: "PuntoVendita",

  props: {
    foto: String,
    nome: String,
    tag: String,
    indirizzo: String,
  },
};
</script>

<style>
</style>