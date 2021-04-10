require('./bootstrap');

import Vue from 'vue';
import Vuelidate from 'vuelidate'
import VueSweetalert2 from 'vue-sweetalert2';

import Question from './components/question'

Vue.use(Vuelidate)
Vue.use(VueSweetalert2)

new Vue({
    el: '#app',
    components: { Question }
});
