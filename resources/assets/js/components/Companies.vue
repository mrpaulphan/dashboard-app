<template>
<div class="container">
    <Alert v-if="alert" v-bind:message="alert" />
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Companies Component</div>

                <div class="panel-body" style="display:flex;">
                  <div class="company_row">
                    <div v-for="company in companies">
                      <img src="http://placehold.it/50x50" alt="company logo">
                      <h3>{{ company.name }}</h3>
                      <p>{{ company.website }}</p>
                      <p><a href="#">{{ company.phone}}</a></p>
                    </div>
                    <!-- ./ company__block -->
                  </div>
                  <!-- ./ company__row -->
                </div>

                <div class="panel-body">
                  <form class="" data-form="storeCompany" action="#" method="post" v-on:submit="storeCompany">
                    <div class="">
                        <label for="name">Company Name</label>
                        <input id="name" type="text" name="name" value="" v-model="name" required>
                    </div>
                    <div class="">
                        <label for="website">Webisite</label>
                        <input id="website" type="text" name="website" value="" v-model="website" required>
                    </div>
                    <div class="">
                        <label for="street_address">address</label>
                        <input id="street_address" type="text" name="street_address" value="" v-model="street_address" required>
                    </div>
                    <div class="">
                        <label for="street_address_2">address 2</label>
                        <input id="street_address_2" type="text" name="street_address_2" value="" v-model="street_address_2" required>
                    </div>
                    <div class="">
                        <label for="city">city</label>
                        <input id="city" type="text" name="city" value="" v-model="city" required>
                    </div>

                    <div class="">
                        <label for="state">state</label>
                        <input id="state" type="text" name="state" value="" v-model="state" required>
                    </div>

                    <div class="">
                        <label for="zip_code">zip_code</label>
                        <input id="zip_code" type="text" name="zip_code" value="" v-model="zip_code" required>
                    </div>

                    <div class="">
                        <label for="email">email</label>
                        <input id="email" type="text" name="email" value="" v-model="email" required>
                    </div>

                    <div class="">
                        <label for="phone">phone</label>
                        <input id="phone" type="text" name="phone" value="" v-model="phone" required>
                    </div>

                      <input type="submit" name="" value="Add new company">
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
            companies: [],
            id: '',
            name: '',
            website: '',
            street_address: '',
            street_address_2: '',
            city: '',
            state: '',
            zip_code: '',
            email: '',
            phone: '',
            created_at: '',
            updated_at: ''
        }
    },
    created() {
        console.log('Vue Created');
        this.fetchCompanies();
    },
    methods: {
        /*
          return the json list of users
         */
        fetchCompanies() {
            console.log('fetchCompanies() called');
            var vm = this;
            $.ajax({
                url: '/api/v1/companies',
                type: 'GET',
                dataType: 'json',

                success: function(request) {
                    console.log('Fetch Companies API Success');
                    vm.listCompanies(request);
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
        listCompanies(request) {
            console.log('listCompanies() called');
            // Bind request to data.companies
            this.companies = request.companies;
        },
        storeCompany(e) {
          console.log('storeCompany() called');
            e.preventDefault();
            var vm = this;
            var data = $('[data-form="storeCompany"]').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/dashboard/company/create',
                type: 'POST',
                dataType: 'json',
                data: data,

                success: function(request) {
                    console.log('Created Company');
                    console.log(request);
                    // Update user list
                    vm.companies.push(request.company);
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
        console.log('mounted() called');
    }
}
</script>
