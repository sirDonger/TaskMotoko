import VueRouter from 'vue-router';
import router from "./router";
import App from "./app";
window.Vue = require('vue');
Vue.use(VueRouter);
const app = new Vue({
    el: '#app',
    render : h => h(App),
    router
});
global.app = app;