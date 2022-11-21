<?php

namespace App\Http\Livewire\Transaksi;

use Carbon\Carbon;
use App\Models\Stock;
use Livewire\Component;
use App\Models\BahanBaku;
use App\Models\Suppliers;
use App\Models\Transaksi;
use App\Models\BarangMasuk;
use App\Models\Bawaan;
use Livewire\WithPagination;

class PageBarangMasuk extends Component
{
    use WithPagination;
    public $EditItem = false, $deleteItem = false, $DetailItem = false;
    public $addItem = false;
    public $sup, $bb, $itemID;
    public $supplier, $harga, $jumlah, $KBM, $sub_total, $tgl, $bahan, $userSaved, $getBB;
    public  $date;
    public $min_date, $max_date, $total_penjualan, $total_date_penjualan;
    public $row = 10, $search = "", $CariTanggal = false, $statusSelect = "";
    protected $queryString = ['search' => ['except' => '']];
    public function MinDate()
    {
        $this->validate([
            'min_date' => 'required|date',
            'max_date' => 'required|date',
        ]);
        $this->CariTanggal = true;
    }
    public function render()
    {
        $this->sup = Suppliers::all();
        $this->bb = Bawaan::all();
        $barangmasuk = BarangMasuk::orderBy('id', 'desc')->paginate($this->row);
        if ($barangmasuk == null) {
            $this->total_penjualan = 0;
        } else {
            $this->total_penjualan = $barangmasuk->sum('sub_total');
        }
        if ($this->search != null) {
            $barangmasuk = BarangMasuk::orderBy('id', 'desc')->where('kode_barang_masuk', 'like', '%' . $this->search . '%')
                ->orWhere('jumlah_pembelian', 'like', '%' . $this->search . '%')
                ->orWhere('harga', 'like', '%' . $this->search . '%')
                ->orWhere('sub_total', 'like', '%' . $this->search . '%')
                ->orWhereHas('default_stock', function ($query) {
                    $query->where('bahan_baku', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('supplier', function ($query) {
                    $query->where('supplier', 'like', '%' . $this->search . '%');
                })
                ->orderBy('id', 'desc')->latest()
                ->paginate($this->row);
        }
        if ($this->CariTanggal == true) {
            if ($this->min_date != "" && $this->max_date != "") {
                $barangmasuk = BarangMasuk::orderBy('id', 'desc')->whereBetween('tgl_masuk', [$this->min_date, $this->max_date])->paginate($this->row);
                $this->total_date_penjualan = $barangmasuk->sum('jumlah_pembelian');
            }
        }
        if ($this->statusSelect != null) {
            $barangmasuk = Barangmasuk::orderBy('id', 'desc')->where('status', '=', $this->statusSelect)->paginate($this->row);
        }
        return view('livewire.transaksi.page-barang-masuk', [
            'barangmasuk' => $barangmasuk,
        ]);
    }
    // Crud
    // delete


    public $confirmingUserChange = false;
    public $userDeleted = false;
    public function OpenModal()
    {
        $this->confirmingUserChange = true;
    }
    public function deleteModal($id)
    {
        $barangmasuk = BarangMasuk::find($id);
        $this->KBM = $barangmasuk->kode_barang_masuk;
        $this->bahan = $barangmasuk->bahan;
        $this->itemID = $barangmasuk->id;
        $this->deleteItem = true;
    }

    public function Delete($id)
    {
        $barangmasuk = BarangMasuk::find($id);
        // unlink("bukti/".$barangmasuk->transaksi->bukti_transaksi);
        if ($barangmasuk->status == "Selesai") {
            $this->ChangeNot($id);
        }
        $barangmasuk->delete();

        $this->deleteItem = false;
        session()->flash("message", 'Berhasil Di Hapus');
    }
    public function OpenCRUD()
    {
        $this->EditItem = true;
    }
    public function closeModal()
    {
        $this->EditItem = false;
        $this->deleteItem = false;
        $this->DetailItem = false;
        $this->statusModal = false;
    }
    public $tgl_transaksi;
    public $ID_Transaksi, $bukti_transaksi;
    public $metode, $satuan, $status;
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
    /**
     * Status
     *
     * @param  mixed $id
     * @return void
     *  Melakukan Perubahan Pada Status Pemesanan Barang masuk
     */
    public $statusModal = false;
    public function Status($id)
    {
        $barangmasuk = BarangMasuk::find($id);
        $this->status = $barangmasuk->status;
        $this->itemID = $barangmasuk->id;
        $this->bahan = $barangmasuk->default_stock->bahan_baku;
        $this->statusModal = true;
    }
    public function ChangeNot($id)
    {
        BarangMasuk::where('id', $id)->update(['status' => 'Belum Konfirmasi']);
        $bM = BarangMasuk::find($id);
        $isi = $bM->bahan_baku->isi;
        if ($bM) {
            $stock = Stock::select('jumlah_stock')
                ->where('bawaan_id', $bM->bahan)
                ->get();
            foreach ($stock as $a) {
                $hasil = intval($a->jumlah_stock) + (intval($bM->jumlah_pembelian) * intval($isi));
            }
            // dd($hasil);
            Stock::where('bawaan_id', $bM->bahan)
                ->update(['jumlah_stock' => $hasil]);
        }
        session()->flash('message', "Informasi Pemesanan Berhasil Diubah");
        $this->statusModal = false;
        $this->confirmingUserChange = false;
    }
    public function ChangeYes($id)
    {
        BarangMasuk::where('id', $id)->update(['status' => 'Selesai']);
        $bM = BarangMasuk::find($id);
        $isi = $bM->bahan_baku->isi;
        // dd($isi);
        if ($bM) {
            $stock = Stock::select('jumlah_stock')
                ->where('bawaan_id', $bM->bahan)
                ->get();
            foreach ($stock as $a) {
                $hasil = intval($a->jumlah_stock) + (intval($bM->jumlah_pembelian) * intval($isi));
                // dd($hasil);
            }
            try {
                Stock::where('bawaan_id', $bM->bahan)
                    ->update(['jumlah_stock' => $hasil]);
            } catch (\Exception $th) {
                session()->flash('message', "Informasi " . $th->getMessage());
            }
        }
        session()->flash('message', "Informasi Pemesanan Berhasil Diubah");
        $this->statusModal = false;
        $this->confirmingUserChange = false;
    }
}
