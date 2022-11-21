<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use App\Models\Stock;
use App\Models\Bawaan;
use App\Models\Produk;
use Livewire\Component;
use App\Models\PesanCustomer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\StockBahanBakuAirMineral;
use Livewire\WithPagination;

class DashboardCustomer extends Component
{
    use WithPagination;
    public $alamat, $invalidBTN, $Alert;
    public $air1, $air2, $air3, $air4, $air5, $stockAirMineral_habis;
    public $invalidBTN1 = false;
    public $invalidBTN2 = false;
    public $invalidBTN3 = false;
    public $invalidBTN4 = false;
    public $invalidBTN5 = false;
    public $invalidBTN6 = false;
    public $invalidBTN7 = false;
    public $invalidBTN8 = false;
    public $invalidBTN9 = false;
    public $AddItem = false;
    public $tgl_pemesanan, $harga, $alamat_edit, $jumlah_pesanan = 0, $pelangganid;
    public $search = null;
    public $min_date, $max_date;
    public $row = 10;
    public $total_date_penjualan;
    public function render()
    {
        $total_penjualan = 0;
        $total_pembelian = PesanCustomer::sum("jumlah_pesanan");
        $pesan = PesanCustomer::where('customer_id', Auth::user()->customer->id)->paginate($this->row);

        // mengambil data pembelian
        if ($this->search != null) {
            $pesan = PesanCustomer::where('kode_pesan', 'like', '%' . $this->search . '%')
                ->Orwhere('kode_pesan', 'like', '%' . $this->search . '%')
                ->Orwhere('jumlah_pesanan', 'like', '%' . $this->search . '%')
                ->Orwhere('sub_total', 'like', '%' . $this->search . '%')
                ->paginate($this->row);
            $total_penjualan = $pesan->sum('sub_total');
        }
        if ($pesan != null) {
            $this->total_date_penjualan = $pesan->sum("sub_total");
        } else {
            $this->total_date_penjualan = 0;
        }
        $max = Produk::sum('jumlah_stock_produk') - intval($total_pembelian);
        // dd($max);
        $this->pelangganid = Auth::user()->customer->id;
        return view('livewire.user.dashboard-customer', ['max' => $max, 'pesan' => $pesan, 'total_penjualan' => $total_penjualan]);
    }
    public function Close()
    {
        $this->EditModal = false;
        $this->ItemDelete = false;
        $this->ItemDetail = false;
        $this->ItemEdit = false;
        $this->Alert = false;
    }
    public function autocode()
    {
        $validate =  $this->validate([
            'jumlah_pesanan' => 'required',
            'alamat' => 'required',
        ]);
        $this->Proses();
        // dd(
        //     $this->invalidBTN1,
        //     $this->invalidBTN2,
        //     $this->invalidBTN3,
        //     $this->invalidBTN4,
        //     $this->invalidBTN5,
        //     $this->invalidBTN6,
        //     $this->invalidBTN7,
        //     $this->invalidBTN8,
        //     $this->invalidBTN9,
        // );
        // dd([$this->invalidBTN, $this->invalidBTN2,$this->invalidBTN3,$this->invalidBTN4]);

        if ($this->invalidBTN2 == true && $this->invalidBTN5 == true && $this->invalidBTN6 == true && $this->invalidBTN7 == true && $this->invalidBTN8 == true && $this->invalidBTN9 == true) {
            $pesan = [
                'tgl_pemesanan' => Carbon::now()->format("Y-m-d"),
                'jumlah_pesanan' => $this->jumlah_pesanan,
                'customer_id' => $this->pelangganid,
                'sub_total' => intval($this->jumlah_pesanan * 12800),
                'alamat' => $this->alamat,
            ];
            session()->put('data', $pesan);
            return redirect()->route('Customer.Metde-Customer', ['table' => 'pesanCustomer']);
        } else {
            session()->flash('error', 'Gagal Ditambah. Bahan Baku Tidak Mencukupi');
        }
    }
    public function Proses()
    {
        $carbon = Carbon::now()->format('Y-m-d');
        // dd([$carbon, $this->produk_jadi]);
        $stock = Stock::all();
        // dd($stock);
        $df = Bawaan::all();
        $i = 0;
        $arr = [];
        for ($i; $i < $df->count(); $i++) {
            $arr[] = intval($df[$i]['bbs'] * $this->jumlah_pesanan) / $df[$i]['volume'];
        }
        $this->air1 = floor(5 * ($this->jumlah_pesanan / 5));
        $this->air2 = floor(5 * ($this->jumlah_pesanan / 5));
        $this->air3 = floor(5 * ($this->jumlah_pesanan / 5));
        $this->air4 = floor(9 * ($this->jumlah_pesanan / 9));
        $this->air5 = floor(1 * ($this->jumlah_pesanan / 1));
        // dd($stock);
        // menentukan Default value Atas Persediaan Barang;
        // menentukan default Mkasimal
        $this->DUS_dus = floor($arr[0]);
        $this->DUS_pipet = floor($arr[1]);
        $this->DUS_cup = floor($arr[2]);
        $this->DUS_penutup = floor($arr[3]);
        $stock1 =  Stock::where('id', 1)->where('jumlah_stock', '<', intval($this->DUS_dus))->get();
        if ($stock1->count() > 0) {
            session()->flash('error', "Maaf Bahan Baku Dus Tidak Mencukupi ");
            $this->invalidBTN1 = false;
        } else {
            $this->invalidBTN1 = true;
        }
        $stock2 =  Stock::where('id', 2)->where('jumlah_stock', '<', intval($this->DUS_pipet))->get();
        if ($stock2->count() > 0) {
            session()->flash('error', "Maaf Bahan Baku Pipet Tidak Mencukupi ");
            $this->invalidBTN2 = false;
        } else {
            $this->invalidBTN2 = true;
        }
        $stock3 =  Stock::where('id', 3)->where('jumlah_stock', '<', intval($this->DUS_cup))->get();
        if ($stock3->count() > 0) {
            session()->flash('error', "Maaf Bahan Baku Cup Tidak Mencukupi ");
            $this->invalidBTN3 = false;
        } else {
            $this->invalidBTN3 = true;
        }
        $stock4 =  Stock::where('id', 4)->where('jumlah_stock', '<', intval($this->DUS_penutup))->get();
        if ($stock4->count() > 0) {
            session()->flash('error', "Maaf Bahan Lid Cup/Penutup Tidak Mencukupi ");
            $this->invalidBTN4 = false;
        } else {
            $this->invalidBTN4 = true;
        }
        $stockAir1 =  StockBahanBakuAirMineral::where('id', 1)->where('jumlah_stock', '<', intval($this->air1))->get();
        if ($stockAir1->count() > 0) {
            session()->flash('error', "Maaf Bahan Baku Karbon AktifTidak Mencukupi ");
            $this->invalidBTN5 = false;
        } else {
            $this->invalidBTN5 = true;
        }
        $stockAir2 =  StockBahanBakuAirMineral::where('id', 2)->where('jumlah_stock', '<', intval($this->air2))->get();
        if ($stockAir2->count() > 0) {
            session()->flash('error', "Maaf Bahan Baku Pasir Aktif Tidak Mencukupi ");
            $this->invalidBTN6 = false;
        } else {
            $this->invalidBTN6 = true;
        }
        $stockAir3 =  StockBahanBakuAirMineral::where('id', 3)->where('jumlah_stock', '<', intval($this->air3))->get();
        if ($stockAir3->count() > 0) {
            session()->flash('error', "Maaf Bahan Baku Pasir Silica Tidak Mencukupi ");
            $this->invalidBTN7 = false;
        } else {
            $this->invalidBTN7 = true;
        }
        $stockAir4 =  StockBahanBakuAirMineral::where('id', 4)->where('jumlah_stock', '<', intval($this->air4))->get();
        if ($stockAir4->count() > 0) {
            session()->flash('error', "Maaf Bahan Magnesium Bubuk Tidak Mencukupi ");
            $this->invalidBTN8 = false;
        } else {
            $this->invalidBTN8 = true;
        }
        $stockAir5 =  StockBahanBakuAirMineral::where('id', 5)->where('jumlah_stock', '<', intval($this->air5))->get();
        if ($stockAir5->count() > 0) {
            session()->flash('error', "Maaf Bahan Post Carbon Filter Tidak Mencukupi ");
            $this->invalidBTN9 = false;
        } else {
            $this->invalidBTN9 = true;
        }
    }
    public $ItemDelete = false;
    public $ItemEdit = false;
    public $ItemDetail = false;
    public $kode, $sub_total, $status, $itemID;
    public function closeModal()
    {
        $this->ItemDelete = false;
        $this->ItemEdit = false;
        $this->ItemDetail = false;
    }
    public function deleteModal($id)
    {
        $pesan = PesanCustomer::find($id);
        $this->itemID = $pesan->id;
        $this->kode = $pesan->kode_pesan;
        $this->ItemDelete = true;
    }
    public function EditModal($id)
    {
        $pesan = PesanCustomer::find($id);
        $this->itemID = $pesan->id;
        $this->kode = $pesan->kode_pesan;
        $this->sub_total = $pesan->sub_total;
        $this->alamat = $pesan->alamat;
        $this->jumlah_pesanan = $pesan->jumlah_pesanan;
        $this->tgl_pemesanan = $pesan->tgl_pemesanan;


        $this->ItemEdit = true;
    }
    public function DetailModal($id)
    {
        $this->ItemDetail = true;
    }
    public function delete($id)
    {
        $p = PesanCustomer::find($id);
        Storage::delete('bukti', $p->transaksi->bukti_transaksi);
        $p->delete();
        $this->Close();
        session()->flash('error', "Data Pemesanan Barang Berhasil Dihapus");
    }

