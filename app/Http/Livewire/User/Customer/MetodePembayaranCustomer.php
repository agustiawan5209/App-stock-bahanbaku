<?php

namespace App\Http\Livewire\User\Customer;

use Carbon\Carbon;
use App\Models\Payment;
use Livewire\Component;
use App\Models\Transaksi;
use App\Models\BarangMasuk;
use Illuminate\Support\Str;
use App\Models\PesanCustomer;
use Livewire\WithFileUploads;
use App\Models\BarangMasukAir;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MetodePembayaranCustomer extends Component
{
    use WithFileUploads;
    public $ItemID, $table, $sessi;
    public $modal = false;
    public $bayar = false;
    public $barangmasuk, $payment;
    public $name_card, $metode, $card_number, $tgl_transaksi, $KBM, $bukti_transaksi;
    public $tgl_pemesanan, $harga, $alamat_edit, $jumlah_pesanan, $pelangganid;
    public function mount($table)
    {
        $this->tgl_pemesanan = Carbon::now()->format("Y-m-d");
        $this->tgl_transaksi = Carbon::now()->format("Y-m-d");
        $this->table = $table;
    }
    protected $messages = [
        'bukti_transaksi.required' => ':attribute Tidak Boleh Kosong.',
        'bukti_transaksi.mime' => ':attribute Harus Bertipe jpg,png,jpeg.',
        'bukti_transaksi.max' => ':attribute Tidak Boleh Lebih Dari 2 MB.',
    ];

    public function GetPayment($value)
    {
        $payment =  Payment::find($value);
        $this->name_card = $payment->name_card;
        $this->card_number = $payment->number_rek;
        //    dd($payment);
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
        // dd($this->sessi);
        $this->barangmasuk = PesanCustomer::find($this->ItemID);
        $this->payment = Payment::where('user_id', 1)->get();
        return view('livewire.user.customer.metode-pembayaran-customer');
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
    public function Bayar()
    {
        $name = md5($this->bukti_transaksi . microtime()) . '.' . $this->bukti_transaksi->extension();
        $query = PesanCustomer::max('id');
        if (empty($query)) {
            $kode = 'KD-001';
        } else {
            $exp =  explode("-", $query);
            $str = 'KD';
            $kode = sprintf("%s-0%u", $str, $query + 1);
        }

        $transaksi = Transaksi::updateOrCreate([
            'kode_transaksi' => $this->transaksiKode(),
            'kode' => $kode,
            'metode' => $this->metode,
            'tgl_transaksi' => $this->tgl_transaksi,
            'bukti_transaksi' => $name,
        ]);
        $transaksi = Transaksi::latest()->first();
        if ($transaksi) {
            $pesan = PesanCustomer::create([
                'kode_pesan' => $kode,
                'tgl_pemesanan' =>$this->tgl_transaksi,
                'jumlah_pesanan' => $this->sessi['jumlah_pesanan'],
                'customer_id' => $this->sessi['customer_id'],
                'sub_total' => intval($this->sessi['jumlah_pesanan'] * 12800),
                'transaksi_id'=> $transaksi->id,
                'alamat' => $this->sessi['alamat'],
                'status'=> "Belum konfirmasi"
            ]);
            $this->bukti_transaksi->storeAs('bukti', $name);
            session()->flash('message', 'Pemesanan Bahan Baku Berhasil  Dilakukan');
        } else {
            session()->flash('error', 'Gagal Ditambah. Bahan Baku Tidak Mencukupi');
        }

        session()->forget('data');
        session()->flash('info', 'Pemesanan Berhasil');
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
}
