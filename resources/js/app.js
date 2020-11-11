require("./bootstrap");
window.Vue = require("vue");

import FrontPage from "./components/FrontPage.vue";
import ReleasesPage from "./components/ReleasesPage.vue";
import SingleReleasePage from "./components/SingleReleasePage.vue";
import LoginFormModal from "./components/LoginFormModal.vue";
import RegisterFormModal from "./components/RegisterFormModal.vue";
import LogoutButton from "./components/LogoutButton.vue";

//create a new vue instance with id: app
const app = new Vue({
    el: "#app",
    
    components: {
        "front-page": FrontPage, 
        "releases-page": ReleasesPage,
        "single-release-page": SingleReleasePage,
        "login-modal": LoginFormModal, 
        "register-modal": RegisterFormModal,
        "logout-button": LogoutButton
    },

    data: function () {
        return {
            currentPage: "front-page",
            currentRelease: null
        }
    },

    computed: {
        currentProperties: function() {
            if (this.currentPage == "single-release-page") {
                return { releaseID: this.currentRelease}
            }
        }
    },

    methods: {
        releases: function () {
            this.currentPage = "releases-page";
        },

        frontPage: function() {
            this.currentPage = "front-page";
        },

        singleReleasePage: function(release) {
            this.currentRelease = release;
            this.currentPage = "single-release-page";
        }
    }
});
