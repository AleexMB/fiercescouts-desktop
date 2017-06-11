<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->

    <title>{{ config('app.name', 'Fiercescouts') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/hover-min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <!-- Scripts -->
</head>
<body>
  <div class="navbarContainer">
    <div class="row">
      <div class="col-md-offset-1 col-md-10">
        <div class="leftAreaNavbar">
          <div class="logoArea">
          </div>
          <a class="navbar-brand" href="{{ url('/') }}">
            FirceScouts
          </a>
        </div>
        <div class="centerAreaNavbar text- ">
          <a class="items" onclick="window.location='{{ route("items.index") }}'">ITEMS</a>
          <a class="ladders">LADDERS</a>
          <img class="battleMode text-center ">
          </img>
          <a class="chests">CHESTS</a>
          <a class="profile" onclick="window.location='{{ route("characters.index") }}'">PROFILE</a>
        </div>
        <div class="rightAreaNavbar">
          <div class="userImage"></div>
          <p class="userName">{{ Auth::user()->name }}</p>
          <a class="logout" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout').submit();">
              LOGOUT
          </a>
          <form  id="logout" class="logout" action="{{ route('logout') }}" method="POST">
              {{ csrf_field() }}
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/jquery-2.2.0.min.js') }}"></script>
  @yield('create')
</body>
