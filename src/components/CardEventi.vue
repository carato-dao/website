<template>
  <div class="card-eventi">
    <h1>{{ associazione }}</h1>
    <hr />
    <h2>{{ nomeEvento }}</h2>
    <p>
      {{ giorno }} {{ orario }} a <span>{{ dove }}</span>
    </p>



    <div class="eventi-shadow"></div>
  </div>
</template>

<script>
export default {
  name: "CardEventi",

  props: {
    associazione: String,
    nomeEvento: String,
    giorno: String,
    orario: String,
    dove: String,
  },
};
</script>

<style>
</style>