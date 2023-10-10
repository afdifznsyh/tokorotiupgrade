@extends('t_index')
@section('content')
<div class="container">
    <p></p>
    <div class="card">
        <div class="card-body">
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Data Kue
        </div>
        <h1></h1>
        <div class="panel-body">
            {!! Form::open(['url'=>'/proseseditdata']) !!}
            {!! Form::hidden('kode_kue', $kue->kode_kue, ['class'=>'form-control']) !!}
            Gambar :
            <br>
            <img src="{{ asset('Assets/kue/'.$kue->gambar) }}" width="100">
            <br>
            Nama Kue :
            {!! Form::text('nama_kue', $kue->nama_kue, ['class'=>'form-control']) !!}
            Jumlah :
            {!! Form::text('jumlah', $kue->jumlah, ['class'=>'form-control']) !!}
            Harga :
            {!! Form::text('harga', $kue->harga, ['class'=>'form-control']) !!}
            <p></p>
            {!! Form::submit('Ubah Data', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
            @stop
        </div>
    </div>
</div>
</div>
</div>
