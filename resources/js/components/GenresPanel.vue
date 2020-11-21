<template>

<div>
    <h1 class="mt-5 mb-5 text-left">Genres</h1>
    <div class="list-group">
        <router-link type="button" class="list-group-item btn btn-link"
        v-for="genre in genres" 
        :key="genre.id" 
        :to="'/releases?genre=' + genre.id" exact>
            {{ genre.name }}
        </router-link>
    </div>
    <div class="text-center">
        <router-link type="button" class="btn btn-primary mt-2 mb-2" to="/releases">Reset filter</router-link>
    </div>
</div>

</template>

<script>
export default {
    props: {
        genres: {
            type: Array,
            default: []
        }
    }
}
</script>