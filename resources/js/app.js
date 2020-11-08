require('./bootstrap');

//require vue
window.Vue = require("vue");

//attach the 'FrontPage' component to 'frontView' template
Vue.component("front-page", require("./components/FrontPage.vue").default);
Vue.component("login-modal", require("./components/LoginFormModal.vue").default);
Vue.component("register-modal", require("./components/RegisterFormModal.vue").default);

//create a new vue instance with id: app
const app = new Vue({
    el: "#app",
});
