<template>
<div class="">
    <Alert v-if="alertMessage" v-bind:message="alertMessage" v-bind:type="alertType" />
    <h3>Invoice</h3>

    <input type="date" name="" value="">
    <input type="text" disabled name="" value="">
    <select class="" id="" name=""><option value="0" selected="selected">Due on Receipt</option>
<option value="7">After 7 days</option>
<option value="15">After 15 days</option>
<option value="30">After 30 days</option>
<option value="45">After 45 days</option>
<option value="60">After 60 days</option>
<option value="-1">Custom</option></select>
</div>

to
</template>

<script>
Vue.component('Alert', require('./Alert.vue'));
export default {
    data() {
        return {
            invoices: [],
            total: '',
            create_url: '',
            modal: false
        }
    },
    created() {
        console.log('created() ready');
        this.fetchInvoices();
    },
    methods: {
        /*
          return the json list of users
         */
        fetchInvoices() {
            console.log('fetchProjects() called');
            var vm = this;
            $.ajax({
                url: '/api/v1/invoices',
                type: 'GET',
                dataType: 'json',

                success: function(request) {
                    console.log('Fetch Projects API Success');
                    vm.listInovices(request);
                },
                error: function(error) {
                    if (error.status == 404) {
                        console.log('page not found');
                    } else {

                    }
                }
            })
        },
        listInovices(request) {
            console.log('listInovices() called');
            // Bind request to data.companies
            this.invoices = request.invoices;
            this.total = request.total;
            this.create_url = request.create_url;
        }
    },
    mounted() {
        console.log('mouted() ready');
    }
}
</script>
