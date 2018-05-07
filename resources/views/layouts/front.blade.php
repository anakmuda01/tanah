<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.js" integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA=" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark navigasi">
            <div class="container">
                <a class="navbar-brand lengkap" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <a href="{{ url('/') }}" class="navbar-brand singkat">
                  <strong>AFG</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      <li><a class="nav-link" href="#">Kontak</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                      <li><a class="nav-link" href="/cek-history">Cek Histori Pembayaran Anda</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main role="main">
            @yield('content')
        </main>
        <div class="col-md-12 footer">
          <p class="text-center">2018 © Al-Fatin Group</p>
          <div class="row">
            <div class="col-md-6 text-center">
              <h1>Alamat</h1>
              <br>
              <ul class="list-unstyled">
                <li>Jl. Cindai Alus RT.08 RW.03</li>
                <li>(Pemancingan Al-Fatin) Dekat Ponpes Darus Hijrah Putra</li>
                <li>Kec. Martapura Kab. Banjar</li>
              </ul>
            </div>
            <div class="col-md-6 text-center">
              <h1>Kontak</h1>
              <br>
              <ul class="list-unstyled">
                <li>Telpon : 082153373448 | 085387647158 | 085753266327 </li>
                <li>Email : alfathin288@yahoo.co.id</li>
                <li>FAX : 051170612</li>
              </ul>
            </div>
          </div>
        </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function() {
        $('.carousel').carousel({
          interval: 4000
        });

        $(document).scroll(function () {
          var nav = $(".navigasi");
          nav.toggleClass('scrolled', $(this).scrollTop() > nav.height()+10);
        });
      });
    </script>
</body>
</html>
