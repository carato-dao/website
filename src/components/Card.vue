<template>
  <div class="card">
    <h1>{{ title }}</h1>
    <hr />
    <p>{{ description }}</p>
  </div>
</template>

<script>
export default {
  name: "Card",

  props: {
    title: String,
    description: String,
  },

};
</script>

<style>
</style>