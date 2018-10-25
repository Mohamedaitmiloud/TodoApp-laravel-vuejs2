<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="todo app using laravel and vuejs2">
  <meta name="Mohamed Ait Miloud" content="Todos,Laravel and vuejs2">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Todos | Laravel/Vuejs2</title>
  <!-- Favicon -->
  <link href="/assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="/assets/css/argon.css" rel="stylesheet">
</head>

<body>
  <header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
      <div class="container">
        <a class="navbar-brand mr-lg-5" href="../index.html">
          Laratodo
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.html">
                  <img src="/assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
           
            </li>
          </ul>
          <ul class="navbar-nav align-items-lg-center ml-lg-auto">

            @if(Auth::check())

            <li class="nav-item dropdown">
              <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                <i class="ni ni-collection d-lg-none"></i>
                <span class="nav-link-inner--text">{{Auth::user()->name}}</span>
              </a>
              <div class="dropdown-menu">
                <a data-toggle="modal" data-target="#modal-notification" class="dropdown-item">Edit Profile</a>
                <a href="{{url('/')}}" class="dropdown-item">Log out</a>
              </div>
            </li>
              @endif

          </ul>
        </div>
      </div>
    </nav>
  </header>

                @yield('content')

  <footer class="footer">
    <div class="container">

      <hr>
      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-6 offset-5">
          <div class="copyright">
            &copy; 2018
            <a href="https://github.com/Mohamedaitmiloud" target="_blank">Mohamed Ait Miloud</a>.
          </div>
        </div>

      </div>
    </div>
  </footer>
  <!-- Core -->
  <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>
  <!-- Argon JS -->
  <script src="/assets/js/argon.js"></script>
  @yield('js')
</body>

</html>