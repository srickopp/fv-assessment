<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav
      class="navbar navbar-expand-lg navbar-dark bg-dark"
    >
      <div class="container">
        <a href="#" class="navbar-brand">
          <b>Samuel Ricko</b>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="/address" class="nav-link"> Address </a>
            </li>
            <li class="nav-item">
              <a href="/booking" class="nav-link"> Bookings </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>
</body>
</html>