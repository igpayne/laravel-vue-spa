<template>
<div class="container">

    <div class="row">
        <div class="col-lg-12 text-center mt-5">
            <h1>Featured Releases</h1>
        </div>
    </div>

    <div class="row">

        <CategoriesPanel
            v-bind:categories="genres"
        />

        <ReleasesPanel
            v-bind:releases="releases"
        />

    </div>

</div>
</template>

<script>
import CategoriesPanel from "./CategoriesPanel.vue"
import ReleasesPanel from "./ReleasesPanel.vue"

export default {
    components: {
        CategoriesPanel, ReleasesPanel
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