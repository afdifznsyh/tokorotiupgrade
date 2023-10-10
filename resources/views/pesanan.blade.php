@extends('t_index')
@section('content')

<div class="container">
@if (Session::has('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<p></p>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Kode Kue</th>
            <th>Nama Kue</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
        <?php $no=1; ?>
        @foreach ($kue as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->kode_kue }}</td>
            <td>{{ $data->nama_kue }}</td>
            <td>{{ $data->jumlah }}</td>
            <td>{{ $data->harga }}</td>
            <td><a href="kirim_kue/{{ $data->kode_kue }}" class="btn btn-success text-white">Kirim</a></td>
        </tr>
        @endforeach
    </table>
</div>
</div>
@stop
