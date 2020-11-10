<template>
    <li class="nav-item">
        <button type="button" class="btn btn-link nav-link" v-on:click="logout">Logout</button>
    </li>
</template>

<script>
export default {
    methods: {
        logout: function() {
            axios.get("/api/logout")
            .then((response) => {
                window.location.reload();
            })
            .catch((error) => {
                console.log(error);
            })
        }
    }
}
</script>