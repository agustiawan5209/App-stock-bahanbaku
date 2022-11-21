<?php

namespace App\Http\Livewire\Master;

use Carbon\Carbon;
use App\Models\Stock;
use App\Models\Bawaan;
use App\Models\Produk;
use App\Models\StockBahanBakuAirMineral;
use Livewire\Component;

class InputBahanBakuJadi extends Component
{

    public $stock_bahan_tersedia, $stock_habis;
    public $produk_jadi = '', $kodeproduk;
    public $dus, $pipet, $cup, $penutup, $lakban;
    public $bahan_baku, $jumlah_stock;
    public $stockdus, $stockpipet, $stockcup, $sctockpenutup, $stocklakban;
    public $itemAlert = false;
    public $DUS_dus;
    public $DUS_pipet;
    public $DUS_cup;
    public $DUS_penutup;
    public $DUS_lakban;
    public $air1, $air2, $air3, $air4, $air5, $stockAirMineral_habis;
    public $Alert;
    public $invalidBTN1;
    public $invalidBTN2;
    public $invalidBTN3;
    public $invalidBTN4;
    public $invalidBTN5;
    public $invalidBTN6;
    public $invalidBTN7;
    public $invalidBTN8;
    public $invalidBTN9;
    public $Stock_akhir = false;
    public $stock_akhir, $stock_akhir_air;
    protected $messages = [
        'required' => 'Mohon Untuk Di Isi.',
    ];
    public $InputItem = false;
    public function ModalOpen()
    {
        $this->InputItem = true;
    }
    public function CloseModal()
    {
        $this->InputItem = false;
        $this->Alert = false;
    }
    public function render()
    {
        $stock = Stock::all();
        $stockAir = StockBahanBakuAirMineral::all();
        $this->bahan_baku = [];
        $this->jumlah_stock = [];
        $arr = [];
        foreach ($stock as $value) {
            $this->bahan_baku[] = $value->default_stock->bahan_baku;
            $this->jumlah_stock[] = $value->jumlah_stock;
        }
        $this->stock_habis = Stock::where('jumlah_stock', '<=', 20)->get();
        $this->stockAirMineral_habis =  StockBahanBakuAirMineral::where('jumlah_stock', '<=', 20)->get();
        session()->flash('stockbahan', $stock);
        session()->flash('stockbahanAir', $stockAir);
        return view('livewire.master.input-bahan-baku-jadi', ['count' => $stock->count()]);
    }

