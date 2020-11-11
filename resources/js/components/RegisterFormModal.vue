<template>

<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="registerModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <!-- Error alert -->
        <div class="alert alert-danger text-center" role="alert" v-if="lastAttemptFailed">
            Error creating account, please try again
        </div>

        <!-- Form -->
        <form>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter a username" v-model="accountDetails.username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter a password" v-model="accountDetails.password">
            </div>
            <div class="form-group">
                <label for="repeat_password">Repeat password</label>
                <input type="password" class="form-control" id="repeat_password" placeholder="Repeat your password" v-model="accountDetails.repeat_password">
            </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" :disabled="!formValidated" v-on:click="register">Create Account</button>
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
            accountDetails: {
                username: "",
                password: "",
                repeat_password: ""
            }
        }
    },

    computed: {
        formValidated: function() {
            return this.validateInputLength(this.accountDetails.username, 32)
                && this.validateInputLength(this.accountDetails.password, 32) 
                && (this.accountDetails.password == this.accountDetails.repeat_password);
        }
    },

    methods: {
        register: function() {
            axios.post("/api/register", this.accountDetails)
            .then((response) => {
                this.resetData();
                window.location.reload();
            })
            .catch((error) => {
                this.lastAttemptFailed = true;
                this.resetData();
                console.log(error);
            })
        },

        resetData: function() {
            this.accountDetails = {
                username: "",
                password: "",
                repeat_password: ""
            }
        },

        validateInputLength(input, max) {
            return input.length != "" && input.length < max;
        }
    }
}
</script>