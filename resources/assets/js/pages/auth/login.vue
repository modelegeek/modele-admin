<template>
  <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="container col-12 col-md-4 col-md-push-4">
      <form class="form-control">
        <h3 class="text-center">{{appName}}</h3>
        <input type="email" class="form-control" id="email-address" aria-describedby="emailAddress" placeholder="Email address">
        <input type="password" class="form-control mt-2" id="password" placeholder="Password">
        <div class="form-check">
          <input type="checkbox" class="form-control-sm form-check-input" id="remember-me" style="position: relative;">
          <small><label class="form-check-label" for="remember-me">Remember me</label></small>
        </div>
        <div class="mt-3 mb-2">
          <button type="submit" class="btn btn-sm btn-primary col-12" @click="login">Login</button>
        </div>
      </form>

      <div class="align-self-end col-12 text-right">
        <small>2018 @ Made by Modele Team</small>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: '',
    data (){
      return {
        appName: window.appName
      }
    },
    methods: {
      login: function (){
        this.$router.push({
          name: 'dashboard',
          params: ''
        })
      }
    }
  }
</script>
