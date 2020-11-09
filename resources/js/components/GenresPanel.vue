<template>

<div>
    <h1 class="mt-5 mb-5 text-left">Genres</h1>
    <div class="list-group">
        <button type="button" class="list-group-item btn btn-link" href="#" 
        v-for="genre in genres" 
        :key="genre.id" 
        v-on:click="$emit('genreFilter', genre.id)">
            {{ genre.name }}
        </button>
    </div>
    <div class="text-center">
        <button type="button" class="btn btn-primary mt-2 mb-2" @click="$emit('refreshReleases')">Reset filter</button>
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