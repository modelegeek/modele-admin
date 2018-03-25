<template>
  <section id="admin-app" class="d-flex">
    <sidebar></sidebar>
    <div id="page-container">
      <navbar></navbar>

      <div id="page">
        <div class="container-fluid">
          <router-view></router-view>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  import Sidebar from "../../components/sidebar";
  import Navbar from "../../components/navbar";

  export default {
    components: {
      Navbar,
      Sidebar
    },
    name: "admin-panel"
  }
</script>
