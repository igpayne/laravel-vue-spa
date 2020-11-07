<template>
    <div class="col-lg-3">

        <h1 class="my-4">Categories</h1>
        <div class="list-group">
            <a href="#" class="list-group-item" v-for="category in categories" :key="category.id">
              {{ category.name }}
            </a>
        </div>

      </div>
</template>

<script>
export default {
    props: {
        categories: {
            type: Array,
            default: []
        }
    }
}
</script>