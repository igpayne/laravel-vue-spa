<template>
<div class="container">

    <div class="row">
        <div class="col-lg-3">
            <GenresPanel
                v-bind:genres="genres"
                v-on:genreFilter="genreFilter($event)"
                v-on:refreshReleases="loadReleases"
            />
        </div>

        <div class="col-lg-9">
            <ReleasesPanel
                v-bind:releases="releases"
                v-on:refreshReleases="loadReleases"
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
            genres: [],
            //releaseGenreNames: {}
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
                //this.populateReleaseGenreNames();
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
            })
            .catch((error) => {
                console.log(error);
            });
        },

        //filter the releases displayed showing only those with a genre of genreId
        genreFilter: function(genreId) {
            axios.get("/api/releases?genre=" + genreId)
            .then((response) => {
                this.releases = response.data.data;
            })
            .catch((error) => {
                console.log(error);
            });
        }

/*
        populateReleaseGenreNames: function() {
            this.releases.forEach((release) => {
                this.setGenreForRelease(release.id);
            });
        },

        setGenreForRelease: function(releaseId) {
            axios.get("/api/genres?release=" + releaseId)
            .then((response) => {
                this.releaseGenreNames[releaseId.toString()] = response.data.data[0].name;
            })
            .catch((error) => {
                console.log(error);
            });
        }
        */
    }
}

</script>