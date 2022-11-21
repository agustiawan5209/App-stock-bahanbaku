<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\BarangMasukAir;
use PDF;
use Carbon\Carbon;
use App\Models\Stock;
use App\Models\Produk;
use App\Models\Suppliers;
use Illuminate\Http\Request;
use App\Models\StockBahanBakuAirMineral;
use Illuminate\Contracts\Session\Session;

class DatatableController extends Controller
{
    public function Tgl()
    {
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $carbon =   date('Y-m-d');
        $explode = explode("-", $carbon);
        $bulan = [
            $explode[2],
            $months[(int) $explode[1]],
            $explode[0],
        ];
        $implode = implode(" ", $bulan);
        return $implode;
    }
    public function cetak_Stock()
    {
        $tgl = $this->Tgl();
        $bahanbakuair = Stock::all();
        $bahanbakupacking = StockBahanBakuAirMineral::all();

        $pdf = \PDF::loadview('PDF.Laporan-bahan-baku', ['stock' => $bahanbakuair, 'stockAir' => $bahanbakupacking, 'periode' => $this->tgl(), 'tglTTD' => $this->tgl()]);
        return $pdf->stream('laporan-bahan-baku-pdf.pdf');
    }
    public function cetak_Barang()
    {
        $data = session('data');
        $dataAir = session('dataAir');
        if($data = "All" && $dataAir == "All"){
            $data = BarangMasuk::all();
            $dataAir = BarangMasukAir::all();
        }
        $min_date = session('min_date');
        $max_date = session('max_date');
        if($min_date && $max_date){
           $data = BarangMasuk::whereBetween('tgl_masuk', [$min_date, $max_date])->get();
           $dataAir = BarangMasukAir::whereBetween('tgl_masuk', [$min_date, $max_date])->get();
        }
        // dd($data);
        $pdf = \PDF::loadview('PDF.Laporan-Pembelian', ['data' => $data, 'dataAir' => $dataAir, 'periode' => $this->tgl(), 'tglTTD' => $this->tgl(), 'min_date'=> $min_date, 'max_date'=> $max_date]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('laporan-bahan-baku-pdf.pdf');
    }
    public function cetak_Barang_keluar()
    {
        $barangkeluar = session('data');
        $min_date = session('min_date');
        $max_date = session('max_date');
        if ($barangkeluar == "All") {
            $barangkeluar = BarangKeluar::all();
            $total_date_penjualan = $barangkeluar->sum('sub_total');
        }
        if ($barangkeluar == "Tanggal") {
            $barangkeluar = BarangKeluar::whereBetween('tgl_keluar', [$min_date, $max_date])->get();
            $total_date_penjualan = $barangkeluar->sum('sub_total');
        }
        // dd($barangkeluar);
        $pdf = \PDF::loadview('PDF.laporan-penjualan', ['barangkeluar' => $barangkeluar, 'periode' => $this->tgl(), 'tglTTD' => $this->tgl(), 'sub_total' => $total_date_penjualan]);
        $pdf->setPaper('letter', 'landscape');
        return $pdf->stream('laporan-penjualan.pdf');
    }
    public function cetak_Produksi()
    {
        $data = session('data');
        if ($data == "All") {
            $barangkeluar = Produk::all();
        }
        $min_date = session('min_date');
        $max_date = session('max_date');
        if($data == "Tanggal"){
            $barangkeluar =Produk::whereBetween('tgl_stock_produk', [$min_date, $max_date])->get();
        }
        // dd($data);
        $pdf = \PDF::loadview('PDF.laporan-produksi', ['data' => $barangkeluar, 'periode' => $this->tgl(), 'tglTTD' => $this->tgl(), 'min_date' => $min_date, 'max_date' => $max_date]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('laporan-bahan-baku-pdf.pdf');
    }
    public function get()
    {
        return datatables()->of(Produk::query())->make(true);
    }
}
