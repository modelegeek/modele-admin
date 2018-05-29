<template>
  <div>
    <div class="row">
      <div class="col-12 text-right">
        <route-link href-name="create-admin" class="btn btn-primary">
          <i class="far fa-user"></i>
          Create New Admin <span class="sr-only"></span>
        </route-link>
      </div>
    </div>

    <div class="row pt-2">
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
  import RouteLink from "../../../components/route-link";

  export default {

    name :"admin_index",

    components :{
      RouteLink,
    },

    data() {
      return {}
    },

    mounted() {
      let token = this.$store.getters['authorize/token'];

      // need to check and refresh token in this part

      $('#example').DataTable({
        "processing" :true,
        "serverSide" :true,
        "ajax"       :{
          'url'        :'/api/user',
          'beforeSend' :function (request) {
            request.setRequestHeader("Authorization", token);
          },
        },
        "columns"    :[
          { "data" :"name" },
          { "data" :"email" }
        ]
      });
    },

  }
</script>
