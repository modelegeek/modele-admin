<template>
  <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light flex-wrap" id="navbar-admin">
    <div id="navbar-top">
      <span id="sidebar-toggle" @click="toggleSidebar">&#9776;</span>
      <div class="dropdown">
        <a class="btn btn-default dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{username}}
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" @click.prevent="logout">Logout</a>
        </div>
      </div>
    </div>
    <tab-navigation></tab-navigation>
  </nav>
</template>

<script>
  import TabNavigation from "./tab-navigation";
  import Helper from "../classes/Helper";
  import ErrorResponse from "../classes/ErrorResponse";

  export default {
    components :{ TabNavigation },

    name :"navbar",

    data() {
      return {
        errors   :new ErrorResponse(),
        username :this.getUserName()
      }
    },

    methods :{
      toggleSidebar() {
        this.$store.dispatch('navbar/toggle');
      },

      getUserName() {
        return this.$store.getters['authorize/username'];
      },

      logout() {
        let vm = this;
        let authHeaders = this.$store.getters['authorize/headers'];

        axios.post('/api/logout', {}, authHeaders)
             .then(() => {
               vm.$store.dispatch('authorize/logout');
               vm.$router.push({ name :'login' })
               new Helper().showNoty('Logout successfully', 'success');
             })
             .catch((error) => {
               if ( error.response ) {
                 vm.errors.update(error.response);
                 if ( vm.errors.general.message != '' ) {
                   new Helper().showNoty(vm.errors.general.message, 'error');
                 }
               }
             })
      }
    }
  }
</script>
