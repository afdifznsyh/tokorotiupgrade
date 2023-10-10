<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    //User

    public function register(){
        return View('register');
    }

    public function tambahuser(){
        $jenis_kelamin = request()->get('jenis_kelamin') =='l'?'Laki-Laki':'Perempuan';

        $data = array(
            'nama' => request()->get('nama'),
            'alamat' => request()->get('alamat'),
            'jenis_kelamin' => $jenis_kelamin,
            'email' => request()->get('email'),
            'password' => Hash::make(request()->get('password')),
        );
        User::insert($data);
        return Redirect::to('/login')->with('message', 'Berhasil Menambah Akun');
    }

    public function keluaradmin(){
        return View('login');
    }

    //login

    public function login(){

            $email = request()->get('email');
            $password = request()->get('password');

            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                request()->session()->regenerate();

                return redirect()->intended('/');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);

    }

    //logout
    public function keluaruser(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
