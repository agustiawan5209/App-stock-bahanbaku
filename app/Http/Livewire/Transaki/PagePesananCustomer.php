<?php

namespace App\Http\Livewire\Transaki;

use App\Models\PesanCustomer;
use Livewire\Component;
use Livewire\WithPagination;

class PagePesananCustomer extends Component
{
    // public $pesan;
    use WithPagination;
    public $search = null;
    public $min_date, $max_date;
    public $row =10;
    public $total_date_penjualan;
    public $ItemDetail;
    public $statusSelected ="";
    public function render()
    {
        $total_penjualan = 0;
        $pesan = PesanCustomer::paginate($this->row);
        if($this->search != null){
            $pesan = PesanCustomer::where('kode_pesan', 'like', '%'. $this->search .'%')
            ->Orwhere('kode_pesan', 'like', '%'. $this->search .'%')
            ->Orwhere('jumlah_pesanan', 'like', '%'. $this->search .'%')
            ->Orwhere('sub_total', 'like', '%'. $this->search .'%')
            ->orWhereHas('customer', function($query){
                $query->where('customer','like', '%'. $this->search .'%');
            })
            ->orWhereDate('tgl_pemesanan', 'like', '%'. $this->search .'%')
            ->paginate($this->row);
            $total_penjualan =$pesan->sum('sub_total');
        }
        if($pesan != null){
            $this->total_date_penjualan = $pesan->sum("sub_total");
        }else{
            $this->total_date_penjualan = 0;
        }
        if($this->statusSelected != null){
            $pesan = PesanCustomer::where('status', '=',$this->statusSelected)->latest()->paginate();
        }
        // dd($pesan);
        return view('livewire.transaki.page-pesanan-customer', ['pesan'=> $pesan, 'total_penjualan'=> $total_penjualan]);
    }
    public function delete($id)
    {
        $delete =  PesanCustomer::find($id);
        $delete->delete();
        session()->flash('message', $delete->bahan ? 'Berhasil Di Hapus' : "gagal Di Hapus");
    }

    public $confirmingUserChange = false;
    public $userDeleted = false;
    public function OpenModal()
    {
        $this->confirmingUserChange = true;
    }
    public function ChangeNot($id)
    {
        PesanCustomer::where('id', $id)->update(['status' => 'Belum Terkonfirmasi']);
        PesanCustomer::find($id);
        session()->flash('message', "Berhasil Diganti");
        $this->CloseModal();
    }
    public function ChangeYes($id)
    {
        PesanCustomer::where('id', $id)->update(['status' => 'Konfirmasi']);
        $bM = PesanCustomer::find($id);
        $this->CloseModal();
        session()->flash('message', "Berhasil Di Ganti");
    }
    // Modal Detail
    public $tgl_transaksi;
    public $ID_Transaksi,$bukti_transaksi;
    public $metode, $jumlah, $tgl, $customer, $kode_pesan;
    public $tgl_pemesanan, $harga, $alamat_edit, $jumlah_pesanan, $pelangganid;
    public function Detail($id){
        $dataPesan = PesanCustomer::find($id);
        // dd($dataPesan);
        $this->kode_pesan = $dataPesan->kode_pesan;
        $this->bukti_transaksi = $dataPesan->transaksi->bukti_transaksi;
        $this->ID_Transaksi = $dataPesan->transaksi->kode_transaksi;
        $this->customer = $dataPesan->customer->customer;
        $this->jumlah = $dataPesan->jumlah_pesanan;
        $this->sub_total = $dataPesan->sub_total;
        $this->tgl = $dataPesan->tgl_masuk;
        $this->metode = $dataPesan->transaksi->metode;
        $this->tgl_transaksi = $dataPesan->transaksi->tgl_transaksi;
        $this->status = $dataPesan->status;
        $this->emit('openContactModal');
        $this->ItemDetail = true;
    }
    public function closeModal(){
        $this->ItemDetail = false;
        $this->statusModal = false;
    }
    public $statusModal = false, $itemID;
    public function Status($id)
    {
        $pesancustomer = PesanCustomer::find($id);
        $this->kode_pesan = $pesancustomer->kode_pesan;
        $this->status = $pesancustomer->status;
        $this->itemID = $pesancustomer->id;
        $this->statusModal = true;
    }
}
