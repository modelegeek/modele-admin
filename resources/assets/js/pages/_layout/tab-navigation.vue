<template>
  <div id="tab-navigation" class="p-1">
    <ul id="tab-tags" class="list-inline d-flex align-content-center mb-0">
      <li class="tab-tag list-inline-item" v-for="history in histories.histories">
        <route-link :href-name="history.name">{{history.name}}</route-link>
      </li>
    </ul>
  </div>
</template>

<script>
  import RouteLink from "../../components/route-link";

  export default {
    components: { RouteLink },
    name: "tab-navigation",
    data (){
      return {
        histories: this.$store.state.histories
      }
    },
    mounted (){
      console.log(this.$store.state.histories)
    }
  }
</script>
