@extends('t_index_user')
@section('content')

<div class="container">
@if (Session::has('message'))
<div class="alert alert-success  alert-dismissible fade show">
    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

<h1></h1>
<h3>Menu Kue</h3>

<div class="row mt-1">
        @foreach ($kue as $data)
            <div class="col-xs-6 col-md-4  d-flex align-items-stretch">

                <div class="card">
                    <img src="{{ asset('Assets/kue/'.$data->gambar) }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->nama_kue }}</h5>
                        <p class="card-text">Rp. {{ number_format($data->harga, 0,'','.') }}</p>
                        <a href="beliitemkue/{{ $data->kode_kue }}"><button type="button" class="btn btn-success">Beli</button></a>
                    </div>
                </div>

            </div>
        @endforeach
</div>

</div>
@stop
