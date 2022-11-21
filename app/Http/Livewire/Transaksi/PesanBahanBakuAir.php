<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\Pesan;
use Livewire\Component;
use App\Models\BahanBaku;
use App\Models\Suppliers;
use App\Models\Transaksi;
use App\Models\BarangMasuk;
use App\Models\BahanBakuAir;
use App\Models\DetailPesanan;
use App\Models\BarangMasukAir;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PesanBahanBakuAir extends Component
{

    public $modal = false;
    public $kirim, $itemTab, $BB, $Additem, $kode_transaksi, $supplier_id;
    public $supplier, $sup_id, $no_telpon, $bahan, $harga, $keterangan, $jumlah, $tgl, $sub_total, $bahan_id, $KBM, $gambar;
    public $kodepesan, $IDtabOpen, $countTab, $jumlah_stock, $info, $Alert;
    public $itemID;

    public function mount()
    {
    }
    public function TabID($id)
    {
        $bahan_sp = BahanBakuAir::where('suppliers_id', $id)->get();
        $arr = [];
        for ($i = 0; $i < $bahan_sp->count(); $i++) {
            $arr[] = $bahan_sp[$i]['id'];
        }
        $this->IDtabOpen = true;
        $this->itemTab = $bahan_sp;
        // dd($bahan_sp);
        // dd($this->itemTab);
    }
    public function modalOpen()
    {
        $this->modal = true;
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
    public function closeModal()
    {
        $this->Additem = false;
        $this->modal = false;
        $this->Alert = false;
    }
    public function getSubTotal()
    {
        $this->sub_total = "Rp. " . number_format(intval($this->harga) * intval($this->jumlah), 0, 2);
    }

    public function kirim($id)
    {
        $this->validate([
            'keterangan' => 'required',
            'jumlah' => 'required|numeric'
        ]);
        $bahan_stock = BahanBakuAir::find($id);
        if ($this->jumlah > $bahan_stock->jumlah_stock) {
            $hasil =   $bahan_stock->jumlah_stock -$this->jumlah;
            session()->flash('message', 'Jumlah Stock Tidak Mencukupi Pada Supplier ' . $bahan_stock->supplier->supplier .', Jumlah Stock Yang Kurang = '. $hasil );
            $this->Alert = true;
            $this->Additem = false;
        } else {
            $data = [
                'supplier_id' => $this->supplier_id,
                'bahan' => $this->bahan_id,
                'payment' => $this->sup_id,
                'supplier_name' => $this->supplier,
                'supplier_phone' => $this->no_telpon,
                'jumlah_pembelian' => intval($this->jumlah),
                'harga' => intval($this->harga),
                'sub_total' => intval($this->harga) * intval($this->jumlah),
                'tgl_masuk' => $this->tgl,
                // 'transaksi_id' => $tr->id,
                'status' => 'Belum Selesai',
                'keterangan' => $this->keterangan,
            ];
            $txt = explode(" ", $this->keterangan);
            $str = '%20';
            $imp = implode($str, $txt);
            $text = "CV.%20THAHIRA%0AKami%20Ingin%20Melakukan%20Pesanan%0ABahan%20Baku%20" . $this->bahan . "%0AJumlah%20Pesanan%20%3D%20" . $this->jumlah . "%0AMohon%20Dikonfirmasi%0AKeterangan%20%3D%20%0A" . $imp . "%0A";
            $this->Additem = false;
            session()->put('image', $this->gambar);
            session()->put('bahan', $this->bahan);
            session()->put('data', $data);
            return redirect()->route('Metode-Pembayaran', ['table' => 'BarangMasukAir']);
        }
    }

    public function render()
    {
        $this->BB = BahanBakuAir::orderBy('suppliers_id', 'desc')->get();
        $supplier =Suppliers::whereExists(function ($query){
            $query->select(DB::raw('suppliers_id'))->from('bahan_baku_airs')->whereColumn('bahan_baku_airs.suppliers_id', 'suppliers.id');
       })->orderBy('id', 'desc')->get();
        // dd($supplier);
        return view('livewire.transaksi.pesan-bahan-baku-air', [
            'tbSupplier' => $supplier,
        ]);
    }
    public function ChatWa($ChatID)
    {
        $supplier = Suppliers::find($ChatID);
        // dd($supplier->user->phone);
        return redirect()->to("https://wa.me/" . $supplier->user->phone . "?text=");
    }
}
