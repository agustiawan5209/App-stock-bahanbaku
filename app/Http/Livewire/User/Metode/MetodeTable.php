<?php

namespace App\Http\Livewire\User\Metode;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MetodeTable extends Component
{
    public $payment;
    public $itemDelete = false, $itemEdit = false, $itemID, $itemCreate = false, $validasi;
    public $name_card, $number_rek, $metode;
    public function render()
    {
        abort_if(Auth::user()->role_id == 111, 403);
        $this->payment = Payment::where('user_id', Auth::user()->id)->get();
        return view('livewire.user.metode.metode-table');
    }
    public function deleteModal($id)
    {
        $payment = Payment::where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->get();
        foreach ($payment as $item) {
            $this->itemID = $item->id;
        }
        $this->itemDelete = true;
    }
    public function delete($id)
    {
        $payment = Payment::where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->delete();
        session()->flash('message', 'Berhasil Di Hapus');
        $this->itemDelete = false;
    }
    public function EditModal($id)
    {
        $payment = Payment::find($id);
        $this->itemID = $payment->id;
        $this->name_card = $payment->name_card;
        $this->number_rek = $payment->number_rek;
        $this->metode = $payment->metode;
        $this->itemEdit = true;
    }

    public function edit($id)
    {
        $payment = Payment::where('user_id', Auth::user()->id)
            ->where('id', $id)->update([
                'name_card' => $this->name_card,
                'number_rek' => $this->number_rek,
                'metode' => $this->metode,
            ]);
        if ($payment) {
            session()->flash('message', 'Berhasil Di  Edit');
        } else {
            session()->flash('message', 'Gagal Di  Edit');
        }
        $this->itemEdit = false;
    }
    public function CreateModal(){
        $this->name_card ="";
        $this->number_rek = "";
        $this->metode ="";
        $this->itemCreate = true;
    }
    public function create(){
      $validate =  $this->validate([
            'name_card'=> 'required',
            'number_rek' => 'required',
            'metode'=>'required',
        ]);
        $arr=[
            'user_id'=> Auth::user()->id,
            'name_card'=> $this->name_card,
            'number_rek' => $this->number_rek,
            'metode'=>$this->metode,
        ];
        Payment::create($arr);
        session()->flash('message', 'Berhasil Di Tambah');
        $this->itemCreate = false;
    }
    public function closeModal(){
        $this->itemDelete =false;
        $this->itemEdit = false;
        $this->itemCreate = false;
    }
}
