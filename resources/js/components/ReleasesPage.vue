<template>
<div class="container">

    <div class="row">
        <div class="col-lg-3">
            <GenresPanel
                v-bind:genres="genres"
                v-on:genreFilter="genreFilter($event)"
            />
        </div>

        <div class="col-lg-9">
            <ReleasesPanel
                v-bind:releases="releases"
            ></ReleasesPanel>
        </div>
    </div>

</div>
</template>

<script>
import GenresPanel from "./GenresPanel.vue"
import ReleasesPanel from "./ReleasesPanel.vue"

export default {
    components: {
        GenresPanel, ReleasesPanel
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

        //loads genres from api
        loadGenres: function() {
            axios.get("/api/genres")
            .then((response) => {
                this.genres = response.data.data;
                console.log(this.genres);
            })
            .catch((error) => {
                console.log(error);
            });
        },

        genreFilter: function(genreId) {
            axios.get("/api/releases?genre=" + genreId)
            .then((response) => {
                this.releases = response.data.data;
            })
            .catch((error) => {
                console.log(error);
            });
        }
    }
}

</script>