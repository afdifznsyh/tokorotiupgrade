@extends('t_index')
@section('content')
<div class="container">
    <p></p>
    <div class="card">
        <div class="card-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah Data Kue
                </div>
                    <h1></h1>
                <div class="panel-body">
                    {!! Form::open(['url'=>'/prosestambah']) !!}
                    Kode Kue :
                    {!! Form::text('kode_kue','',['placeholder'=>'Kode Kue', 'class'=>'form-control']) !!}
                    Nama Kue :
                    {!! Form::text('nama_kue','',['placeholder'=>'Nama Kue', 'class'=>'form-control']) !!}
                    Jumlah :
                    {!! Form::text('jumlah','',['placeholder'=>'Jumlah', 'class'=>'form-control']) !!}
                    Harga :
                    {!! Form::text('harga','',['placeholder'=>'Harga', 'class'=>'form-control']) !!}
                    <p></p>
                    {!! Form::submit('Tambah Data', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @stop
                </div>
            </div>
        </div>
    </div>
</div>
