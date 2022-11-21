<?php

namespace App\Http\Livewire\User\Supplier;

use App\Models\Bawaan;
use Livewire\Component;
use App\Models\BahanBaku;
use App\Models\BahanBakuAir;
use App\Models\Suppliers;
use App\Models\BarangMasuk;
use App\Models\BarangMasukAir;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class PemesananSupplier extends Component
{
    use WithPagination;
    public  $DetailItem = false;
    public $min_date, $max_date, $total_penjualan, $total_date_penjualan;
    public  $date, $datebarangAir, $datebarang;
    public $sup, $bb, $itemID;
    public $supplier, $harga, $jumlah, $KBM, $sub_total, $tgl, $bahan, $userSaved, $getBB;
    public $search = "", $row = 10, $statusSelect = "", $statusModal = false, $CariTanggal = false;
    public function MinDate()
    {
        $this->CariTanggal = false;
    }
    public function render()
    {
        $barang = BarangMasuk::orderBy('id', 'desc')->where('supplier_id', Auth::user()->supplier->id)
            ->paginate($this->row);
        $barangAir = BarangMasukAir::orderBy('id', 'desc')->where('supplier_id', Auth::user()->supplier->id)
            ->paginate($this->row);
        if ($this->search != null) {
            $barang = BarangMasuk::orderBy('id', 'desc')->where('supplier_id', Auth::user()->supplier->id)
                ->where('kode_barang_masuk', 'like', '%' . $this->search . '%')
                ->orWhere('jumlah_pembelian',  'like', '%' . $this->search . '%')
                ->orWhere('harga',  'like', '%' . $this->search . '%')
                ->orWhereHas('supplier', function ($query) {
                    $query->where('id', Auth::user()->supplier->id)->where('supplier',  'like', '%' . $this->search . '%');
                })
                ->paginate($this->row);
            $barangAir = BarangMasukAir::orderBy('id', 'desc')->where('supplier_id', Auth::user()->supplier->id)
                ->where('kode_barang_masuk', 'like', '%' . $this->search . '%')
                ->orWhere('jumlah_pembelian',  'like', '%' . $this->search . '%')
                ->orWhere('harga',  'like', '%' . $this->search . '%')
                ->orWhereHas('supplier', function ($query) {
                    $query->where('id', Auth::user()->supplier->id)->where('supplier',  'like', '%' . $this->search . '%');
                })
                ->paginate($this->row);
        }
        if ($this->CariTanggal == true) {
            if ($this->min_date != "" && $this->max_date != "") {
                $barang = BarangMasuk::orderBy('id', 'desc')->where('supplier_id', Auth::user()->supplier->id)->whereBetween('tgl_masuk', [$this->min_date, $this->max_date])->paginate($this->row);
                // $this->total_date_penjualan = $barang->sum('jumlah_pembelian');
                $barangAir = BarangMasuk::orderBy('id', 'desc')->where('supplier_id', Auth::user()->supplier->id)->whereBetween('tgl_masuk', [$this->min_date, $this->max_date])->paginate($this->row);
                $this->total_date_penjualan = $barangAir->sum('sub_total') + $barang->sum('sub_total');
            }
        }
        if ($barang != null || $barangAir != null) {
            $this->total_date_penjualan = $barang->sum('sub_total') + $barangAir->sum('sub_total');
        } else {
            $this->total_date_penjualan = 0;
        }
        if ($this->statusSelect != null) {
            $barang = Barangmasuk::orderBy('id', 'desc')->where('supplier_id', Auth::user()->supplier->id)->where('status', '=', $this->statusSelect)->paginate($this->row);
            $barangAir = BarangmasukAir::orderBy('id', 'desc')->where('supplier_id', Auth::user()->supplier->id)->where('status', '=', $this->statusSelect)->paginate($this->row);
        }
        return view('livewire.user.supplier.pemesanan-supplier', [
            'barang' => $barang,
            'barangAir' => $barangAir
        ]);
    }
    public function Detail($id)
    {
        $barangmasuk = BarangMasuk::find($id);
        $this->bukti_transaksi = $barangmasuk->transaksi->bukti_transaksi;
        $this->ID_Transaksi = $barangmasuk->transaksi->kode_transaksi;
        $this->KBM = $barangmasuk->kode_barang_masuk;
        $this->bahan = $barangmasuk->default_stock->bahan_baku;
        $this->supplier = $barangmasuk->supplier->supplier;
        $this->jumlah = $barangmasuk->jumlah_pembelian;
        $this->sub_total = $barangmasuk->sub_total;
        $this->tgl = $barangmasuk->tgl_masuk;
        $this->metode = $barangmasuk->transaksi->metode;
        $this->tgl_transaksi = $barangmasuk->transaksi->tgl_transaksi;
        $this->satuan = $barangmasuk->bahan_baku->satuan;
        $this->status = $barangmasuk->status;

        $this->emit('openContactModal');
        $this->DetailItem = true;
    }
    public $status;
    public function DetailAir($id)
    {
        $barangmasuk = BarangMasukAir::find($id);
        $this->bukti_transaksi = $barangmasuk->transaksi->bukti_transaksi;
        $this->ID_Transaksi = $barangmasuk->transaksi->kode_transaksi;
        $this->KBM = $barangmasuk->kode_barang_masuk;
        $this->bahan = $barangmasuk->default_bahan_air->bahan_baku;
        $this->supplier = $barangmasuk->supplier->supplier;
        $this->jumlah = $barangmasuk->jumlah_pembelian;
        $this->sub_total = $barangmasuk->sub_total;
        $this->tgl = $barangmasuk->tgl_masuk;
        $this->metode = $barangmasuk->transaksi->metode;
        $this->tgl_transaksi = $barangmasuk->transaksi->tgl_transaksi;
        $this->satuan = $barangmasuk->bahan_baku_air->satuan;
        $this->status = $barangmasuk->status;

        $this->emit('openContactModal');
        $this->DetailItem = true;
    }
    public function closeModal()
    {
        $this->DetailItem = false;
        $this->statusModal = false;
        $this->CariTanggal = false;
    }
    public $image, $kode;
    public function ChangeToKonfirmasi($id)
    {
        BarangMasuk::where('id', $id)->update(['status' => 'Konfirmasi']);
        $bM = BarangMasuk::find($id);
        $dd_id = $bM->default_stock->id;
        // Mengupdate Tabel Bahan Baku Yang Memiliki Relasi  Dengan Barang Masuk
        $cek = BahanBaku::whereHas('barang_masuk', function ($query) use ($id) {
            $query->where('id', ''.$id.'');
        })->get();
        if ($cek) {
            $hasil = 0;
            $stock_awal = 0;
            foreach ($cek as $key => $value) {
                $stock_awal = $value->jumlah_stock;
                $hasil = $value->jumlah_stock - $bM->jumlah_pembelian;
            }
            // dd($hasil);
            $bb = BahanBaku::whereHas('barang_masuk', function (Builder $query) use ($id, $hasil) {
                $query->where('id', $id);
            })->update(['jumlah_stock' => $hasil]);
            session()->flash('message', "Informasi Pemesanan Berhasil Diubah. Pengurangan Jumlah Stock Dari = " . $stock_awal . " , Menjadi = " . $hasil);
        }
        //  End
        $this->closeModal();
    }
    public function ChangeToKonfirmasiAir($id)
    {
        BarangMasukAir::where('id', $id)->update(['status' => 'Konfirmasi']);
        $bM = BarangMasukAir::find($id);
        // Mengupdate Tabel Bahan Baku Air Yang Memiliki Relasi  Dengan Barang Masuk Air
        $cek = BahanBakuAir::whereHas('barang_masuk_air', function ($query) use ($id) {
            $query->where('id', ''.$id.'');
        })->get();
        if ($cek) {
            $hasil = 0;
            $stock_awal = 0;
            foreach ($cek as $key => $value) {
                $stock_awal = $value->jumlah_stock;
                $hasil = $value->jumlah_stock - $bM->jumlah_pembelian;
            }
            BahanBakuAir::whereHas('barang_masuk_air', function ($query) use ($id, $hasil) {
                $query->where('id', ''.$id.'');
            })->update(['jumlah_stock' => $hasil]);
            session()->flash('message', "Informasi Pemesanan Berhasil Diubah. Pengurangan Jumlah Stock Dari = " . $stock_awal . " , Menjadi = " . $hasil);
        }
        //  End
        // session()->flash('message', "Informasi Pemesanan Berhasil Diubah");
        $this->closeModal();
    }
    public $table;
    public function Status($id)
    {
        $barangmasuk = BarangMasuk::find($id);
        $this->status = $barangmasuk->status;
        $this->table = "BarangMasuk";
        $this->itemID = $barangmasuk->id;
        $this->kode = $barangmasuk->kode_barang_masuk;
        $this->statusModal = true;
        // dd($barangmasuk);
    }
    public function StatusAir($id)
    {
        $barangmasuk = BarangMasukAir::find($id);
        $this->status = $barangmasuk->status;
        $this->table = "BarangMasukAir";
        $this->itemID = $barangmasuk->id;
        $this->kode = $barangmasuk->kode_barang_masuk;
        $this->statusModal = true;
    }
}
