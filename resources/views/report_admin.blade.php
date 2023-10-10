@extends('t_index')
@section('content')

<div class="container">
@if (Session::has('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>

@endif

<h1>Laporan</h1>

<p></p>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Kode Kue</th>
            <th>Nama Kue</th>
            <th>Jumlah</th>
            <th>Harga</th>
        </tr>
        <?php $no=1; ?>
        <?php $total=0; ?>
        <?php $id_user=0; ?>
        @foreach ($kue as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->kode_kue }}</td>
            <td>{{ $data->nama_kue }}</td>
            <td>{{ $data->jumlah }}</td>
            <td>Rp. {{ number_format($data->harga, 0,'','.') }}</td>
            <?php $total=$total+$data->harga; ?>
        </tr>
        @endforeach
        <tr>
            <th> </th>
            <th> </th>
            <td>Total : </td>
            <th> </th>
            <th>Rp. <?php echo number_format($total, 0,'','.'); ?> </th>
        </tr>
    </table>
</div>
</div>
@stop
