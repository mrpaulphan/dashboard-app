<template>
<div class="container">
  <Alert v-if="alertMessage" v-bind:message="alertMessage" v-bind:type="alertType"  />

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Example Component</div>

                <div class="panel-body">
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
            name: ''
        }
    },
    created() {
        console.log('created() ready');
    },
    methods: {

    },
    mounted() {
      console.log('mouted() ready');

    }
}
</script>
