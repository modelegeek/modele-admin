<template>
  <div>
    <sidebar></sidebar>
    <div id="page-container">
      <navbar></navbar>
      <tab-navigation></tab-navigation>

      <div id="page">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
  import navbar from "./navbar";
  import TabNavigation from "./tab-navigation";
  import sidebar from "./sidebar";

  export default {
    components: {
      sidebar,
      navbar,
      TabNavigation
    },
    name: "home"
  }
</script>
