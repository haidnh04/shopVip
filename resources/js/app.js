require('./bootstrap');

import Vue from 'vue';

import ElementUI from 'element-ui';

import { store } from './store/index.js';

import 'element-ui/lib/theme-chalk/index.css';

import lang from 'element-ui/lib/locale/lang/en'
import locale from 'element-ui/lib/locale'

import VeeValidate from 'vee-validate';

// configure language
locale.use(lang)

// window.Vue = require('vue').default;

window.Vue = require('vue').default;


Vue.use(ElementUI);
Vue.use(VeeValidate);

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('users-component', require('./components/users/UserList.vue').default);
Vue.component('khachhang-form', require('./components/users/UserForm.vue').default);
Vue.component('khachhang-edit', require('./components/users/UserEdit.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    store,
    el: '#app',
});
