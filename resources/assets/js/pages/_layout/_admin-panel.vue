<template>
  <home>
    <router-view></router-view>
  </home>
</template>

<script>
  import Home from "./home";

  export default {
    components: { Home },
    name: "admin-panel"
  }
</script>
