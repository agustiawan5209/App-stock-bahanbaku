<?php

namespace App\Http\Controllers;

use App\Models\PesanCustomer;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function EditPesananCustomer(Request $request, $id)
    {
        $this->validate($request,[
            'alamat'=>'required',
            'jumlah_pesanan'=> 'required|integer',
            'tgl_pemesanan'=> 'required|date'
        ]);
        try{
            PesanCustomer::find($id)->updateOrCreate([
                'tgl_pemesanan'=> $request->tgl_pemesanan,
                'jumlah_pesanan'=> $request->jumlah_pesanan * $request->harga,
                'alamat'=> $request->alamat,
            ]);
            return redirect()->route('Admin.PesananCustomer')->with('message', 'Berhasil DItambah');
        }catch(\Exception $msg){
            return redirect()->route('Admin.PesananCustomer')->with('message', 'Gagal DItambah '. $msg->getMessage());
        }
    }
}
