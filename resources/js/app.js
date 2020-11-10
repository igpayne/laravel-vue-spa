require("./bootstrap");
window.Vue = require("vue");

import FrontPage from "./components/FrontPage.vue";
import ReleasesPage from "./components/ReleasesPage.vue";
import LoginFormModal from "./components/LoginFormModal.vue";
import RegisterFormModal from "./components/RegisterFormModal.vue";
import LogoutButton from "./components/LogoutButton.vue";

//create a new vue instance with id: app
const app = new Vue({
    el: "#app",
    
    components: {
        "front-page": FrontPage, 
        "releases-page": ReleasesPage,
        "login-modal": LoginFormModal, 
        "register-modal": RegisterFormModal,
        "logout-button": LogoutButton
    },

    data: function () {
        return {
            currentPage: "front-page"
        }
    },

    methods: {
        releases: function () {
            this.currentPage = "releases-page";
        },

        frontPage: function() {
            this.currentPage = "front-page";
        }
    }
});
