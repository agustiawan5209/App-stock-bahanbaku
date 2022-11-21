<?php

namespace App\Http\Livewire\Laporan;

use App\Models\BarangKeluar;
use Livewire\Component;
use Livewire\WithPagination;

class LaporanPenjualanAirMineral extends Component
{
    use WithPagination;
    public $min_date, $max_date, $total_penjualan, $total_date_penjualan;
    public  $date, $datebarangAir, $datebarang;
    public $barangAir, $barang;
    public $row = 10;
    public $cariTanggal = false;
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
        $barangkeluar = BarangKeluar::paginate($this->row);
        $this->total_date_penjualan = BarangKeluar::sum('sub_total');
        if ($this->cariTanggal == true) {
            if ($this->min_date != "" && $this->max_date != "") {
                $barangkeluar = BarangKeluar::whereBetween('tgl_keluar', [$this->min_date, $this->max_date])->paginate($this->row);
                $this->total_date_penjualan = $barangkeluar->sum('sub_total');
            }
        }
        return view('livewire.laporan.laporan-penjualan-air-mineral', [
            'barangKeluar' => $barangkeluar,
        ]);
    }
    public function Cetak()
    {
        if ($this->cariTanggal == false) {
            $barang = BarangKeluar::all();
            session()->put('sub_total', $barang->sum('sub_total'));
            session()->put('data', "All");
            return redirect()->route('Cetak-Barang-keluar');
        } else if ($this->cariTanggal == true) {
            session()->put('sub_total', $this->total_date_penjualan);
            session()->put('min_date', $this->min_date);
            session()->put('max_date', $this->max_date);
            session()->put('data', "Tanggal");
            return redirect()->route('Cetak-Barang-keluar');
        }
    }
}
