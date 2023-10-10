<html>
    <head>
        <title>
            Belajar Laravel 8
        </title>
        <link rel="stylesheet" type="text/css" href="{{ 'Assets/css/bootstrap.min.css' }}">
    </head>
    <body>
        <div class="container" style="margin-top: 10%;">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
              <div class="col-md-8" align="center">
                <img src="{{ asset('Assets/kue/logo_toko.png') }}" width="30%">
                <p><b>Setiap detik sangatlah penting</b></p>
              </div>

              <div class="col-6 col-md-4">

                @yield('content')

              </div>
            </div>

        </div>
        <script type="text/javascript" href="{{ 'Assets/js/jquery.min.css' }}">
        <script type="text/javascript" href="{{ 'Assets/js/bootstrap.min.css' }}">
    </body>
</html>
