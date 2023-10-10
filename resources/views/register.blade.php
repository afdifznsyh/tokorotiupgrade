@extends('t_index_login')
@section('content')

<div class="container">
    @if (Session::has('message'))
    <span class="label label-succes">{!! Session::get('message') !!}</span>
    @endif
    <p></p>
    <div class="card" style="background-color: lightblue;">
        <div class="card-body">
            <div class="panel panel-default">
                <div class="panel-heading">

                </div>
                    <h3>Register</h3>
                <div class="panel-body">
                    {!! Form::open() !!}
                    Nama :
                    {!! Form::text('nama','',['placeholder'=>'Masukan Nama Anda', 'class'=>'form-control']) !!}
                    Alamat :
                    {!! Form::text('alamat','',['placeholder'=>'Masukan Alamat Anda', 'class'=>'form-control']) !!}
                    Jenis Kelamin :
                    {!! Form::select('jenis_kelamin', ['l' => 'Laki-Laki', 'p' => 'Perempuan'], null, ['placeholder'=>'--Pilih--', 'class'=>'form-control']) !!}
                    Email :
                    {!! Form::email('email','',['placeholder'=>'Masukan Email Anda', 'class'=>'form-control']) !!}
                    Password :
                    {!! Form::password('password', ['placeholder'=>'Masukan Password Anda', 'class'=>'form-control']) !!}
                    <p></p>
                    {!! Form::submit('Register', ['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}
                @stop
                </div>
            </div>
        </div>
    </div>
</div>
