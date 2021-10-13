/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'

import App from './components/App.vue'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import axios from 'axios'
import VueSweetalert2 from 'vue-sweetalert2';

import { routes } from './routes'
import store from './store';
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VueRouter)
Vue.use(VueAxios, axios)
Vue.use(VueSweetalert2)

const router = new VueRouter({
    mode: 'history',
    routes: routes
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.auth) && !store.getters.isLoggedIn){
        store.dispatch('get_user').then(() => {
            if (!store.getters.user) next({ name: 'slogin', query: {redirect: to.fullPath} })
            else next()
        })
    } else {
        next()
    }
})

/*
store.dispatch('get_user').then(() => {
    const app = new Vue(
        Vue.util.extend(
            { router, store },
            App
        )
    ).$mount('#app')
})
*/

const app = new Vue({
    el: '#app',
    router: router,
    store: store,
    render: h => h(App)
});
