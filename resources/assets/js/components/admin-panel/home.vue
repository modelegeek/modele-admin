<template>
  <div>
    <sidebar></sidebar>
    <navbar></navbar>
  </div>
</template>

<script>
  import navbar from "./_layout/navbar";
  import sidebar from "./_layout/sidebar";

  export default {
    components: {
      sidebar,
      navbar
    },
    name: "home"
  }
</script>

<style scoped>

</style>
