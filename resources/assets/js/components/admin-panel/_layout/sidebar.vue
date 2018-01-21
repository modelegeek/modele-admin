<template>
  <!--<div style="left: 0; position: absolute">-->
  <div class="sidebar bg-dark">
    <div class="sidebar-title">
      <a class="navbar-brand" href="/">Admin Panel</a>
    </div>
    <ul class="nav flex-column">
      <li class="nav-item p-2">
        <a class="nav-link active" href="#">
          <i class="far fa-user"></i>
          User <span class="sr-only">(current)</span>
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
  export default {
    name: "sidebar"
  }
</script>
