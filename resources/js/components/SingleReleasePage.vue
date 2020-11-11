<template>
<!-- Page Content -->
  <div class="container">

    <div class="row">

    <!-- Side bar (to remove)

      <div class="col-lg-3">
        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          <a href="#" class="list-group-item active">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>
      </div>
      
    /.col-lg-3 -->
      

      <div class="col-lg-12">

        <div class="card mt-4">
            <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
            <div class="card-body">
                <h3 class="card-title">{{ release.name }}</h3>
                <p class="card-text">{{ release.description }}</p>
                <span v-for="genre in genres" :key="genre.id">{{ genre.name }} </span>
            </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
            <div class="card-header">
                Tracks
            </div>
            <div class="card-body">
                <div v-for="(track, index) in tracks" :key="track.id">
                    <h3>{{ track.name }}</h3>
                    <small class="text-muted">BPM: {{ track.bpm }}</small>
                    <hr v-if="index < tracks.length - 1">
                </div>
            </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->
</template>

<script>
    export default {
        props: {
            "current-properties": {
                type: Object,
                default: function() {
                    return { releaseID: 0}
                }
            }
        },

        data() {
            return {
                release : {
                    name: "",
                    description: ""
                },

                tracks: [],
                genres: [],
            }
        },

        created: function() {
            this.fetchRelease(this.currentProperties.releaseID);
            this.fetchGenres(this.currentProperties.releaseID);
            this.fetchTracks(this.currentProperties.releaseID);
        },

        methods: {
            fetchRelease: function(releaseID) {
                axios.get("/api/releases/" + releaseID)
                .then((response) => {
                    this.release = response.data.data;
                })
                .catch((error) => {
                    console.log(error);
                })
            },

            fetchTracks: function(releaseID) {
                axios.get("/api/tracks?release=" + releaseID)
                .then((response) => {
                    this.tracks = response.data.data;
                })
                .catch((error) => {
                    console.log(error);
                })
            },

            fetchGenres: function(releaseID) {
                axios.get("/api/genres?release=" + releaseID)
                .then((response) => {
                    this.genres = response.data.data;
                })
                .catch((error) => {
                    console.log(error);
                })
            }
        }
    }
</script>