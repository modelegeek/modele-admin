<template>
  <div class="row">
    <div class="col-12 text-right">
      <route-link href-name="create-admin" class="btn btn-primary">
        <i class="far fa-user"></i>
        Create New Admin <span class="sr-only"></span>
      </route-link>
    </div>
  </div>
</template>

<script>
  import RouteLink from "../../../components/route-link";
  import Home from "../../_layout/home";

  export default {
    components: {
      Home,
      RouteLink,
    },

    data (){
      return {}
    },

    name: "admin_index",
  }
</script>
