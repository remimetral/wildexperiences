
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('lodash');
require('./bootstrap');

import Vue from 'vue';
import Buefy from 'buefy';
import Bundle from './bundle';
import bulmaCalendar from 'bulma-calendar/dist/bulma-calendar'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(Buefy);

Vue.component('grid', require('./components/Grid.vue'));
Vue.component('modal', require('./components/Modal.vue'));
Vue.component('tiles', require('./components/Tiles.vue'));
Vue.component('calendar', require('./components/Calendar.vue'));

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const bundle = new Bundle();
