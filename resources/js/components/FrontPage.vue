<template>
    
<div class="container">

    <div class="row">
        <div class="col-lg-12 text-center mt-5">
            <h1>Featured Releases</h1>
        </div>
    </div>

    <div class="row">
      <div class="col-lg-12 mb-auto">
        <FeaturedPanel/>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-center mt-5">
            <h1>About Us</h1>
            <div class="col-lg-12 text-center mt-5 mb-5">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>

</div>

</template>

<script>
import FeaturedPanel from "./FeaturedPanel.vue"

export default {
    components: {
        FeaturedPanel
    },

    data: function() {
        return {
            featuredReleases: []
        }
    },

    created() {
        this.loadFeatured();
    },

    methods: {
        //loads featured releases from the API and catches errors
        loadFeatured: function() {
            axios.get("/api/releases/featured")
            .then((response) => {
                this.featuredReleases = response.data.data;
            })
            .catch((error) => {
                console.log(error);
            });
        }
    }
}
</script>