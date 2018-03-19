<template>
  <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="container col-12 col-md-4 col-md-push-4">
      <div class="form-control">
        <h3 class="text-center">{{appName}}</h3>

        <div class="form-group">
          <input type="email"
                 class="form-control"
                 id="email-address"
                 aria-describedby="emailAddress"
                 placeholder="Email address"
                 v-model="email"
                 :class="{'is-invalid' : errors.validation.email}"/>
          <div class="invalid-feedback">{{errors.validation.email ? errors.validation.email[0] : ''}}</div>
        </div>

        <div class="form-group">
          <input type="password"
                 class="form-control mt-2"
                 id="password"
                 placeholder="Password"
                 v-model="password"
                 :class="{'is-invalid' : errors.validation.password}"/>
          <div class="invalid-feedback">{{errors.validation.password ? errors.validation.password[0] : ''}}</div>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-control-sm form-check-input" id="remember-me" style="position: relative;">
          <small><label class="form-check-label" for="remember-me">Remember me</label></small>
        </div>
        <div class="mt-3 mb-2">
          <button type="submit" class="btn btn-sm btn-primary col-12" @click="login">Login</button>
        </div>
      </div>

      <div class="align-self-end col-12 text-right">
        <small>2018 @ Made by Modele Team</small>
      </div>
    </div>
  </div>
</template>

<script>
  import ErrorResponse from "../../classes/ErrorResponse";
  import Helper from "../../classes/Helper";

  export default {
    name: '',
    data (){
      return {
        errors: new ErrorResponse(),
        email: '',
        password: '',
        appName: window.appName,
        jwt: this.$store.state.jwt
      }
    },
    methods: {
      login: function (){
        let vm = this;
        let data = { email: this.email, password: this.password };
        axios.post('/api/login', data)
             .then((response) =>{
               let dataResponse = response.data;
               vm.$store.commit('jwt/update', {
                 token: dataResponse.data.token,
               })
               this.$router.push({ name: 'dashboard' });
               new Helper().showNoty('Login successfully', 'success');
             })
             .catch((error) =>{
               vm.errors.update(error.response);
               if ( vm.errors.general.message != '' ) {
                 new Helper().showNoty(vm.errors.general.message, 'error');
               }
             })
      }
    }
  }
</script>