    public function edit($id)
    {
        $validate =  $this->validate([
            'alamat' => 'required',
            'jumlah_pesanan' => 'required|integer',
            'tgl_pemesanan' => 'required|date'
        ]);
        // dd($validate);
        try {
            PesanCustomer::find($id)->update([
                'tgl_pemesanan' => $this->tgl_pemesanan,
                'jumlah_pesanan' => $this->jumlah_pesanan,
                'alamat' => $this->alamat,
                'sub_total' => $this->sub_total = $this->jumlah_pesanan * 12800,
            ]);
            session()->flash('error', "Data Pemesanan Barang Berhasil Diperbarui");
            $this->Close();
        } catch (\Exception $msg) {
            session()->flash('error', "Data Pemesanan Barang GAGAL Di Edit = " . $msg->getMessage());
            $this->Close();
        }
    }
    public function getData($id)
    {
        $pesan = PesanCustomer::find($id);
        $this->jumlah_pesanan = $pesan->jumlah_pesanan;
        $this->tgl_pemesanan = $pesan->tgl_pemesanan;
        $this->alamat_edit = $pesan->alamat;
    }
    public function getSubTotal()
    {
        if ($this->jumlah_pesanan != null || $this->jumlah_pesanan != "") {
            $this->sub_total = "Rp. " . number_format($this->jumlah_pesanan * 12800, 0, 2);
        }
    }
    public $tgl_transaksi;
    public $ID_Transaksi, $bukti_transaksi;
    public $metode, $jumlah, $tgl, $customer, $kode_pesan;
    public function Detail($id)
    {
        $pesan = PesanCustomer::find($id);
        // dd($pesan->customer->customer);
        $this->kode_pesan = $pesan->kode_pesan;
        $this->bukti_transaksi = $pesan->transaksi->bukti_transaksi;
        $this->ID_Transaksi = $pesan->transaksi->kode_transaksi;
        $this->customer = $pesan->customer->customer;
        $this->jumlah = $pesan->jumlah_pesanan;
        $this->sub_total = $pesan->sub_total;
        $this->tgl = $pesan->tgl_masuk;
        $this->metode = $pesan->transaksi->metode;
        $this->tgl_transaksi = $pesan->transaksi->tgl_transaksi;
        $this->status = $pesan->status;

        $this->emit('openContactModal');
        $this->ItemDetail = true;
    }
}
