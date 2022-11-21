<?php

namespace App\Http\Livewire\Item;

use App\Models\BarangMasuk;
use App\Models\BarangMasukAir;
use App\Models\PesanCustomer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavigationDropdown extends Component
{
    public $msg, $msgs,$msgSupplier;
    public function render()
    {
        $this->msg = PesanCustomer::where('status', '=', "Belum konfirmasi")->get()->count();
        if(Auth::user()->role_id == 112){
        $barangmasukAir = BarangMasukAir::where('supplier_id', Auth::user()->supplier->id)->where('status', '=', "Belum konfirmasi")->get()->count();
        $barangmasuk = BarangMasuk::where('supplier_id', Auth::user()->supplier->id)->where('status', '=', "Belum konfirmasi")->get()->count();
        $this->msgs = $barangmasuk + $barangmasukAir;
        $this->msgSupplier = $barangmasuk + $barangmasukAir;
        }

        return view('livewire.item.navigation-dropdown');
    }
}
