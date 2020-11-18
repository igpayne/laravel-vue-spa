<template>
    <div class="card h-100">
        <a href="#" v-on:click="$emit('singleReleasePage', release.id)"><img class="card-img-top" :src="'storage/' + release.coverPath" alt=""></a>
        <div class="card-body">
        <h4 class="card-title">
            <a href="#" v-on:click="$emit('singleReleasePage', release.id)">{{release.name}}</a>
        </h4>
        <p class="card-text">{{release.description}}</p>
        </div>
        <!-- Footer needs implementing still
        <div class="card-footer">
            <small class="text-muted"> {{ releaseGenreNames["1"] }} </small>
        </div>
        -->
    </div>
</template>

<script>
export default {
    props: {
        release: {
            type: Object,
            default: function() {
                return {
                    id: 0,
                    name: "",
                    description: "",
                    coverPath: "placeholder.png"
                };
            }
        }
    }
}
</script>