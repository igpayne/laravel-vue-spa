<template>

<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="addReleaseModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Publish new release</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="resetData">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" v-if="!submitPressed">
        <!-- Form -->
        <form>
            <div class="alert alert-success text-center" role="alert" v-if="submitSuccess">
                Release successfully added!
            </div>
            <div class="alert alert-error text-center" role="alert" v-if="submitFailure">
                Error adding release, please check fields!
            </div>
            <div class="form-group">
                <label for="releaseName">Release name</label>
                <input type="text" class="form-control" id="releaseName" placeholder="Release Name" v-model="newRelease.name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" placeholder="Enter a description" v-model="newRelease.description"></textarea >
            </div>
            <select class="custom-select" v-model="newRelease.genre">
                <option selected>Pick a genre</option>
                <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{genre.name}}</option>
            </select>
            <div class="form-group">
                <label for="releaseCoverImage">Upload release cover</label>
                <input type="file" class="form-control-file" id="releaseCoverImage">
            </div>
            <div v-for="track in newRelease.tracks" :key="track.id">
                <h5><strong>Track {{track.number}}</strong></h5>
                <div class="form-group">
                    <label for="trackName">Track name</label>
                    <input type="text" class="form-control" id="tracksName"  placeholder="Track Name" v-model="track.name">
                </div>
                <div class="form-group">
                    <label for="trackName">Track BPM</label>
                    <input type="text" class="form-control" id="tracksName"  placeholder="Track BPM" v-model="track.bpm">
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-primary" v-on:click="addTrack">Add track</button>
            </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" v-on:click="submit" v-if="!submitPressed">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="resetData">Close</button>
      </div>

    </div>
  </div>
</div>
</template>

<script>

export default {
    data: function() {
        return {
            genres: [],

            newRelease: {
                name: "",
                description: "",
                genre: "",
                tracks: []
            },

            submitSuccess: false,
            submitFailure: false,
            submitPressed: false,
        }
    },

    created() {
        this.loadGenres();        
    },
    
    methods: {
        loadGenres: function() {
            axios.get("/api/genres")
            .then((response) => {
                this.genres = response.data.data;
            })
            .catch((error) => {
                console.log(error);
            });
        },
        
        addTrack: function() {
            this.newRelease.tracks.push({
                number: this.newRelease.tracks.length + 1,
                name: "",
                bpm: ""
            })
        },

        submit: function() {
            this.submitPressed = true;
            axios.post("/api/releases", this.newRelease)
            .then((response) => {
                this.succeed();
                this.resetData();
                this.$emit("refreshReleases");
            })
            .catch((error) => {
                this.fail();
                console.log(error);
            })
        },

        resetData: function() {
            this.newRelease = {
                name: "",
                description: "",
                genre: "",
                tracks: []
            };
            this.submitPressed = false;
        },

        fail: function() {
            this.submitFailure = true;
            this.submitSuccess = false;
        },

        succeed: function() {
            this.submitFailure = false;
            this.submitSuccess = true;
        }
    }
}

</script>