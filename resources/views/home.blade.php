<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Team Ill Records</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/shop-homepage.css" rel="stylesheet">

</head>

<body>

    <div id="app">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Team Ill Records</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-link nav-link">Releases</button>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-link nav-link">VIP</button>
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

    <login-modal></login-modal>
    <register-modal></register-modal>

    <front-page/>
    
    </div>


  <!-- Footer -->
    <footer class="py-5 bg-dark footer">
        <div class="container">
        <p class="m-0 text-center text-white">Created by Isaac Payne for Teemill</p>
        </div>
        <!-- /.container -->
    </footer>

    <script>
        $("nav-link login").click(function() {

        });
    </script>

    <!-- Vue app script -->
    <script src="/js/app.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>