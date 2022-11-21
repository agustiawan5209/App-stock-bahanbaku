<?php

namespace App\Http\Livewire\Master;

use App\Models\Customer;
use Livewire\Component;

class PageCustomer extends Component
{
    public $customer;
    public function render()
    {
        $this->customer = Customer::all();
        return view('livewire.master.page-customer');
    }
    public function delete($id)
    {
        dd($id);
    }
}