    public function getDus()
    {
        $getJmlStock = Stock::find(1);
        if (!empty($getJmlStock)) {
            $hasil =  intval($getJmlStock->jumlah_stock - $this->dus);
            Stock::where('id', $getJmlStock->id)
                ->where('jumlah_stock', '>', 5)
                ->update(['jumlah_stock' => $hasil]);
        }
    }
    // Input BTN
    public $inp_air1, $inp_air2, $inp_air3, $inp_air4, $inp_air5, $inp_air6, $inp_air7, $inp_air8, $inp_air9;
    public function Proses()
    {
        $this->validate(['produk_jadi' => 'required|max:48']);
        $carbon = Carbon::now()->format('Y-m-d');
        // dd([$carbon, $this->produk_jadi]);
        $stock = Stock::all();
        // dd($stock);
        $df = Bawaan::all();
        $i = 0;
        $arr = [];
        $arrStockAwal = [];
        for ($i; $i < $df->count(); $i++) {
            $arr[] = intval($df[$i]['bbs'] * $this->produk_jadi) / $df[$i]['volume'];
            $arrStockAwal[] = intval($df[$i]['bbs'] * $this->produk_jadi);
        }
        $this->air1 = floor(($this->produk_jadi * 5));
        $this->air2 = floor(($this->produk_jadi * 5));
        $this->air3 = floor(($this->produk_jadi * 5));
        $this->air4 = floor(($this->produk_jadi * 9));
        $this->air5 = floor(($this->produk_jadi * 1));
        // dd($stock);
        // menentukan Default value Atas Persediaan Barang;
        // menentukan default Mkasimal
        $this->DUS_dus = floor($arrStockAwal[0] / 1);
        $this->DUS_pipet = floor($arrStockAwal[1]);
        $this->DUS_cup = floor($arrStockAwal[2]);
        $this->DUS_penutup = $arrStockAwal[3];

        // Melakukan Return Data Ke Form Input
        $this->inp_air1 = $arrStockAwal[0] / 1 . " Dus";
        $this->inp_air2 = $arrStockAwal[1] . " Pcs";
        $this->inp_air3 = floor($this->produk_jadi * 48)  . " Buah";
        $this->inp_air4 = floor($this->produk_jadi * 48) . " Pcs";
        $this->inp_air5 = $this->produk_jadi * 5 . " Kg";
        $this->inp_air6 = $this->produk_jadi * 5 . " Kg";
        $this->inp_air7 = $this->produk_jadi * 5 . " Kg";
        $this->inp_air8 = $this->produk_jadi * 9 . " Kg";
        $this->inp_air9 = $this->produk_jadi * 1 . " Buah";

        // menghitung jumlah Stock Yang tersedia dan Melakukan Return Error Bila Jumlah Stock Yang Dimiliki Tidak Sesuai
        $stock1 =  Stock::where('id', 1)->where('jumlah_stock', '<', intval($this->DUS_dus))->get();
        if ($stock1->count() > 0) {
            session()->flash('error', "Maaf Bahan Baku Dus Tidak Mencukupi ");
            $this->invalidBTN1 = false;
        } else {
            $this->invalidBTN1 = true;
        }
        $stock2 =  Stock::where('id', 2)->where('jumlah_stock', '<', intval($this->DUS_pipet))->get();
        if ($stock2->count() > 0) {
            session()->flash('error', "Maaf Bahan Baku Pipet Tidak Mencukupi ");
            $this->invalidBTN2 = false;
        } else {
            $this->invalidBTN2 = true;
        }
        $stock3 =  Stock::where('id', 3)->where('jumlah_stock', '<', intval($this->DUS_cup))->get();
        if ($stock3->count() > 0) {
            session()->flash('error', "Maaf Bahan Baku Cup Tidak Mencukupi ");
            $this->invalidBTN3 = false;
        } else {
            $this->invalidBTN3 = true;
        }
        $stock4 =  Stock::where('id', 4)->where('jumlah_stock', '<', intval($this->DUS_penutup))->get();
        if ($stock4->count() > 0) {
            session()->flash('error', "Maaf Bahan Lid Cup/Penutup Tidak Mencukupi ");
            $this->invalidBTN4 = false;
        } else {
            $this->invalidBTN4 = true;
        }
        $stockAir1 =  StockBahanBakuAirMineral::where('id', 1)->where('jumlah_stock', '<', intval($this->air1))->get();
        if ($stockAir1->count() > 0) {
            session()->flash('error', "Maaf Bahan Baku Karbon AktifTidak Mencukupi ");
            $this->invalidBTN5 = false;
        } else {
            $this->invalidBTN5 = true;
        }
        $stockAir2 =  StockBahanBakuAirMineral::where('id', 2)->where('jumlah_stock', '<', intval($this->air2))->get();
        if ($stockAir2->count() > 0) {
            session()->flash('error', "Maaf Bahan Baku Pasir Aktif Tidak Mencukupi ");
            $this->invalidBTN6 = false;
        } else {
            $this->invalidBTN6 = true;
        }
        $stockAir3 =  StockBahanBakuAirMineral::where('id', 3)->where('jumlah_stock', '<', intval($this->air3))->get();
        if ($stockAir3->count() > 0) {
            session()->flash('error', "Maaf Bahan Baku Pasir Silica Tidak Mencukupi ");
            $this->invalidBTN7 = false;
        } else {
            $this->invalidBTN7 = true;
        }
        $stockAir4 =  StockBahanBakuAirMineral::where('id', 4)->where('jumlah_stock', '<', intval($this->air4))->get();
        if ($stockAir4->count() > 0) {
            session()->flash('error', "Maaf Bahan Magnesium Bubuk Tidak Mencukupi ");
            $this->invalidBTN8 = false;
        } else {
            $this->invalidBTN8 = true;
        }
        $stockAir5 =  StockBahanBakuAirMineral::where('id', 5)->where('jumlah_stock', '<', intval($this->air5))->get();
        if ($stockAir5->count() > 0) {
            session()->flash('error', "Maaf Bahan Post Carbon Filter Tidak Mencukupi ");
            $this->invalidBTN9 = false;
        } else {
            $this->invalidBTN9 = true;
        }
    }
    public function autoCode()
    {
        $query = Produk::max('id');
        if (empty($query)) {
            return  $this->kodeProduk = "KSP-01";
        } else {
            $exp =  explode("-", $query);
            $str = 'KSP';
            return $this->kodeproduk = sprintf("%s-0%u", $str, $query + 1);
        }
    }
    public $stock_akhir_packaging;
    public $stock_akhir_air_s;
    public function Update()
    {
        $this->validate([
            'produk_jadi' => 'required|integer',
        ]);
        // dd($this->autoCode());
        $carbon = Carbon::now()->format("Y-m-d");
        $fun = Stock::all();
        $arr = [
            $this->DUS_dus,
            $this->DUS_pipet,

            $this->DUS_cup,
            $this->DUS_penutup,
            $this->DUS_lakban,
        ];
        $hasiljumlah_stock = [];
        $cek = false;
        for ($i = 0; $i < $fun->count(); $i++) {
            $s = Stock::where('id', $fun[$i]['id'])
                ->whereBetween('jumlah_stock', [1, $arr[$i]])
                ->get();
            if ($s->count() > 0) {
                $cek = false;
            } else if ($s->count() < 1) {
                $cek = true;
            }
        }
        $arr = [
            $this->stockdus = $this->DUS_dus,
            $this->stockpipet = $this->DUS_pipet,
            $this->stockcup = $this->DUS_cup,
            $this->stockpenutup = $this->DUS_penutup,
            $this->stocklakban = $this->DUS_lakban,
        ];
        $arrAir  = [
            $this->air1, $this->air2, $this->air3, $this->air4, $this->air5,
        ];

        // dd($arrAir);
        if ($cek == true) {
            $pro = Produk::where('tgl_stock_produk', $carbon)->latest()->first();
            // dd($pro);
            if (empty($pro)) {
                Produk::create([
                    'kode_stock_produk' => $this->autoCode(),
                    'tgl_stock_produk' => $carbon,
                    'jumlah_stock_produk' => $this->produk_jadi,
                ]);
                for ($i = 0; $i < $fun->count(); $i++) {
                    if (intval($fun[$i]['jumlah_stock']) > 1) {
                        $hasil = intval($fun[$i]['jumlah_stock']) - intval($arr[$i]);
                        Stock::where('id', $fun[$i]['id'])->update(['jumlah_stock' => $hasil]);
                    } else {
                        $stock_habis = Stock::where('id', $fun[$i]['id'])->where('jumlah_stock', '<', $arr[$i])->get();
                        session()->flash('message', $stock_habis[$i]['bawaan_id'] ? "Stock Habis ." . $stock_habis[$i]['default_stock.bahan_baku'] : "Berhasil");
                    }
                }
                $jumlah_Stock_air = StockBahanBakuAirMineral::all();
                for ($i = 0; $i < $jumlah_Stock_air->count(); $i++) {
                    if (intval($jumlah_Stock_air[$i]['jumlah_stock']) > 1) {
                        $hasilAir = intval($jumlah_Stock_air[$i]['jumlah_stock']) - intval($arrAir[$i]);
                        StockBahanBakuAirMineral::where('id', $jumlah_Stock_air[$i]['id'])->update(['jumlah_stock' => $hasilAir]);
                    } else {
                        $stock_habis = Stock::where('id', $jumlah_Stock_air[$i]['id'])->where('jumlah_stock', '<', $arrAir[$i])->get();
                        session()->flash('message', $stock_habis[$i]['bawaan_id'] ? "Stock Habis ." . $stock_habis[$i]['default_stock.bahan_baku'] : "Berhasil");
                    }
                    $plus = $this->produk_jadi;
                    // dd($plus);
                    $pro = Produk::latest()->first()->update(['jumlah_stock_produk' => $plus]);
                }
                session()->flash('message', 'Data Produk Air Mineral DiTambah');
            } else {
                for ($i = 0; $i < $fun->count(); $i++) {
                    if (intval($fun[$i]['jumlah_stock']) > 1) {
                        $hasil = intval($fun[$i]['jumlah_stock']) - intval($arr[$i]);
                        Stock::where('id', $fun[$i]['id'])->update(['jumlah_stock' => $hasil]);
                    } else {
                        $stock_habis = Stock::where('id', $fun[$i]['id'])->where('jumlah_stock', '<', $arr[$i])->get();
                        session()->flash('message', $stock_habis[$i]['bawaan_id'] ? "Stock Habis ." . $stock_habis[$i]['default_stock.bahan_baku'] : "Berhasil");
                    }
                }
                $jumlah_Stock_air = StockBahanBakuAirMineral::all();
                for ($i = 0; $i < $jumlah_Stock_air->count(); $i++) {
                    if (intval($jumlah_Stock_air[$i]['jumlah_stock']) > 1) {
                        $hasilAir = intval($jumlah_Stock_air[$i]['jumlah_stock']) - intval($arrAir[$i]);
                        StockBahanBakuAirMineral::where('id', $jumlah_Stock_air[$i]['id'])->update(['jumlah_stock' => $hasilAir]);
                    } else {
                        $stock_habis = Stock::where('id', $jumlah_Stock_air[$i]['id'])->where('jumlah_stock', '<', $arrAir[$i])->get();
                        session()->flash('message', $stock_habis[$i]['bawaan_id'] ? "Stock Habis ." . $stock_habis[$i]['default_stock.bahan_baku'] : "Berhasil");
                    }
                }
                $plus = intval($pro->jumlah_stock_produk) + $this->produk_jadi;

                $pro = Produk::where('id', $pro->id)->update(['jumlah_stock_produk' => $plus]);

                if ($pro) {
                    session()->flash('message', $this->produk_jadi ? 'Data Berhasil Di Update ' . $carbon : 'Gagal Di Update');
                }
            }
            $this->InputItem = false;
            $this->Stock_akhir = true;
            $this->stock_akhir = Stock::join('bawaans', 'stocks.bawaan_id', '=', 'bawaans.id')->get();
            $this->stock_akhir_air = StockBahanBakuAirMineral::join('bawaan_bahan_baku_airs', 'stock_bahan_baku_air_minerals.bahanbaku_air_id', '=', 'bawaan_bahan_baku_airs.id')->get();
            $hasil_stock_packaging = [];
            $hasil_stock_air = [];
            $no_pack = 0;
            $no_air = 0;
            // dd($hasil_stock_packaging);
            $this->stock_akhir_packaging = $this->stock_akhir;
            $this->stock_akhir_air_s = $this->stock_akhir_air;
        } else if ($cek == false) {
            session()->flash('message', 'Data Gagal Di Update . Jumlah Stock Yang Dibutuhkan Tidak Tersedia');
            $this->Alert = true;
        }
        $this->DUS_dus = '';
        $this->DUS_pipet = '';
        $this->DUS_cup = '';
        $this->DUS_penutup = '';
        $this->produk_jadi = '';
        $this->air1 = "";
        $this->air2 = "";
        $this->air3 = "";
        $this->air4 = "";
        $this->air5 = "";
        $this->inp_air1 = "";
        $this->inp_air2 = "";
        $this->inp_air3 = "";
        $this->inp_air4 = "";
        $this->inp_air5 = "";
        $this->inp_air6 = "";
        $this->inp_air7 = "";
        $this->inp_air8 = "";
        $this->inp_air9 = "";
        $this->produk_jadi = "";
    }
    public function Close()
    {
        $this->Alert = false;
    }
}
