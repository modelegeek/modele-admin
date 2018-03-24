<template>
  <div id="tab-navigation" class="p-1 pl-2">
    <ul id="tab-tags" class="list-inline d-flex align-content-center mb-0">
      <li class="tab-tag list-inline-item" v-for="history in histories">
        <route-link :href-name="history.route_name">{{history.display_name}}</route-link>
      </li>
    </ul>
  </div>
</template>

<script>
  import RouteLink from "./route-link";

  export default {
    components: { RouteLink },
    name: "tab-navigation",
    data (){
      return {
        histories: this.$store.getters['histories/list']
      }
    }
  }
</script>
