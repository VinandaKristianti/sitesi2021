<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pendaftaran;
use DB;

class pendaftaranController extends Controller
{
    //simpan ke database
    public function pilihJadwal($id_daftar){
        $daftar = new pendaftaran;
        $daftar->id_tes=$id_daftar;
        $daftar->save();
        return redirect('user');
    }

    //buat nampilin yg disimpan di riwayat
    public function viewPilih(){
        $data_view = DB::table('jadwal')->join('pendaftaran','jadwal.id_jadwal','=','pendaftaran.id_daftar')->get();
        return view('User.riwayat',compact('data_view'));
    }
}
