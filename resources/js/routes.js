import VueRouter from "vue-router";

window.Vue = require("vue");
Vue.use(VueRouter);

let routes = [
    {
        path: "/",
        component: require("./components/FrontPage").default
    },
    {
        path: "/releases:params*",
        component: require("./components/ReleasesPage").default,
        props: true
    },
    {
        path: "/releases/:releaseID",
        component: require("./components/SingleReleasePage").default,
        props: true
    }
]

export default new VueRouter({

    routes,

    linkActiveClass: "active"

})