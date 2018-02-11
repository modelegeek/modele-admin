<template>
  <div class="d-flex justify-content-center align-items-center container col-4 col-xs-push-4">
    <form class="form-control">
      <h3>{{appName}}</h3>
      <div class="form-group">
        <label for="email-address">Email address</label>
        <input type="email" class="form-control" id="email-address" aria-describedby="emailAddress" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password">
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="remember-me">
        <label class="form-check-label" for="remember-me">Remember me</label>
      </div>
      <button type="submit" class="btn btn-sm btn-primary" @click="login">Submit</button>
    </form>
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
