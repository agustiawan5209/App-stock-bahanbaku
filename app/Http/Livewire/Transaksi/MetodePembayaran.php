<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\Payment;
use Livewire\Component;
use App\Models\Transaksi;
use App\Models\BarangMasuk;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\BarangMasukAir;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class MetodePembayaran extends Component
{
    use WithFileUploads;
    public $ItemID, $table, $sessi;
    public $modal = false;
    public $bayar = false;
    public $barangmasuk, $payment;
    public $name_card, $metode, $card_number, $tgl_transaksi, $KBM, $bukti_transaksi;
    public function mount($table)
    {
        $this->tgl_transaksi = "";
        $this->table = $table;
    }
    protected $messages = [
        'bukti_transaksi.required'=> ':attribute Tidak Boleh Kosong.',
        'bukti_transaksi.mime' => ':attribute Harus Bertipe jpg,png,jpeg.',
        'bukti_transaksi.max' => ':attribute Tidak Boleh Lebih Dari 2 MB.',
    ];

    public function GetPayment($value)
    {
        $payment =  Payment::find($value);
        $this->name_card = $payment->name_card;
        $this->card_number = $payment->number_rek;
        $this->tgl_transaksi= $this->sessi['tgl_masuk'];
        //    dd($payment);
    }
    public function KodeBarangMasuk()
    {
        $query = BarangMasuk::max('id');
        $exp =  explode("-", $query);
        if (empty($query)) {
            $this->KBM = 'KBM-001';
        } else {
            $str = 'KBM';
            $this->KBM = sprintf("%s-0%u", $str, $query + 1);
        }
        // dd([$this->KBM, $exp]);
        return $this->KBM;
    }
    public function KodeBarangMasukAir()
    {
        $query = BarangMasukAir::max('id');
        $exp =  explode("-", $query);
        if (empty($query)) {
            $this->KBM = 'KBMA-001';
        } else {
            $str = 'KBMA';
            $this->KBM = sprintf("%s-0%u", $str, $query + 1);
        }
        return $this->KBM;
    }
    public function transaksiKode()
    {
        $kode_transaksi = 'ID' . Str::random(15);
        $transaksi = Transaksi::where('kode_transaksi', $kode_transaksi)->get();
        if ($transaksi == null) {
            return $kode_transaksi;
        } else {
            return  $kode_transaksi = 'ID' . Str::random(15);
        }
    }
    public function getSession()
    {
        $ss = Session::get('data');
        $data = $ss['kode_barang_masuk'];
    }

    public function render()
    {
        $this->sessi = Session::get('data');
        abort_if($this->sessi == null, 403);
        $this->barangmasuk = BarangMasukAir::find($this->ItemID);
        $this->payment = Payment::where('user_id', $this->sessi['payment'])->get();
        return view('livewire.transaksi.metode-pembayaran');
    }
    public function PreviewImage()
    {

    }
    public function Payment()
    {
        $this->validate([
            'name_card' => 'required',
            'card_number' => 'required',
            'tgl_transaksi' => 'required',
            'bukti_transaksi' => 'required|image|max:1024|mimes:png,jpg,jpeg',
        ]);
        // $this->bukti_transaksi->path;
        $this->bayar = true;
    }
    public function Bayar()
    {
        // dd($valid);
        $name = md5($this->bukti_transaksi . microtime()).'.'.$this->bukti_transaksi->extension();
        if ($this->table == 'BarangMasukAir') {
            $transaksi = Transaksi::updateOrCreate([
                'kode_transaksi' => $this->transaksiKode(),
                'kode' => $this->KodeBarangMasukAir(),
                'metode' => $this->metode,
                'tgl_transaksi' => $this->tgl_transaksi,
                'bukti_transaksi' => $name,
                'keterangan' => $this->sessi['keterangan'],
            ]);
            $trID = Transaksi::latest()->first();
            BarangMasukAir::create([
                'kode_barang_masuk' => $this->KodeBarangMasukAir(),
                'bahan' => $this->sessi['bahan'],
                'bahan_baku_air_id' => $this->sessi['bahan'],
                'supplier_id' => $this->sessi['supplier_id'],
                'jumlah_pembelian' => intval($this->sessi['jumlah_pembelian']),
                'harga' => intval($this->sessi['harga']),
                'sub_total' => intval($this->sessi['harga']) * intval($this->sessi['jumlah_pembelian']),
                'tgl_masuk' => $this->tgl_transaksi,
                'transaksi_id' => $trID->id,
                'status' => 'Belum Konfirmasi',
            ]);
            $this->bukti_transaksi->storeAs('bukti', $name);
        } else if ($this->table == 'BarangMasukPacking') {
            $transaksi = Transaksi::updateOrCreate([
                'kode_transaksi' => $this->transaksiKode(),
                'kode' => $this->KodeBarangMasuk(),
                'metode' => $this->metode,
                'tgl_transaksi' => $this->tgl_transaksi,
                'bukti_transaksi' => $name,
                'keterangan' => $this->sessi['keterangan'],
            ]);
            $trID = Transaksi::latest()->first();
            BarangMasuk::create([
                'kode_barang_masuk' => $this->KodeBarangMasuk(),
                'bahan' => $this->sessi['bahan'],
                'bahan_baku_id' => $this->sessi['bahan'],
                'supplier_id' => $this->sessi['supplier_id'],
                'jumlah_pembelian' => intval($this->sessi['jumlah_pembelian']),
                'harga' => intval($this->sessi['harga']),
                'sub_total' => intval($this->sessi['harga']) * intval($this->sessi['jumlah_pembelian']),
                'tgl_masuk' => $this->tgl_transaksi,
                'transaksi_id' => $trID->id,
                'status' => 'Belum Konfirmasi',
            ]);
            $this->bukti_transaksi->storeAs('bukti', $name);
        }

        session()->forget('data');
        session()->flash('info', 'Pemesanan Berhasil '. $this->tgl_transaksi);
        return redirect()->route('dashboard');
    }
    public function Cancel()
    {
        $this->modal = true;
    }

    public function CloseModal()
    {
        $this->modal = false;
        $this->bayar = false;
    }

    public function delete()
    {
        session()->forget('data');
        return redirect()->route('dashboard');
    }
    public function BarangMasukAir()
    {
    }
}
