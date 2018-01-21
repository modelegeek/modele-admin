<template>
  <div>
    <sidebar></sidebar>
    <navbar></navbar>
    <div id="page-container">
      <slot></slot>
    </div>
  </div>
</template>

<script>
  import navbar from "./navbar";
  import sidebar from "./sidebar";

  export default {
    components: {
      sidebar,
      navbar
    },
    name: "home"
  }
</script>
