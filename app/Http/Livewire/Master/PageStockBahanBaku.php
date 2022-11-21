<?php

namespace App\Http\Livewire\Master;

use App\Models\BahanBaku;
use App\Models\Stock;
use Livewire\Component;

class PageStockBahanBaku extends Component
{
    public $bahanbaku;
    public $Stock_Update;
    public $ModalEdit = false;
    public $itemID;
    public function render()
    {
        $this->bahanbaku = Stock::all();
        return view('livewire.master.page-stock-bahan-baku');
    }
    public function ModalEdit($id)
    {
        $stock = Stock::find($id);
        $this->Stock_Update = $stock->jumlah_stock;
        $this->itemID = $stock->id;
        $this->ModalEdit = true;
    }
    public function UpdateStock($id){
        $stock = Stock::where('id', $id)->update(['jumlah_stock'=> $this->Stock_Update]);
        session()->flash('message', 'Data Berhasil Di Update');
        $this->ModalEdit = false;
    }
    public function closeModal()
    {
        $this->ModalEdit = false;
    }
}
