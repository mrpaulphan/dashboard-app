<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

                <div class="panel-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Company</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users">
                                <th>{{ user.first_name }} {{ user.last_name }}</th>
                                <th>{{ user.email }}</th>
                                <th>{{ user.role.name }}</th>
                                <th>{{ user.company.name }}</th>
                            </tr>
                        </tbody>
                    </table>

                    <form class="" action="#" method="post" v-on:submit="storeUser">
                        <fieldset>
                            <legend>Name</legend>
                            <div class="">
                                <label for="first_name">First Name</label>
                                <input id="first_name" type="text" name="first_name" value="" v-model="first_name">
                            </div>
                            <div class="">
                                <label for="last_name">last Name</label>
                                <input id="last_name" type="text" name="last_name" value="" v-model="last_name">
                            </div>
                        </fieldset>

                        <div class="">
                          <label for="role">Select Role</label>
                          <select class="" name="role_id" v-model="roleSelected">

                              <option v-for="(role, index) in roles" v-bind:value="role.id" v-bind:selected=" index == 0 ? 'selected' : 'asfs'"> {{ role.name }} {{ index }}</option>
                          </select>
                        </div>
                        <div class="">
                          <label for="role">Select Company</label>
                          <select class="" name="company_id" v-model="companySelected">
                              <option v-for="(company, index) in companies" v-bind:value="company.id"> {{ company.name }}</option>
                          </select>
                        </div>
                        <input type="submit" name="" value="Add User">
                    </form>
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
            users: [],
            roles: [],
            companies: []
        }
    },
    created() {
        this.fetchUsers();
    },
    methods: {
        /*
          return the json list of users
         */
        fetchUsers() {
            var vm = this;
            $.ajax({
                url: '/api/v1/users',
                type: 'GET',
                dataType: 'json',

                success: function(request) {
                    vm.listUsers(request);
                    console.log(request);
                },
                error: function(error) {
                    if (error.status == 404) {
                        console.log('page not found');
                    } else {
                        console.log(error.statusText);
                    }
                }
            })
        },
        /*
          Returns a list of all users.
         */
        listUsers(request) {
            // Bind request to data.users
            this.users = request.users;
            this.companies = request.companies;
            this.roles = request.roles;
        },
        storeUser(e) {
            e.preventDefault();

        }

    },
    mounted() {

    }
}
</script>
