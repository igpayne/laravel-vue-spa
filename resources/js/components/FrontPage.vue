<template>
    
<div class="container">

    <div class="row">
        <div class="col-lg-12 text-center mt-5">
            <h1>Featured Releases</h1>
        </div>
    </div>

    <div class="row">

<!--
        <CategoriesPanel
            v-bind:categories="genres"
        />
-->
      <div class="col-lg-12 mb-auto">

        <FeaturedPanel/>

<!--
        <ReleasesPanel
            v-bind:releases="releases"
        />
-->
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
import CategoriesPanel from "./CategoriesPanel.vue"
import FeaturedPanel from "./FeaturedPanel.vue"
import ReleasesPanel from "./ReleasesPanel.vue"

export default {
    components: {
        CategoriesPanel, FeaturedPanel, ReleasesPanel
    },

    data: function() {
        return {
            releases: [],
            genres: []
        }
    },

    created() {
        this.loadReleases();
        this.loadGenres();
    },

    methods: {
        //loads releases from the API and catches errors
        loadReleases: function() {
            axios.get("/api/releases")
            .then((response) => {
                this.releases = response.data.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        },

        loadGenres: function() {
            axios.get("/api/genres")
            .then((response) => {
                this.genres = response.data.data;
            })
            .catch((error) => {
                console.log(error);
            });
        }
    }
}
</script>