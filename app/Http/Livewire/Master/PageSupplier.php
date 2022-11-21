<?php

namespace App\Http\Livewire\Master;

use App\Models\Suppliers;
use Livewire\Component;

class PageSupplier extends Component
{
    public function render()
    {
        $supplier = Suppliers::all();
        return view('livewire.master.page-supplier', ['supplier'=> $supplier]);
    }
}
