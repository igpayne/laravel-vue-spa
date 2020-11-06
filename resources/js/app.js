require('./bootstrap');

//require vue
window.Vue = require("vue");

//attach the 'front-page' component to 'frontView' template
Vue.component("front-page", require("./components/frontView.vue").default);

//create a new vue instance with id: app
const app = new Vue({
    el: "#app",
});
