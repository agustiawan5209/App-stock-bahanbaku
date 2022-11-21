<?php

namespace App\Http\Livewire\User\Supplier;

use App\Models\Stock;
use App\Models\Bawaan;

use Livewire\Component;
use App\Models\BahanBaku;
use App\Models\BahanBakuAir;
use Livewire\WithFileUploads;
use App\Models\BawaanBahanBakuAir;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\StockBahanBakuAirMineral;
use Illuminate\Support\Facades\Storage;

class Inputpage extends Component
{

    use WithFileUploads;
    public $modal = false, $def, $defa, $Alert = true;
    public $gambar, $bahan, $Kode, $satuan, $harga, $isi, $pcs, $getBahanAll, $Status_id, $jumlah_stock;
    public $row =10, $search ='';
    public function openModal()
    {
        $this->modal = true;
    }
    public function CloseModal()
    {

        $this->AirItem = false;
        $this->PackingItem = false;
        $this->Alert = false;
    }
    public function render()
    {
        $bahan = "";

        $bahanbaku =    BahanBaku::where('suppliers_id', Auth::user()->supplier->id)
            ->paginate($this->row);
        $bahanAir = BahanBakuAir::where('suppliers_id', Auth::user()->supplier->id)->paginate($this->row);
        // dd($bahanAir);
        // $bahanbakuair = BahanBakuAir::where('suppliers_id', Auth::user()->supplier->id)->paginate($this->row);
        // dd($bahanbaku);w
        $StockKurangAir = StockBahanBakuAirMineral::whereBetween('jumlah_stock', [1, 100])->paginate($this->row);
        $StockKurang = Stock::whereBetween('jumlah_stock', [1, 100])->paginate($this->row);
        return view('livewire.user.supplier.inputpage', [
            'bahanbaku' => $bahanbaku,
            'bbAir' => BawaanBahanBakuAir::all(),
            'bahanAir' => $bahanAir,
            'StockKurang' => $StockKurang,
            'StockKurangAir' => $StockKurangAir,

        ]);
    }

    public function getBahan()
    {
        if ($this->satuan == 1) {
            $this->def = Bawaan::all();
        } else if ($this->satuan == 2) {
            $this->def = BawaanBahanBakuAir::all();
        }
    }
    public function submit()
    {
        // try {
        $validate =  $this->validate([
            'Status_id'=> 'required',
            'satuan' => 'required',
            'gambar' => 'image|max:2024',
            'bahan' => 'required',
            'harga' => 'required',
            'jumlah_stock' => 'required',
        ]);
        // dd($validate);
        $name = md5($this->gambar . microtime()) . '.' . $this->gambar->extension();
        $this->gambar->storeAs('upload', $name);

        // Create Bahan Baku Air Dan Bahan Baku Packaging
        try {
            if ($this->satuan == 1) {
                $bb = BahanBaku::create([
                    'gambar' => $name,
                    'bawaan_id' => $this->bahan,
                    'isi' => $this->isi,
                    'satuan' => $this->Status_id,
                    'harga' => $this->harga,
                    'jumlah_stock' => $this->jumlah_stock,
                    'suppliers_id' => Auth::user()->supplier->id,
                ]);
            } else if ($this->satuan == 2) {
                $bb = BahanBakuAir::insert([[
                    'gambar' => $name,
                    'bahanbaku_air_id' => $this->bahan,
                    'satuan' => $this->Status_id,
                    'harga' => $this->harga,
                    'jumlah_stock' => $this->jumlah_stock,
                    'suppliers_id' => Auth::user()->supplier->id,
                ]]);
            }
            // dd([$arr, $defBahan]);

            if ($bb) {
                session()->flash('message', $this->gambar ? "Berhasil Ditambahkan" : 'Gagal Ditambahkan');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
        $this->modal = false;
    }
    public function closeAlert()
    {
        session()->delete();
    }
    public function delete($id)
    {
        BahanBaku::find($id)->delete();
        session()->flash('message', $this->gambar ? "Berhasil Di Hapus" : 'Berhasil Di Hapus');
    }
    public function delete1($id)
    {
        BahanBakuAir::find($id)->delete();
        session()->flash('message', $this->gambar ? "Berhasil Di Hapus" : 'Berhasil Di Hapus');
    }
    public $optionPacking, $optionAir, $AirItem = false, $PackingItem = false;
    public $photo, $bahan_id, $inp_bahan_id;
    public function Edit($id, $table)
    {
        if ($table == "BahanBakuAir") {
            $bahan = BahanBakuAir::find($id);
            $this->ItemId = $bahan->id;
            $this->gambar = $bahan->gambar;
            $this->bahan = $bahan->default_bahan_air->bahan_baku;
            $this->bahan_id = $bahan->bahanbaku_air_id;
            $this->inp_bahan_id = $this->bahan_id;
            $this->satuan = $bahan->satuan;
            $this->harga = $bahan->harga;
            $this->jumlah_stock = $bahan->jumlah_stock;
            $this->optionAir = BawaanBahanBakuAir::all();
        } else if ($table == "BahanBaku") {
            $bahan = BahanBaku::find($id);
            $this->ItemId = $bahan->id;
            $this->gambar = $bahan->gambar;
            $this->isi = $bahan->isi;
            $this->bahan = $bahan->default_stock->bahan_baku;
            $this->bahan_id = $bahan->bawaan_id;
            $this->inp_bahan_id = $this->bahan_id;
            $this->satuan = $bahan->satuan;
            $this->harga = $bahan->harga;
            $this->jumlah_stock = $bahan->jumlah_stock;
            $this->optionAir = Bawaan::all();
            $this->PackingItem = true;
        }
        // dd($this->bahan);
        $this->AirItem = true;
    }
    public function UpdateAir($id)
    {
        if ($this->photo == "") {
            $gambar = $this->gambar;
        } else {
            $gambar = $this->photo;
        }

        // dd($this->optionPacking);
        $validate =  $this->validate([
            'bahan' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'jumlah_stock' => 'required',
            'inp_bahan_id'=> 'required'
        ]);
        // dd($validate);
        File::delete('upload' . $this->gambar);
        BahanBakuAir::where('id', $id)->update([
            'gambar' => $gambar,
            'bahanbaku_air_id' => $this->inp_bahan_id,
            'satuan' => $this->satuan,
            'harga' => $this->harga,
            'jumlah_stock' => $this->jumlah_stock,
        ]);
        session()->flash('message','Berhasil Di Edit');
        $this->AirItem = false;
        $this->PackingItem = false;
    }
    public function Update($id)
    {
        if ($this->photo == "") {
            $name = $this->gambar;
        } else {
            $gambar = $this->photo;
            $name = md5($gambar . microtime()) . '.' . $gambar->extension();
            $photo = $gambar->storeAs('upload', $name);
        }

        // dd($this->optionPacking);
        $validate =  $this->validate([
            'bahan' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'jumlah_stock' => 'required',
            'inp_bahan_id'=> 'required'
        ]);
        // dd($validate);
        File::delete('upload' . $this->gambar);
        // dd($validate);
        BahanBaku::where('id', $id)->update([
            'gambar' => $name,
            'bawaan_id' => $this->inp_bahan_id,
            'isi' => $this->isi,
            'satuan' => $this->satuan,
            'harga' => $this->harga,
            'jumlah_stock' => $this->jumlah_stock,
        ]);
        session()->flash('message','Berhasil Di Edit');
        $this->AirItem = false;
        $this->PackingItem = false;
    }
}
