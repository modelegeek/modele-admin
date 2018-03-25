<template>
  <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light flex-wrap" id="navbar-admin">
    <div id="navbar-top">
      <span id="sidebar-toggle" @click="toggleSidebar">&#9776;</span>
      <span id="login-info">Jason Seah</span>
    </div>
    <tab-navigation></tab-navigation>
  </nav>
</template>

<script>
  import TabNavigation from "./tab-navigation";

  export default {
    components: { TabNavigation },

    name: "navbar",

    data (){
      return {}
    },

    methods: {
      toggleSidebar (){
        this.$store.dispatch('navbar/toggle');
      }
    }
  }
</script>
