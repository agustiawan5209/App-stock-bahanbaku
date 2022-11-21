<?php

namespace App\Http\Livewire\Laporan;

use App\Models\Produk;
use Livewire\Component;
use Livewire\WithPagination;

class LaporanProduksiAirMineral extends Component
{
    use WithPagination;
    public $min_date, $max_date, $total_penjualan, $total_date_penjualan;
    public  $date, $datebarangAir, $datebarang;
    public $produk;
    public $search ="";
    public $cariTanggal = false;
    public $row = 10;
    public function mount()
    {
    }
    public function MinDate()
    {
        $this->validate([
            'min_date' => 'required|date',
            'max_date' => 'required|date',
        ]);
        $this->cariTanggal = true;
    }
    public function render()
    {
        $barang = Produk::paginate($this->row);
        $this->produk = Produk::all();
        $this->total_date_penjualan = $barang->sum('jumlah_stock_produk') * 12800;
        if ($this->cariTanggal == true) {
            if ($this->min_date != "" && $this->max_date != "") {
                $barang = Produk::whereBetween('tgl_stock_produk', [$this->min_date, $this->max_date])->paginate($this->row);
                $this->total_date_penjualan = $barang->sum('jumlah_stock_produk') * 12800;
                // dd($this->datebarang);
            }
        }
        if ($this->search != null) {
            $barang = Produk::where("kode_stock_produk", "like", '%' . $this->search . '%')
                ->orWhere("jumlah_stock_produk", "like", '%' . $this->search . '%')->paginate($this->row);
            $this->total_date_penjualan = $barang->sum('jumlah_stock_produk') * 12800;
            $this->date = false;
        }
        return view('livewire.laporan.laporan-produksi-air-mineral', [
            'barang' => $barang,
        ]);
    }
    public function Cetak()
    {
        if ($this->cariTanggal == false) {
            $barng = Produk::all();
            session()->put('jumlah_stock_produk', $barng->sum('jumlah_stock_produk') );
            session()->put('data', "All");
        }else if ($this->cariTanggal == true) {
            if ($this->min_date != "" && $this->max_date != "") {
                $barang = Produk::whereBetween('tgl_stock_produk', [$this->min_date, $this->max_date])->get();
                $this->total_date_penjualan = $barang->sum('jumlah_stock_produk');
                // dd($this->datebarang);
            }
            session()->put('min_date', $this->min_date);
            session()->put('max_date', $this->max_date);
            session()->put('jumlah_stock_produk', $this->total_date_penjualan);
            session()->put('data', "Tanggal");
        }

        return redirect()->route('Cetak-Produksi');
    }
}
