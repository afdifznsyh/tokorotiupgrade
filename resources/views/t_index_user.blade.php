<!DOCTYPE html>
<html>
    <head>
        <title>
            Belajar Laravel 8
        </title>
        <link rel="stylesheet" type="text/css" href="{{ asset('Assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('Assets/css/style.css') }}">
    </head>

    <body>

        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">Point of Sale</a>

            <div>
                <a href="{{ route('logout') }}"><button type="button" class="btn btn-sm btn-danger">Keluar</button></a>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <!-- photo profile -->
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ asset('Assets/kue/logo_toko.png') }}" width="180">
                        </div>
                    </div>

                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::route()->getName()=='index'?'active':null }}" href="{{ route('index') }}">Menu Kue</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::route()->getName()=='keranjang'?'active':null }}" href="{{ route('keranjang') }}">Transaksi</a>
                        </li>

                    </ul>

                </div>
                <div class="col-md-10">

        @yield('content')

                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('Assets/js/bootstrap.min.js') }}"></script>
    </body>
</html>
