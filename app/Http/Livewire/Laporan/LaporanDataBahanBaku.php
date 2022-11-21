<?php

namespace App\Http\Livewire\Laporan;

use App\Models\Stock;
use Livewire\Component;
use PDF;
use App\Models\StockBahanBakuAirMineral;

class LaporanDataBahanBaku extends Component
{
    public $bahanbakuair, $bahanbakupacking;
    public function render()
    {
        $bahanbakupackagin = Stock::all();
        $bahanbakuair = StockBahanBakuAirMineral::all();
        return view('livewire.laporan.laporan-data-bahan-baku',[
            'bahanbaku'=> $bahanbakupackagin,
            'bahanbakuAir'=> $bahanbakuair,
        ]);
    }
    public function cetak_pdf()
    {
    	return redirect()->route('Cetak-Stock');
    }
}
