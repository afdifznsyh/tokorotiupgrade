<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Report;
use App\Models\Kue;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Crudcontroller extends Controller
{
    public function tambahdata(){

        $file = request()->file('gambar');
        $nama_file = $file->getClientOriginalName();

        $data = array(
            'kode_kue' => request()->get('kode_kue'),
            'nama_kue' => request()->get('nama_kue'),
            'jumlah' => request()->get('jumlah'),
            'harga' => request()->get('harga'),
            'gambar' => $nama_file,
        );

        Kue::insert($data);
        $file->move('Assets/kue',$nama_file);
        return Redirect::to('/read')->with('message', 'Berhasil Menambah Data');
    }

    public function tambahdatakue(){
        return View('tambahkue');
    }

    public function lihatdata(){
        $data = Kue::get();
        return View::make('read')->with('kue', $data);
    }

    public function hapusdata($kode_kue){
        $query = DB::table('kue')->where('kode_kue','=', $kode_kue);
        $data = $query->first();

        $query->delete();
        unlink('Assets/kue/'.$data->gambar);
        return Redirect::to('/read')->with('message', 'Berhasil Menghapus Data');
    }

    public function editdata($kode_kue){
        $data = Kue::where('kode_kue','=', $kode_kue)->first();
        return View::make('editkue')->with('kue', $data);
    }

    public function proseseditdata(){
        $data = array(
            'nama_kue' => request()->get('nama_kue'),
            'jumlah' => request()->get('jumlah'),
            'harga' => request()->get('harga'),
        );
        Kue::where('kode_kue', '=', request()->get('kode_kue'))->update($data);
        return Redirect::to('/read')->with('message', 'Berhasil Mengedit Data');
    }

    public function pesanankue(){
        $data = Transaksi::get();
        return View::make('pesanan')->with('kue', $data);
    }


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

    //dataprofile
    public function datauser(){
        Kue::get();
        return View::make('read')->with('kue', $data);
    }

    public function menu_user(){

        if(Auth::user()->email!='admin@gmail.com'){
            $data = Kue::get();

            return View::make('layout')->with('kue', $data);

        }else{
            $data = Transaksi::get();

            return View::make('layout')->with('kue', $data);

        }

        return View::make('layout');

    }

    //Beli
    public function belikue($kode_kue){
        $data = Kue::where('kode_kue','=', $kode_kue)->first();
        return View::make('belikue')->with('kue', $data);
    }

    public function lihatkeranjang(){
        $data = Keranjang::get();
        return View::make('keranjang')->with('kue', $data);
    }

    public function lihattransaksi(){
        $data = Transaksi::get();
        return View::make('pesanan')->with('kue', $data);
    }

    public function kirimkue(){
        $data = Keranjang::get();
        return View::make('keranjang')->with('kue', $data);
    }

    public function tambahkeranjang($kode_kue){

        request()->validate([
            'jumlah' => 'required|int|min:1'
        ]);

        $data_kue = Kue::where('kode_kue','=', $kode_kue)->first();

        $gambar = $data_kue->gambar;
        $nama_kue = $data_kue->nama_kue;
        $harga = $data_kue->harga;


        $id_userku = Auth::id();

        $jumlah_item = request()->get('jumlah');

        $total_harga = $harga * $jumlah_item;

        $data = array(
            'id_user' => $id_userku,
            'kode_kue' => $kode_kue,
            'gambar' => $gambar,
            'nama_kue' => $nama_kue,
            'jumlah' => $jumlah_item,
            'harga' => $total_harga,
        );
        Keranjang::insert($data);

        $data_transaksi = array(
            'id_user' => $id_userku,
            'kode_kue' => $kode_kue,
            'nama_kue' => $nama_kue,
            'jumlah' => $jumlah_item,
            'harga' => $total_harga,
        );
        Transaksi::insert($data_transaksi);

        return Redirect::to('/')->with('message', 'Item kue telah ditambahkan ke keranjang');
    }

    public function hapuskeranjang($kode_kue){
        $query = Keranjang::where('kode_kue','=', $kode_kue);
        $data = $query->first();
        $query->delete();
        return Redirect::to('/keranjang')->with('message', 'Berhasil Membatalkan pesanan');
    }

    public function hapus_semua_keranjang($id_user){
        Keranjang::where('id_user', $id_user)->delete();
        return Redirect::to('/keranjang')->with('message', 'Barang anda sedang dikemas');
    }

    public function report($kode_kue){

        $data_kue = Transaksi::where('kode_kue','=', $kode_kue)->first();

        $nama_kue = $data_kue->nama_kue;
        $jumlah = $data_kue->jumlah;
        $harga = $data_kue->harga;

        $data_report = array(
            'kode_kue' => $kode_kue,
            'nama_kue' => $nama_kue,
            'jumlah' => $jumlah,
            'harga' => $harga,
        );
        Report::insert($data_report);


        $data_kue_update = Kue::where('kode_kue','=', $kode_kue)->first();

        $jumlah_asli = $data_kue_update->jumlah;

        $jumlah_asli = $jumlah_asli-$jumlah;

        $data_update = array(
            'jumlah' => $jumlah_asli,
        );
        Kue::where('kode_kue', '=', $kode_kue)->update($data_update);

        $query = Transaksi::where('kode_kue','=', $kode_kue);
        $data = $query->first();
        $query->delete();
        return Redirect::to('/report')->with('message', 'Berhasil Ditambahkan Ke Laporan');
    }

    public function lihatreport(){
        $data = Report::get();
        return View::make('report_admin')->with('kue', $data);
    }

}
