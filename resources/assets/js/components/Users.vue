<template>
<div class="container">
    <Alert v-if="alert" v-bind:message="alert" />
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users">
                                <th>{{ user.first_name }} {{ user.last_name }}</th>
                                <th>{{ user.email }}</th>
                                <th>{{ user.role.name }}</th>
                                <th>{{ user.company.name }}</th>
                                <th><a v-bind:href='detailUrl + user.id'>Detail</a></th>
                            </tr>
                        </tbody>
                    </table>

                    <form class="" data-form="createUser" action="#" method="post" v-on:submit="storeUser">
                        <fieldset>
                            <legend>Name</legend>
                            <div class="">
                                <label for="first_name">First Name</label>
                                <input id="first_name" type="text" name="first_name" value="" v-model="first_name" required>
                            </div>
                            <div class="">
                                <label for="last_name">last Name</label>
                                <input id="last_name" type="text" name="last_name" value="" v-model="last_name" required>
                            </div>
                        </fieldset>

                        <div class="">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" value="" v-model="email" required>
                        </div>
                        <div class="">
                            <label for="role">Select Role</label>
                            <select class="" name="role_id" v-model="roleSelected">
                              <option
                              v-for="(role, index) in roles"
                              v-bind:value="role.id">{{ role.name }}</option>
                          </select>
                        </div>
                        <div class="">
                            <label for="role">Select Company</label>
                            <select class="" name="company_id" v-model="Davi">
                              <option
                              v-for="(company, index) in companies"
                              v-bind:value="company.id">{{ company.name }}</option>
                          </select>
                        </div>

                        <input type="submit" name="" v-bind:value="'Add ' + first_name + ' ' + last_name">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
Vue.component('Alert', require('./Alert.vue'));
export default {
    data() {
        return {
            roleSelected: 0,
            users: [],
            roles: [],
            companies: [],
            first_name: '',
            last_name: '',
            email: '',
            role_id: '',
            company_id: '',
            alert: '',
            detailUrl: '/dashboard/user/detail/'
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
                    console.log('Fetch User Success');
                    vm.listUsers(request);
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
            var vm = this;
            var data = $('[data-form="createUser"]').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/dashboard/users/create',
                type: 'POST',
                dataType: 'json',
                data: data,

                success: function(request) {
                    console.log('Created User');
                    console.log(request);
                    // Update user list
                    vm.users.push(request.user);
                    vm.alert = 'It worked';
                },
                error: function(error) {
                    if (error.status == 404) {
                        console.log('page not found');
                        vm.alert = 'It FAILEDDDDD';

                    } else {
                        console.log(error.statusText);
                        vm.alert = 'It FAILEDDDDD';

                    }
                }
            })

        }

    },
    mounted() {

    }
}
</script>
