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

      <div class="modal-body">
        <!-- Form -->
        <form enctype="multipart/form-data">
            <div class="alert alert-success text-center" role="alert" v-if="submitSuccess">
                Release successfully added!
            </div>
            <div class="alert alert-danger text-center" role="alert" v-if="submitFailure">
                Error adding release, please check fields
            </div>
            <div class="form-group">
                <label for="releaseName">Release name</label>
                <input type="text" class="form-control" id="releaseName" placeholder="Enter the name of the release" v-model="newRelease.name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" placeholder="Enter a description" v-model="newRelease.description"></textarea >
            </div>
            <div class="form-group">
                <label for="genreSelect">Genre</label>
                <select class="custom-select" id="genreSelect" v-model="newRelease.genre">
                    <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{genre.name}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="releaseCoverImage">Upload release cover</label>
                <input type="file" accept="image/*" class="form-control-file" id="releaseCoverImage" @change="fileChange">
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
        <button type="button" class="btn btn-primary" :disabled="!formValidated" v-on:click="submit">Add release</button>
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

            releaseCover: {},

            submitSuccess: false,
            submitFailure: false
        }
    },

    created() {
        this.loadGenres();        
    },

    computed: {
        formValidated: function() {
            return this.validateInputLength(this.newRelease.name, 32)
                && this.validateInputLength(this.newRelease.description, 250)
                && this.validateTracks(this.newRelease.tracks);
        }
    },
    
    methods: {
        fileChange: function(e) {
            console.log(e.target.files[0])
            this.releaseCover = e.target.files[0];
        },

        // retrieves all available genres via api
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

        // sends a post request via api using data created via the form
        submit: function() {
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }

            let formData = new FormData();
            const newReleaseJSON = JSON.stringify(this.newRelease);
            formData.append("newRelease", newReleaseJSON);
            formData.append("cover", this.releaseCover);

            axios.post("/api/releases", formData, config)
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

        // resets data bound to the form
        resetData: function() {
            this.newRelease = {
                name: "",
                description: "",
                genre: "",
                tracks: []
            };
            this.releaseCover = {};
        },

        validateInputLength(input, max) {
            return input.length != "" && input.length < max;
        },

        validateTracks(tracks) {
            if (tracks.length === 0) {
                return false;
            } 
            else {
                let validation = true;
                tracks.forEach( (track) => {
                    if (track.name.length == "" || track.bpm.length == "") {
                        validation = false;
                        return;
                    }
                });
                return validation;
            }
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