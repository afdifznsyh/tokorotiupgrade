@extends('t_index_user')
@section('content')

<div class="container">
@if (Session::has('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>

@endif

<h1></h1>

<p></p>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>Nama Kue</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
        <?php $no=1; ?>
        <?php $total=0; ?>
        <?php $id_user=0; ?>
        @foreach ($kue as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td><img src="{{ asset('Assets/kue/'.$data->gambar) }}" width="100"></td>
            <td>{{ $data->nama_kue }}</td>
            <td>{{ $data->jumlah }}</td>
            <td>Rp. {{ number_format($data->harga, 0,'','.') }}</td>
            <?php $total=$total+$data->harga; ?>
            <?php $id_user=$data->id_user; ?>
            <td><a href="batalkeranjang/{{ $data->kode_kue }}" class="btn btn-danger text-white">Batal</a></td>
        </tr>
        @endforeach
        <tr>
            <th> </th>
            <th> </th>
            <th>Total :</th>
            <th> </th>
            <th>Rp. <?php echo number_format($total, 0,'','.'); ?> </th>
            <td><a href="batalsemuakeranjang/{{ $id_user }}" class="btn btn-success text-white">Selesai</a></td>
        </tr>
    </table>
</div>
</div>
@stop
