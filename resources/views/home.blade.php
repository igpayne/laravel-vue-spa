@extends("layouts.template")

@section("content")
<div id="app">

<login-modal></login-modal>
<register-modal></register-modal>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Team Ill Records</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <button type="button" class="btn btn-link nav-link" v-on:click="frontPage">Home
                    <span class="sr-only">(current)</span>
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-link nav-link" v-on:click="releases">Releases</button>
            </li>
            @auth
            <li class="nav-item">
                <button type="button" class="btn btn-link nav-link">My Account</button>
            </li>
            @else
            <li class="nav-item">
                <button type="button" class="btn btn-link nav-link" data-toggle="modal" data-target="#loginModal">Log In</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-link nav-link" data-toggle="modal" data-target="#registerModal">Sign Up</button>
            </li>
            @endauth
        </ul>
        </div>
    </div>
</nav>

<component :is="currentPage"><component>

</div>


<!-- Vue app script -->
<script src="/js/app.js"></script>
@endsection


