<template>
  <!--<div style="left: 0; position: absolute">-->
  <div class="sidebar bg-dark">
    <div class="sidebar-title">
      <a class="navbar-brand" href="/">Admin Panel</a>
    </div>
    <ul class="nav flex-column">
      <li class="nav-item p-2">
        <route-link href-name="dashboard">
          <i class="far fa-user"></i>
          Dashboard
        </route-link>
      </li>

      <li class="nav-item p-2">
        <route-link href-name="users">
          <i class="far fa-user"></i>
          User <span class="sr-only"></span>
        </route-link>
      </li>
    </ul>
  </div>
</template>

<script>
  import RouteLink from "../../components/route-link";

  export default {
    components: {
      RouteLink
    },
    name: "sidebar",
  }
</script>
