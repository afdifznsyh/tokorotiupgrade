@extends('t_index_user')
@section('content')

<div class="container">
    <p></p>
    <div class="card">
        <div class="card-body">
    <div class="panel panel-default">
        <div class="panel-heading">
            Kue Kukis
        </div>
        <h1></h1>
        <div class="panel-body">
            {!! Form::model($kue,['url'=>'/proseskeranjang/'.$kue->kode_kue]) !!}
            Gambar :
            <br>
            <img src="{{ asset('Assets/kue/'.$kue->gambar) }}" width="100">
            <br>
            Nama Kue :
            {!! Form::text('nama_kue', null, ['class'=>'form-control', 'disabled']) !!}
            Harga per biji :
            {!! Form::text('harga', null, ['class'=>'form-control' , 'disabled']) !!}
            <p></p>
            Jumlah :
            {!! Form::number('jumlah','',['placeholder'=>'Beli Berapa', 'class'=>'form-control']) !!}
                @error('jumlah')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <p></p>
            {!! Form::submit('Beli', ['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
            @stop
        </div>
    </div>
</div>
</div>
</div>
