
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue'

window.Vue = require('vue');

const moment = require('moment')
require('moment/locale/es')

Vue.use(BootstrapVue);

Vue.use(require('vue-moment'), {
    moment
});

Vue.component('especialidad', require('./components/admin/especialidad'));
Vue.component('citas', require('./components/admin/citas'));
Vue.component('administradores', require('./components/admin/administradores'));
Vue.component('doctores', require('./components/admin/doctores'));
Vue.component('pacientes', require('./components/admin/pacientes'));
Vue.component('horarios', require('./components/admin/horarios'));
Vue.component('input-date', require('./components/date-input'));
Vue.component('paciente-cita', require('./components/admin/paciente-cita'));
Vue.component('diagnosticos', require('./components/diagnostico'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

document.addEventListener('DOMContentLoaded', () => {

  if(document.getElementById("app")) {
    const app = new Vue({
      el: '#app'
    });
  }

});

