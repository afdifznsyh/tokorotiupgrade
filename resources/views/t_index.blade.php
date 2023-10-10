<html>
    <head>
        <title>
            Dwi Kumara Widyatna
        </title>
        <link rel="stylesheet" type="text/css" href="{{ asset('Assets/css/bootstrap.min.css') }}">
    </head>
    <body>

        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">Point of Sale</a>
            <div>

                <label><b>Hy, Admin</b></label>

            </div>
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
                            <a class="nav-link {{ Request::route()->getName()=='index'?'active':null }}" href="{{ route('index') }}">Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::route()->getName()=='read'?'active':null }}" href="{{ route('read') }}">Data Menu Roti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::route()->getName()=='index'?null:null }}" href="{{ route('report') }}">Laporan</a>
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
