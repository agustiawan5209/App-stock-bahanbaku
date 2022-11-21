<?php

namespace App\Http\Livewire\User;

use App\Models\BarangKeluar;
use Carbon\Carbon;
use App\Models\Stock;
use App\Models\Produk;
use Livewire\Component;
use App\Models\Persediaan;
use App\Models\BarangMasuk;
use App\Models\BarangMasukAir;
use App\Models\PesanCustomer;
use App\Models\StockBahanBakuAirMineral;

class DashboardAdmin extends Component
{

    public $day;
    public $model = 'produks';
    public $stock_hari_ini, $stock_habis, $stock_habis50, $stock_tersedia, $hitung_stock, $persediaan_stock;
    public $cek_habis =  false;
    public $cekModal = false, $cek_habis50 = false, $cek_habis_air = false, $cek_habis50_air = false, $stock_habis_air, $stock_habis50_air;
    private function day($hari)
    {
        switch ($hari) {
            case 'sunday' || 'Sunday':
                $this->day = 'Minggu';
                break;

            case 'Monday' || 'monday':
                $this->day = 'Senin';
                break;

            case 'tuesday' || 'Tuesday':
                $this->day = 'Selasa';
                break;

            case 'Wednesday' || 'wednesday':
                $this->day = 'Rabu';
                break;

            case 'Thursday' || 'thursday':
                $this->day = 'Kamis';
                break;

            case 'Friday' || 'friday':
                $this->day = 'Jumat';
                break;

            case 'Saturday' || 'saturday':
                $this->day = 'Sabtu';
                break;
        }
        return $this->day;
    }

    public function render()
    {
        $hari = Carbon::now()->format('Y M d');
        $carbon = Carbon::now();
        $stock_produk = Produk::where('tgl_stock_produk', $carbon->format('Y-m-d'))->sum('jumlah_stock_produk');
        // foreach ($stock_produk as $sp) {
        $this->stock_hari_ini =  $stock_produk;
        // }
        $carbon = Carbon::now();
        $bulan_ini = Produk::whereMonth('tgl_stock_produk', '=', $carbon->format('m'))
            ->whereYear('tgl_stock_produk', '=', $carbon->format('Y'))
            ->get();

        // Tampilkan stock Bahan Baku
        $stock = Stock::all();
        // Pesan
        $pesan = BarangMasuk::where('status', 'like',  '%Belum Konfirmasi%')->get();
        $pesanAir = BarangMasukAir::where('status', 'like',  '%Belum Konfirmasi%')->get();

        $label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        // Cek Persediaan Barang
        $persediaan = Persediaan::all();
        $this->hitung_stock = $persediaan->count();
        $arrP = $persediaan->toArray();
        $arrS = $stock->toArray();
        for ($i = 0; $i <  $stock->count(); $i++) {
            if (100 > $arrS[$i]['jumlah_stock']) {
                // $this->stock_habis = 'Stock Habis';
                $this->cek_habis = true;
                $this->cek_habis50 = true;
            } else {
                $this->stock_tersedia = 'Tersedia';
            }
        }
        // Pembelian Air Dan Pembelian BahanBakuPackaging
        $pembelianAir = BarangMasukAir::whereMonth('tgl_masuk', $carbon->format('m'))
            ->whereYear('tgl_masuk', $carbon->format('Y'))
            // ->where('status', 'Konfirmasi')
            ->get();
        $pembelianPackaging = BarangMasuk::whereMonth('tgl_masuk', $carbon->format('m'))
            ->whereYear('tgl_masuk', $carbon->format('Y'))
            // ->where('status', 'Konfirmasi')
            ->get();
        $pembelian = $pembelianAir->count() + $pembelianPackaging->count();
        // Jika Ada Stock Produk Yang Kurang Dari 50;
        if ($this->cek_habis = true) {
            $cek0 = Stock::where('jumlah_stock', '<', 50)->get();
            if (!empty($cek0)) {
                $cekStock0 = Stock::where('jumlah_stock', '<=', 0)->get();
                $cekStock50 = Stock::whereBetween('jumlah_stock',  [1, 101])->get();
                if ($cekStock0->count() > 0) {
                    $this->stock_habis = $cekStock0;
                    session()->flash('message', 'STOCK HABIS');
                    // dd($this->stock_habis);
                }
                if ($cekStock50->count() > 0) {
                    $this->stock_habis50 = $cekStock50;
                    session()->flash('message2', 'HAMPIR HABIS');
                }
            }
            $this->cekModal = true;
        }
        // if ($this->cek_habis = true) {
        $cek0 = StockBahanBakuAirMineral::where('jumlah_stock', '<', 50)->get();
        if (!empty($cek0)) {
            $cekStock0 = StockBahanBakuAirMineral::where('jumlah_stock', '<=', 0)->get();
            $cekStock50 = StockBahanBakuAirMineral::whereBetween('jumlah_stock',  [1, 101])->get();
            if ($cekStock0->count() > 0) {
                $this->stock_habis_air = $cekStock0;
                session()->flash('message', 'STOCK HABIS');
                // dd($this->stock_habis);
            }
            if ($cekStock50->count() > 0) {
                $this->stock_habis50_air = $cekStock50;
                session()->flash('message2', 'HAMPIR HABIS');
            }
            $this->cekModal = true;
            // }
        }
        $totalPelanggan = PesanCustomer::whereMonth('tgl_pemesanan', $carbon->format('m'))
            ->whereYear('tgl_pemesanan', $carbon->format('Y'))
            ->get();
        if ($totalPelanggan == null) {
            $totalPelanggan = 0;
        }
        $barangkeluar = BarangKeluar::whereMonth('tgl_keluar', $carbon->format('m'))
        ->whereYear('tgl_keluar', $carbon->format('Y'))
        ->sum('jumlah');
        // end
        return view('livewire.user.dashboard-admin', [
            'stock_produk' => $stock_produk,
            'bulan_ini' => $bulan_ini->count(),
            'label' => $label,
            'pesan' => $pesan->count() + $pesanAir->count(),
            'stock' => Stock::all(),
            'stockAir' => StockBahanBakuAirMineral::all(),
            'pembelian' => $pembelian,
            'totalpelanggan' => $totalPelanggan->count(),
            'hari' => $hari,
            'total_produksi'=> Produk::sum('jumlah_stock_produk') - PesanCustomer::sum('jumlah_pesanan'),
            'total_penjualan' => $barangkeluar,
        ]);
    }
    public function closeid()
    {
        $this->cekModal = false;
    }
}
