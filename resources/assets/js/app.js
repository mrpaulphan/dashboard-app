/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Chart = require('chart.js');
window.select2 = require('select2');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('alert', require('./components/Alert.vue'));
Vue.component('example', require('./components/Example.vue'));
Vue.component('dashboard', require('./components/Dashboard.vue'));
Vue.component('users', require('./components/Users.vue'));
Vue.component('userdetail', require('./components/UserDetail.vue'));
Vue.component('companies', require('./components/Companies.vue'));
Vue.component('projects', require('./components/Projects.vue'));
Vue.component('invoices', require('./components/Invoices.vue'));
Vue.component('createinvoice', require('./components/CreateInvoice.vue'));

const app = new Vue({
    el: '#app'
});

$(document).ready(function() {
  var trigger = $('[data-toggle-trigger]');
  var target = $('[data-toggle-target]');
  var settings = {
      duration: 100,
      easing: 'swing'
  };
  target.hide();

  trigger.click(function() {
      var triggerId = $(this).attr('data-toggle-trigger');
      var thisTarget = $('[data-toggle-target*="' + triggerId + '"]');
      var el = $(this);
      var dataDuration = parseInt(el.attr('data-duration')) || settings.duration;
      var dataEasing = el.attr('data-easing') || settings.easing;
      if (el.hasClass('active')) {
          el.removeClass('active');
          thisTarget.slideUp(dataDuration, dataEasing);
      } else {
          el.addClass('active');
          thisTarget.slideDown(dataDuration, dataEasing);
      }
  });
});
