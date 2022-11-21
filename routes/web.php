<?php

use App\Models\Stock;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditController;
use App\Http\Controllers\UserController;
use App\Models\StockBahanBakuAirMineral;
use App\Http\Livewire\Master\PageCustomer;
use App\Http\Livewire\Master\PageSupplier;
use App\Http\Livewire\Master\StockBahanAir;
use App\Http\Controllers\DatatableController;
use App\Http\Livewire\Master\PageStockBaarang;
use App\Http\Livewire\User\Metode\MetodeTable;
use App\Http\Livewire\Master\InputBahanBakuJadi;
use App\Http\Livewire\Master\PageStockBahanBaku;
use App\Http\Livewire\Transaksi\PageBarangMasuk;
use App\Http\Livewire\Laporan\PembelianBahanBaku;
use App\Http\Livewire\Transaksi\MetodePembayaran;
use App\Http\Livewire\Transaksi\PageBarangKeluar;
use App\Http\Livewire\Transaksi\PesanBahanBakuAir;
use App\Http\Livewire\Laporan\LaporanDataBahanBaku;
// use App\Http\Livewire\Transaksi\PagePesanBahanBaku;
use App\Http\Livewire\Transaki\PagePesananCustomer;
use App\Http\Livewire\Transaksi\PageBarangMasukAir;
use App\Http\Livewire\Transaksi\PagePemesesananBarang;
use App\Http\Livewire\Transaksi\PesanBahanBakuPacking;
use App\Http\Livewire\User\Supplier\PemesananSupplier;
use App\Http\Livewire\Laporan\LaporanProduksiAirMineral;
use App\Http\Livewire\Laporan\LaporanTransaksiPemesanan;
use App\Http\Livewire\Laporan\LaporanPenjualanAirMineral;
use App\Http\Livewire\User\Customer\MetodePembayaranCustomer;
use App\Http\Livewire\User\DashboardCustomer;
use App\Http\Livewire\User\Supplier\Inputpage;
use App\Models\BahanBaku;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $StockPacking = Stock::all();
    $StockAir = StockBahanBakuAirMineral::all();
    // dd($StockPacking);
    return view('welcome', ['StockPacking' => $StockPacking, 'StockAir' => $StockAir]);
})->name('welcome');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/datatable', 'DatatableController@get')->name('get');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' =>  'role:Admin', 'prefix' => 'Admin', 'as' => 'Admin.'], function () {
        Route::get('/Admin/Master/Produk', PageStockBaarang::class)->name('nav.Barang');
        Route::get('/Admin/Master/Supplier', PageSupplier::class)->name('nav.Supplier');
        Route::get('/Admin/Master/Customer', PageCustomer::class)->name('nav.Customer');

        // Stock
        Route::get('/Stock/Bahan-Air', StockBahanAir::class)->name('nav.Stock.Bahan-air');
        Route::get('/Stock/Stock-Bahan-Baku', PageStockBahanBaku::class)->name('nav.Bahan-Baku');

        // Route Transaksi
        Route::get('/Transaksi/Barang-Masuk-Packing', PageBarangMasuk::class)->name('nav.BarangMasukPacking');
        Route::get('/Transaksi/Barang-Masuk-Air', PageBarangMasukAir::class)->name('nav.BarangMasukAir');
        Route::get('/Transaksi/Barang-Keluar', PageBarangKeluar::class)->name('nav.BarangKeluar');
        Route::get('/Transaksi/Pemesanan-Barang', PagePemesesananBarang::class)->name('nav.Pemesanan Barang');
        Route::get("/Konfirmasi", PagePesananCustomer::class)->name('PesananCustomer');

        // Route  Navigation Laporan
        Route::get('/Laporan/Data-Bahan-Baku', LaporanDataBahanBaku::class)->name('Nav.LaporanDataBahanBaku');
        Route::get('/Laporan/Data-Penjualan-Air-Mineral', LaporanPenjualanAirMineral::class)->name('Nav.LaporanenjualanAirMineral');
        Route::get('/Laporan/Data-Produksi-Air-Mineral', LaporanProduksiAirMineral::class)->name('Nav.LaporanProduksiAirMineral');
        Route::get('/Laporan/Data-Transaksi-Pemesanan', LaporanTransaksiPemesanan::class)->name('Nav.LaporanTransaksiPemesanan');
        Route::get('/Laporan/Data-Pembelian', LaporanTransaksiPemesanan::class)->name('Nav.LaporanPembelianBahanBaku');

        // Pesan
        Route::get('/Pesan/Bahan-Baku-Packing', PesanBahanBakuPacking::class)->name('pesan.packing');
        Route::get('/Pesan/Bahan-Baku-Air', PesanBahanBakuAir::class)->name('pesan.Air');

        // Input Bahan Baku Jadi
        Route::get("/Input/Bahan-jadi", InputBahanBakuJadi::class)->name('Nav.Input-Bahan-baku-jadi');

        //
    });
    Route::group(['middleware' =>  'role:Supplier', 'prefix' => 'Supplier', 'as' => 'Supplier.'], function () {
        Route::get('/Input/Bahan/Baku', Inputpage::class)->name('Input-Bahan-Baku');
        Route::get('/Pemesanan/Bahan-Baku', PemesananSupplier::class)->name('Pemesanan-Supplier');
    });
    Route::group(['middleware' =>  'role:Customer', 'prefix' => 'Customer', 'as' => 'Customer.'], function () {
        Route::get('/Pemesanan Barang', DashboardCustomer::class)->name('Dashboard-customer');
        Route::get('/metode-Pembayran/{table}', MetodePembayaranCustomer::class)->name('Metde-Customer');
    });

    Route::put('/edit/pesananproduk/{id}', [EditController::class, 'EditPesananCustomer'])->name('EditPesananCustomer');
    Route::get('/Nota/{link}/{id}', [UserController::class, 'Nota'])->name('NOta');
    Route::get('/Metode-Pembayaran/{table}', MetodePembayaran::class)->name('Metode-Pembayaran');
    Route::view('components.chekoutPage', 'Detail/{table}/')->name('Checkout');

    // ROute Laporan
    Route::get('Laporan/Bahan-Baku', [DatatableController::class, 'cetak_Stock'])->name('Cetak-Stock');
    Route::get('Laporan/Pembelian', [DatatableController::class, 'cetak_Barang'])->name('Cetak-Barang');
    Route::get('Laporan/Penjualan', [DatatableController::class, 'cetak_Barang_keluar'])->name('Cetak-Barang-keluar');
    Route::get('Laporan/Produksi', [DatatableController::class, 'cetak_Produksi'])->name('Cetak-Produksi');

    // Metode Pembayran
    Route::get('/Metode-Pembayaran', MetodeTable::class)->name('MetodeCrud');

});
