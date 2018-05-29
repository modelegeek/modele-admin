<template>
  <div class="row">
    <div class="col-sm-8 offset-sm-2 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Create Admin</h4>
          <span class="card-subtitle">create an admin access</span>
        </div>
        <div class="card-body">
          <form>
            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-left">Email</label>
              <div class="col-12 col-sm-8 col-lg-8">
                <input type="email" class="form-control" name="email" v-model="email"/>
                <div class="valid-feedback">Looks good!</div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-left">Name</label>
              <div class="col-12 col-sm-8 col-lg-8">
                <input type="text" class="form-control" name="name" v-model="name">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-left">Password</label>
              <div class="col-12 col-sm-8 col-lg-8">
                <input type="password" class="form-control" name="password" v-model="password">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-left">Password confirmation</label>
              <div class="col-12 col-sm-8 col-lg-8">
                <input type="password" class="form-control" name="password_confirmation" v-model="passwordConfirmation">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-12">
                <button type="button" class="btn btn-block btn-primary" @click="submit">Create</button>
              </div>
            </div>

            <!--<div class="col-md-4 mb-3">-->
            <!--<label for="validationServer01">First name</label>-->
            <!--<input type="text" class="form-control is-valid" id="validationServer01" placeholder="First name" value="Mark" required="">-->
            <!--</div>-->
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import ErrorResponse from "../../../classes/ErrorResponse";
  import Helper from "../../../classes/Helper";

  export default {
    name :"admin_create",

    data() {
      return {
        errors               :new ErrorResponse(),
        email                :null,
        name                 :null,
        password             :null,
        passwordConfirmation :null,
      }
    },

    methods :{
      submit() {
        let vm = this;
        let token = this.$store.getters['authorize/headers'];

        let data = {
          email                :this.email,
          name                 :this.name,
          password             :this.password,
          passwordConfirmation :this.passwordConfirmation,
        };

        axios.post('/api/user', data, { headers :token })
             .then((response) => {
               new Helper().showNoty('Create user successfully', 'success');
             })
             .catch((error) => {
               vm.errors.update(error.response);
               if ( vm.errors.general.message != '' ) {
                 new Helper().showNoty(vm.errors.general.message, 'error');
               }
             })
      }
    }
  }
</script>
