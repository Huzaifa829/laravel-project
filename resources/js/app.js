/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('autosearch', require('./components/autosearch.vue').default);
// Vue.component('mobilesearch', require('./components/mobilesearch.vue').default);
// Vue.component('cart', require('./components/cart.vue').default);
// checkout components
// Vue.component('stepone', require('./components/checkout/stepone.vue').default);
// alert(0)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });


import { createApp } from 'vue'
import checkoutheader from './components/checkout/checkoutheader.vue'
import checkout_footer from './components/checkout/checkout_footer.vue'
import buttonnext from './components/checkout/buttonnext.vue'
import shippinginfo from './components/checkout/shippinginfo.vue'
import All_data from './components/checkout/Alldetail.vue'
import { data } from 'autoprefixer';
import { transform } from 'lodash';

const talha = document.querySelector('#app');

const app = createApp({
    components: {
        checkoutheader,
        checkout_footer,
        buttonnext,
        All_data,
        shippinginfo,

    },
    data() {
        return {
            ShowFormOne: true,
            ShowFormTwo: false,
            ShowFormThree: false
        }
    }, mounted() {
        this.showStepOne()
    },
    methods: {
    
        showStepOne() {
            this.ShowFormOne = true,
                this.ShowFormTwo = false,
                this.ShowFormThree = false

        },
        showSteptwo() {
            this.ShowFormOne = false,
                this.ShowFormTwo = true,
                this.ShowFormThree = false
        },
    
        showStepthree() {
            this.ShowFormOne = false,
                this.ShowFormTwo = false,
                this.ShowFormThree = true
        },
  

    }

}).mount(talha)

