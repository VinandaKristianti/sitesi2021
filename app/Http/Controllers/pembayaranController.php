<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pembayaran;

class pembayaranController extends Controller
{

    public function viewTransaksi(Request $request){
        //kalo gak ada image bisa langsung pake ::all
        $request->validate([
            'nama'=>'required',
            'bank'=>'required',
            'tgl_kirim'=>'required',
            'bukti_bayar'=>'required|image|max:2048'
        ]);
        $image_tes = $request->file('bukti_bayar');
        $gambar_baru = rand().'.'.$image_tes->getClientOriginalExtension();
        //biar gambar yg diunggah masuk ke file public-images, images itu folder baru untuk simpan data gambar otomatis terbuat
        $image_tes->move(public_path('pembayaran'),$gambar_baru); 
        //tambah data
        $insert_data = array(
            'nama'=>$request->nama,
            'bank'=>$request->bank,
            'tgl_kirim'=>$request->tgl_kirim,
            'bukti_bayar'=>$gambar_baru
        );
        pembayaran::create($insert_data);
        //dd($insert_data);
        return redirect('/pembayaran')->with('sukses','Data berhasil diunggah !');
    }
}
