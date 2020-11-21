@extends("layouts.template")

@section("content")
<div id="app">

<login-modal></login-modal>
<register-modal></register-modal>

<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Team Ill Records</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <router-link tag="li" to="/" exact>
                <button type="button" class="btn btn-link nav-link">Home</button>
            </router-link>
            <router-link tag="li" to="/releases" exact>
                <button type="button" class="btn btn-link nav-link">Releases</button>
            </router-link>
            @auth
            <li class="nav-item">
                <button type="button" class="btn btn-link nav-link">My Account</button>
            </li>
            <logout-button></logout-button>
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

<router-view></router-view>

<!--
<component 
    :is="currentPage" 
    v-bind:current-properties="currentProperties" 
    v-on:single-release-page="singleReleasePage($event)"
></component>
-->

</div>

<!-- Vue app script -->
<script src="/js/app.js"></script>
@endsection


