<template>
    
<div class="container">

    <div class="row">

        <CategoriesPanel
            v-bind:categories="releases"
        />

      <div class="col-lg-9">

        <FeaturedPanel/>

        <ReleasesPanel
            v-bind:releases="releases"
        />

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
            tracks: [],
        }
    },

    created() {
        this.loadReleases();
        //this.loadTracks();
    },

    methods: {
        //loads releases from the API and catches errors
        loadReleases: function() {
            console.log("im running!");
            axios.get("/api/releases")
            .then((response) => {
                this.releases = response.data.data;
            })
            .catch(function (error) {
                console.log(error)
            });
        },

        loadTracks: function() {

        }
    }
}
</script>