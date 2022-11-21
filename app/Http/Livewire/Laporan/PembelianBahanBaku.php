<?php

namespace App\Http\Livewire\Laporan;

use App\Models\Bawaan;
use Livewire\Component;
use App\Models\Suppliers;
use App\Models\BarangMasuk;
use App\Models\BarangMasukAir;

class PembelianBahanBaku extends Component
{
    public $barangmasuk,$barangmasukair, $date, $dateair;
    public $min_date, $max_date, $total_penjualan, $total_date_penjualan;

    public function MinDate()
    {
        $this->validate([
            'min_date'=> 'required|date',
            'max_date'=> 'required|date',
        ]);
        if ($this->min_date != "" && $this->max_date != "") {
            $this->date = BarangMasuk::whereBetween('tgl_masuk', [$this->min_date, $this->max_date])->get();
            $this->dateair = BarangMasuk::whereBetween('tgl_masuk', [$this->min_date, $this->max_date])->get();
            $this->total_date_penjualan = ($this->date->sum('sub_total')) + ($this->dateair->sum('sub_total'));
            // dd($this->total_date_penjualan);
        } else {
            // dd("hahaha");
        }
    }
    public function render()
    {
        $this->sup = Suppliers::all();
        $this->bb = Bawaan::all();
        $this->barangmasuk = BarangMasuk::all();
        $this->barangmasukair = BarangMasukAir::all();
        if($this->barangmasuk !=null && $this->barangmasukair != null){
            $this->total_penjualan = ($this->barangmasuk->sum('sub_total')) + ($this->barangmasukair->sum('sub_total'));
        }else{
            $this->total_penjualan = 0;
        }
        return view('livewire.laporan.pembelian-bahan-baku');
    }
}
