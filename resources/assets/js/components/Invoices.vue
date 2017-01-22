<template>
<div class="">
    <Alert v-if="alertMessage" v-bind:message="alertMessage" v-bind:type="alertType" />
    <p>Displaying all <span v-text="total"></span></p>
    <br>
    <ul class="list">
        <li class="list__row list__row--heading">
            <h4 class="list__column">Date</h4>
            <h4 class="list__column">Invoice No.</h4>
            <h4 class="list__column">User</h4>
            <h4 class="list__column">Status</h4>
            <h4 class="list__column">Amount</h4>
        </li>
        <li class="list__row" v-for="invoice in invoices">
            <p class="list__column">{{ invoice.invoice_date }}</p>
            <p class="list__column">{{ invoice.invoice_number }}</p>
            <p class="list__column">{{ invoice.user.first_name }} {{ invoice.user.last_name }}</p>
            <p  v-if="invoice.status === 'sent'" class="list__column status--sent">{{ invoice.status }}</p>
            <p  v-if="invoice.status === 'paid'" class="list__column status--paid">{{ invoice.status }}</p>
            <p  v-if="invoice.status === 'draft'" class="list__column status--draft">{{ invoice.status }}</p>
            <p  v-if="invoice.status === 'viewed'" class="list__column status--viewed">{{ invoice.status }}</p>
            <p class="list__column">$ {{ invoice.grand_total }}</p>
        </li>
    </ul>
</div>
</template>

<script>
Vue.component('Alert', require('./Alert.vue'));
export default {

    data() {
        return {
            invoices: [],
            total: '',
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

            $(".js-example-basic-multiple").select2();


        }
    },
    mounted() {
        console.log('mouted() ready');

    }
}
</script>
