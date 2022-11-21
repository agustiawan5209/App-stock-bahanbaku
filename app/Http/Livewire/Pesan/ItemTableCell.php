<?php

namespace App\Http\Livewire\Pesan;

use Livewire\Component;
use App\Models\BahanBaku;
use App\Models\Suppliers;
use App\Models\BahanBakuAir;
use Illuminate\Support\Carbon;

class ItemTableCell extends Component
{
    public $modal = false;
    public $kirim, $itemTab, $BB, $Additem, $kode_transaksi, $supplier_id;
    public $supplier, $sup_id, $no_telpon, $bahan, $harga, $keterangan, $jumlah, $tgl, $sub_total, $bahan_id, $KBM, $gambar;
    public $kodepesan, $IDtabOpen, $countTab, $jumlah_stock, $info, $Alert;
    public $itemID;
    public function mount($itemID)
    {
        $this->itemID = $itemID;
    }
    public function render()
    {
        // dd($this->itemID);
        $bb = BahanBakuAir::where('suppliers_id', $this->itemID)->get();
        // dd($bb);
        return view('livewire.pesan.item-table-cell', [
            'bb'=> $bb
        ]);
    }
    public function Pesan($id)
    {
        $data = BahanBakuAir::find($id);
        $supplier = Suppliers::where('id', $id)->get();
        $this->itemID = $data->id;
        $this->sup_id = $data->supplier->user_id;
        $this->supplier_id = $data->suppliers_id;
        $this->supplier = $data->supplier->supplier;
        $this->no_telpon = $data->supplier->User->phone;
        $this->bahan = $data->default_bahan_air->bahan_baku;
        $this->bahan_id = $data->bahanbaku_air_id;
        $this->gambar = $data->gambar;
        $this->jumlah_stock = $data->jumlah_stock;
        // cek harga
        $this->harga = $data->harga;
        $this->jumlah = '1';
        $this->tgl = Carbon::now()->format('Y-m-d');
        $this->sub_total = "Rp. " . number_format(intval($this->harga) * intval($this->jumlah), 0, 2);
        $this->Additem = true;
        // return redirect()->to("https://wa.me/" . $data->supplier->no_telpon . "?text=" . $pesan);

    }
}
