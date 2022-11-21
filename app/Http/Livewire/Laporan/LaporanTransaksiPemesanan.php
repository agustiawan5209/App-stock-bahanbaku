<?php

namespace App\Http\Livewire\Laporan;

use App\Models\Produk;
use Livewire\Component;
use App\Models\BarangMasuk;
use App\Models\BarangMasukAir;

class LaporanTransaksiPemesanan extends Component
{
    public $min_date, $max_date, $total_penjualan, $total_date_penjualan;
    public  $date, $datebarangAir, $datebarang;
    public $barangAir, $barang;
    public function mount()
    {
    }
    public function MinDate()
    {
        $this->validate([
            'min_date'=> 'required|date',
            'max_date'=> 'required|date',
        ]);
        if ($this->min_date != "" && $this->max_date != "") {
            $this->datebarang = BarangMasuk::whereBetween('tgl_masuk', [$this->min_date, $this->max_date])->get();
            $this->datebarangAir = BarangMasukAir::whereBetween('tgl_masuk', [$this->min_date, $this->max_date])->get();
            $this->date = $this->datebarang->sum('sub_total') + $this->datebarangAir->sum('sub_total');
            $this->total_date_penjualan =$this->datebarang->sum('sub_total') + $this->datebarangAir->sum('sub_total');
            // dd($this->total_date_penjualan);
        } else {
            // dd("hahaha");
        }
    }
    public function render()
    {
        $this->barang = BarangMasuk::all();
        $this->barangAir = BarangMasukAir::all();
        if($this->barang != null && $this->barangAir != null){
            $this->total_penjualan = $this->barang->sum('sub_total') + $this->barangAir->sum('sub_total');
        }else{
            $this->total_penjualan = 0;
        }
        return view('livewire.laporan.laporan-transaksi-pemesanan');
    }
    public function Cetak()
    {
        if ($this->date == null) {
            $rows = [];
            $barng = $this->barang;
            foreach ($barng as $val => $row) {
                $rows[] = $row;
            }
            $rowsAir = [];
            $barangair = $this->barangAir;
            foreach ($barangair as $val => $row) {
                $rowsAir[] = $row;
            }
            session()->put('sub_total', $barng->sum('sub_total') + $barangair->sum('sub_total'));
            session()->put('data', "All");
            session()->put('dataAir', "All");
        } else {
            session()->put('sub_total', $this->total_date_penjualan);
            session()->put('min_date', $this->min_date);
            session()->put('max_date', $this->max_date);

        }

        return redirect()->route('Cetak-Barang');
    }
}
