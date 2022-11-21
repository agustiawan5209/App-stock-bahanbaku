<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Transaksi\PesanBahanBakuAir;
use App\Models\BahanBakuAir;
use PDF;
use Carbon\Carbon;
use App\Models\Bawaan;
use Illuminate\Http\Request;
use App\Models\PesanCustomer;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id == 999) {
            return view('livewire.user.homeAdmin');
        } else  if (Auth::user()->role_id == 112) {
            return view('livewire.user.homeSupplier');
        } else if (Auth::user()->role_id == 111) {
            return view('livewire.user.homeCustomer');
        }
    }
}
