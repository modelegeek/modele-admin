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
                <input type="email" class="form-control" name="email" />
                <div class="valid-feedback">Looks good!</div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-left">Name</label>
              <div class="col-12 col-sm-8 col-lg-8">
                <input type="text" class="form-control" name="name">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-left">Password</label>
              <div class="col-12 col-sm-8 col-lg-8">
                <input type="password" class="form-control" name="password">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-12 col-sm-4 col-form-label text-left">Password confirmation</label>
              <div class="col-12 col-sm-8 col-lg-8">
                <input type="password" class="form-control" name="password_confirmation">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-12">
                <button type="button" class="btn btn-block btn-primary">Create</button>
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
  export default {
    name: "admin_create"
  }
</script>
