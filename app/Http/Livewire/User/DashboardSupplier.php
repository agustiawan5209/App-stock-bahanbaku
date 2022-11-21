<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\BahanBaku;
use App\Models\Suppliers;
use App\Models\BarangMasuk;
use App\Models\BahanBakuAir;
use App\Models\BarangMasukAir;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardSupplier extends Component
{
    public $bahanbaku;
    public $notKonfirm;
    public $totalPenjualan;
    public function render()
    {
        $this->getCountBahanBaku();
        return view('livewire.user.dashboard-supplier');
    }
    /**
     * getCountBahanBaku
     * Menghitung Jumlah Bahan Baku Yang dimiliki SUpplier
     * // Bahan Baku Yang belum  Di Konfirmasi SUpplier
     * // Menghitung Total Penjualan
     * @return param
     */
    public function getCountBahanBaku()
    {
        $bahan =    BahanBaku::where('suppliers_id', Auth::user()->supplier->id)->get();
        $bahanAir = BahanBakuAir::where('suppliers_id', Auth::user()->supplier->id)->get();
        $this->bahanbaku = $bahanAir->count() + $bahan->count();

        // Bahan Baku Yang belum  Di Konfirmasi SUpplier
        $bahanpacking = BarangMasuk::where('status', 'Belum Konfirmasi')->where('supplier_id', Auth::user()->supplier->id)->get();
        $bahanair = BarangMasukAir::where('status', 'Belum Konfirmasi')->where('supplier_id', Auth::user()->supplier->id)->get();
        $this->notKonfirm = $bahanpacking->count() +$bahanair->count();

        // Menghitung Total Penjualan
        $bahanpacking = BarangMasuk::where('status', 'Konfirmasi')->where('status', 'Belum Konfirmasi')->where('supplier_id', Auth::user()->supplier->id)->get();
        $bahanair = BarangMasukAir::where('status', 'Konfirmasi')->where('status', 'Belum Konfirmasi')->where('supplier_id', Auth::user()->supplier->id)->get();
        $this->totalPenjualan = $bahanpacking->count() +$bahanair->count();
    }
}
