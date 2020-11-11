<template>

<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="loginModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Log In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Error alert -->
        <div class="alert alert-danger text-center" role="alert" v-if="lastAttemptFailed">
            Error logging in, please check details and try again
        </div>

        <!-- Form -->
        <form>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" v-model="loginDetails.username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" v-model="loginDetails.password">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe" v-model="loginDetails.rememberMe">
                <label class="form-check-label" for="rememberMe" >Remember me</label>
            </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" :disabled="!formValidated" v-on:click="login">Submit</button>
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
            lastAttemptFailed: false,
            loginDetails: {
                username: "",
                password: "",
                rememberMe: false
            }
        }
    },

    computed: {
        formValidated: function() {
            return this.validateInputLength(this.loginDetails.username, 32)
                && this.validateInputLength(this.loginDetails.password, 32)
        }
    },

    methods: {
        login: function() {
            axios.post("/api/login", this.loginDetails)
            .then((response) => {
                this.resetData();
                window.location.reload();
            })
            .catch((error) => {
                this.lastAttemptFailed = true;
                console.log(error);
            })
        },

        resetData: function() {
            this.lastAttemptFailed = false;
            this.loginDetails = {
                username: "",
                password: "",
                rememberMe: false
            }
        },

        validateInputLength(input, max) {
            return input.length != "" && input.length < max;
        }
    }
}
</script>