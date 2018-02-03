<template>
  <home>
    <router-view></router-view>
  </home>
</template>

<script>
  import Home from "./_layout/home";

  export default {
    components: { Home },
    name: "admin-panel"
  }
</script>
