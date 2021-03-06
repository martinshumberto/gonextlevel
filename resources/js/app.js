/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import { Form } from './utils';
window.Form = Form;

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
require('./components/bootstrap');

import VueClickOutside from 'vue-click-outside';
import { VueMaskDirective } from 'v-mask';

Vue.directive('click-outside', VueClickOutside);
Vue.directive('mask', VueMaskDirective);

const app = new Vue({
    el: '#app',
});
