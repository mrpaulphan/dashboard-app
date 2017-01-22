<template>
<div class="">
    <header class="container__header">
        <h2>Projects</h2>
        <a href="#" v-on:click="modal = !modal">Add new project</a>
    </header>


    <Alert v-if="alertMessage" v-bind:message="alertMessage" v-bind:type="alertType" />

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Projects</div>

                <div class="panel-body">
                    <div class="" v-for="project in projects">
                        {{ project.name }}
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="modal__container" v-if="modal">
        <form class="modal__content" data-form="storeProject" action="#" method="post" v-on:submit="storeProject">
            <div class="">
                <label for="name">Project Name</label>
                <input id="name" type="text" name="name" value="" v-model="name" required>
                <br>
                <label for="userID">User</label>

                <select id="userID" class="js-example-basic-multiple js-states form-control" name="row[][user_id]" multiple="multiple">
                <option
                v-for="(user, index) in users"
                v-bind:value="user.id">{{ user.first_name }} {{ user.last_name }}
                </option>
                </select>
          <br>

                <label for="companyID">Company</label>
                <select id="companyID" class="" name="company_id">
          <option
          v-for="(company, index) in companies"
          v-bind:value="company.id">{{ company.name }}</option>                  </select>
            </div>
            <a href="#" v-on:click="modal = !modal">Cancel</a>
            <input type="submit" name="" value="Add new project">
        </form>

    </div>
</div>
</template>

<script>
Vue.component('Alert', require('./Alert.vue'));
export default {

    data() {
        return {
            projects: [],
            users: [],
            companies: [],
            name: '',
            modal: false
        }
    },
    created() {
        console.log('created() ready');
        this.fetchProjects();

    },
    methods: {
        /*
          return the json list of users
         */
        fetchProjects() {
            console.log('fetchProjects() called');
            var vm = this;
            $.ajax({
                url: '/api/v1/projects',
                type: 'GET',
                dataType: 'json',

                success: function(request) {
                    console.log('Fetch Projects API Success');
                    vm.listProjects(request);
                },
                error: function(error) {
                    if (error.status == 404) {
                        console.log('page not found');
                    } else {
                        s
                    }
                }
            })
        },

        /*
          Returns a list of all users.
         */
        listProjects(request) {
            console.log('listProjects() called');
            // Bind request to data.companies
            this.projects = request.projects;
            this.users = request.users;
            this.companies = request.companies;
            $(".js-example-basic-multiple").select2();


        },
        storeProject(e) {
            e.preventDefault();
            var vm = this;
            var data = $('[data-form="storeProject"]').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/dashboard/project/create',
                type: 'POST',
                dataType: 'json',
                data: data,

                success: function(request) {
                    console.log('Created Project');
                    console.log(request);
              vm.projects.push(request.project);
                    vm.modal = false;

                    vm.alertType = 'success';
                    vm.alertMessage = 'Success: ' + request.project.name + ' was created';
                    $(".js-example-basic-multiple").select2("val", "");
                    // Close modal
                },
                error: function(error) {
                    if (error.status == 404) {
                        console.log('page not found');
                        vm.alertType = 'error';
                        vm.alertMessage = 'Error: ' + error;
                    } else {
                        console.log(error.statusText);
                        vm.alertType = 'error';
                        vm.alertMessage = 'Error: ' + error;
                    }
                }
            })
        }
    },
    mounted() {
        console.log('mouted() ready');

    }
}
</script>
