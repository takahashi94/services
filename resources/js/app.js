import Vue from 'vue'
import router from './router'
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import 'material-design-icons-iconfont/dist/material-design-icons.css';
import '@mdi/font/css/materialdesignicons.css'
import App from './App.vue'

Vue.use(Vuetify);

new Vue({
    el: '#app',
    router,
    components: { App },
    template: '<App />',
    vuetify: new Vuetify(),
})