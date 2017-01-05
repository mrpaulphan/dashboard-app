<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Example Component</div>

                <div class="panel-body">
                    <input type="text" name="first_name" v-bind:value="first_name">
                    <input type="text" name="last_name" v-bind:value="last_name">
                    <input type="text" name="email" v-bind:value="email">
                    <p v-text="first_name"></p>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            first_name: '',
            last_name: ''
        }
    },
    mounted() {
      var vm = this;
      var currentLocation = window.location.pathname;
      // Get user id number from url
      var str = currentLocation;
      var n = str.lastIndexOf('/');
      var id = str.substring(n + 1);

      axios.get('/api/v1/users/detail/' + id)
          .then(function(response) {
            vm.first_name = response.data.user.first_name;
            vm.last_name = response.data.user.last_name;
            vm.email = response.data.user.email;
          })
          .catch(function(error) {
              console.log(error);
          });
    }
}
</script>
