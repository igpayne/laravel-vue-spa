<template>
<div>
    <div class="row mb-5 mt-5">
        <div class="col-lg-9">
            <h1 class="text-left">Releases</h1>
        </div>
        <div class="col-lg-3 mt-3">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addReleaseModal">Add new release</button>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4" v-for="release in releases" :key="release.id">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                <h4 class="card-title">
                    <a href="#">{{release.name}}</a>
                </h4>
                <p class="card-text">{{release.description}}</p>
                </div>
            </div>
        </div>
    </div>

    <AddReleaseForm
        v-on:refreshReleases="$emit('refreshReleases')"
    ></AddReleaseForm>

</div>
</template>

<script>
import AddReleaseForm from "./AddReleaseForm.vue";

export default {
    components: {
        AddReleaseForm
    },

    props: {
        releases: {
            type: Array,
            default: []
        }
    }
}
</script>