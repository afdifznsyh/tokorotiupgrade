@extends('t_index_login')
@section('content')

    @if (Session::has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>

    @endif
    <p></p>
    <div class="card" style="background-color: lightblue;">
        <div class="card-body">
            <div class="panel panel-default" >
                <div class="panel-heading">

                </div>
                    <h3>Login</h3>
                <div class="panel-body" >
                    {!! Form::open() !!}
                    Email :
                    {!! Form::text('email','',['placeholder'=>'Masukan Email Anda', 'class'=>'form-control']) !!}
                    @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    Password :
                    {!! Form::password('password', ['placeholder'=>'Masukan Password Anda', 'class'=>'form-control']) !!}
                    <p></p>
                    <a href="register" >belum punya akun ? </a>
                    <p></p>
                    {!! Form::submit('Login', ['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
