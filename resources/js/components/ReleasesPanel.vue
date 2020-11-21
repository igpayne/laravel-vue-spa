<template>
<div>
    <!-- Title row with button -->
    <div class="row mb-5 mt-5">
        <div class="col-lg-9">
            <h1 class="text-left">Releases</h1>
        </div>
        <div class="col-lg-3 mt-3">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addReleaseModal">Add new release</button>
        </div>
    </div>
    
    <!-- Panel containing all releases -->
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4" v-for="release in releases" :key="release.id">
            <SingleReleaseCard :release="release"></SingleReleaseCard>
        </div>
    </div>

    <!-- Form displayed on 'Add new release' button press -->
    <AddReleaseForm
        v-on:refreshReleases="loadReleases"
    ></AddReleaseForm>

</div>
</template>

<script>
import AddReleaseForm from "./AddReleaseForm.vue";
import SingleReleaseCard from "./SingleReleaseCard.vue";

export default {
    components: {
        AddReleaseForm, SingleReleaseCard
    },

    props: [
        "genre"
    ],

    data: function() {
        return {
            releases: function() {
                return {}
            }
        }
    },

    created: function () {
        this.loadReleases();
    },

    methods: {
        //loads releases from the API and catches errors
        loadReleases: function() {
            axios.get(!this.genre ? "/api/releases" : "/api/releases?genre=" + this.genre)
            .then((response) => {
                this.releases = response.data.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    },

    watch: {
        genre: function() {
            this.loadReleases();
        }
    }
}
</script>