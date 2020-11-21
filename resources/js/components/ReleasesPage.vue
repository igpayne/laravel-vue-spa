<template>
<div class="container">

    <div class="row">
        <div class="col-lg-3">
            <GenresPanel
                v-bind:genres="genres"
            />
        </div>

        <div class="col-lg-9">
            <ReleasesPanel
            v-bind:genre="$route.query.genre"></ReleasesPanel>
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

    props: {
        params: {
            type: String,
            default: ""
        }
    },

    data: function() {
        return {
            genres: [],
        }
    },

    created: function() {
        this.loadGenres();
    },

    methods: {
        //loads genres from api
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