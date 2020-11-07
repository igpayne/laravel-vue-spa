<template>
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
</template>

<script>
export default {
    props: {
        releases: {
            type: Array,
            default: []
        }
    }
}
</script>