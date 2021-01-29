
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));

Vue.component('passport-personal-access-tokens', require('../../js/components/passport/PersonalAccessTokens.vue').default);
Vue.component('passport-clients', require('../../js/components/passport/Clients.vue').default);
Vue.component('passport-authorized-clients', require('../../js/components/passport/AuthorizedClients.vue').default);

const app = new Vue({
    el: '#app'
});
