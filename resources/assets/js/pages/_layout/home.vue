<template>
  <div>
    <sidebar></sidebar>
    <div id="page-container">
      <navbar></navbar>
      <tab-navigation></tab-navigation>

      <div id="page">
        <div class="container-fluid">
          <slot></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import navbar from "../../components/navbar";
  import TabNavigation from "../../components/tab-navigation";
  import sidebar from "../../components/sidebar";

  export default {
    components: {
      sidebar,
      navbar,
      TabNavigation
    },
    name: "home"
  }
</script>
