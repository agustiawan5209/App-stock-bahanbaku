<?php

namespace App\Http\Livewire\Master;

use App\Models\Stock;
use App\Models\StockBahanBakuAirMineral;
use Livewire\Component;

class StockBahanAir extends Component
{
    public $bahanbaku;
    public $Stock_Update;
    public $ModalEdit = false;
    public $itemID;
    public function render()
    {
        $this->bahanbaku = StockBahanBakuAirMineral::all();
        return view('livewire.master.stock-bahan-air');
    }
    public function ModalEdit($id)
    {
        $stock = StockBahanBakuAirMineral::find($id);
        $this->Stock_Update = $stock->jumlah_stock;
        $this->itemID = $stock->id;
        $this->ModalEdit = true;
    }
    public function UpdateStock($id){
        $stock = StockBahanBakuAirMineral::where('id', $id)->update(['jumlah_stock'=> $this->Stock_Update]);
        session()->flash('message', 'Data Berhasil Di Update');
        $this->ModalEdit = false;
    }
    public function closeModal()
    {
        $this->ModalEdit = false;
    }
}
