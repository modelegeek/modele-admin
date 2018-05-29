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
                <input type="email"
                       class="form-control"
                       name="email"
                       id="email"
                       aria-describedby="emailAddress"
                       placeholder="Email address"
                       v-model="email"
                       :class="{'is-invalid' : errors.validation.email}"/>
                <div class="invalid-feedback">{{errors.validation.email ? errors.validation.email[0] : ''}}</div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-left">Name</label>
              <div class="col-12 col-sm-8 col-lg-8">
                <input type="text"
                       class="form-control"
                       name="name"
                       id="name"
                       aria-describedby="userName"
                       placeholder="Name"
                       v-model="name"
                       :class="{'is-invalid' : errors.validation.name}"/>
                <div class="invalid-feedback">{{errors.validation.name ? errors.validation.name[0] : ''}}</div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-left">Password</label>
              <div class="col-12 col-sm-8 col-lg-8">
                <input type="password"
                       class="form-control"
                       name="password"
                       id="password"
                       aria-describedby="Password"
                       placeholder="Password"
                       v-model="password"
                       :class="{'is-invalid' : errors.validation.password}"/>
                <div class="invalid-feedback">{{errors.validation.password ? errors.validation.password[0] : ''}}</div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-left">Password confirmation</label>
              <div class="col-12 col-sm-8 col-lg-8">
                <input type="password"
                       class="form-control"
                       name="password_confirmation"
                       id="password-confirmation"
                       aria-describedby="PasswordConfirmation"
                       placeholder="Password Confirmation"
                       v-model="passwordConfirmation"
                       :class="{'is-invalid' : errors.validation.password}"/>
                <div class="invalid-feedback">{{errors.validation.password ? errors.validation.password[0] : ''}}</div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-12">
                <button type="button" class="btn btn-block btn-primary" @click="submit">Create</button>
              </div>
            </div>

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
        this.errors.refresh();

        let data = {
          email                 :this.email,
          name                  :this.name,
          password              :this.password,
          password_confirmation :this.passwordConfirmation,
        };

        axios.post('/api/user', data, { headers :token })
             .then((response) => {
               vm.$router.push({ name :'admin' });
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
