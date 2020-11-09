<template>

<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="addReleaseModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Publish new release</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" v-if="!submitPressed">
        <!-- Form -->
        <form>
            <div class="form-group">
                <label for="releaseName">Release name</label>
                <input type="text" class="form-control" id="releaseName" placeholder="Release Name" v-model="newRelease.name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" placeholder="Enter a description" v-model="newRelease.description"></textarea >
            </div>
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

        <div v-if="submitPressed">
            <p class="text-center">Processing submission...</p>
        </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" v-on:click="submit"  v-if="!submitPressed">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</template>

<script>

export default {
    data: function() {
        return {
            newRelease: {
                name: "",
                description: "",
                tracks: []
            },

            submitPressed: false,
            submitSuccess: false
        }
    },
    
    methods: {
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
                console.log(response);
                this.submitSuccess();
            })
            .catch((error) => {
                console.log(error);
            })
        }
    }
}

</script>