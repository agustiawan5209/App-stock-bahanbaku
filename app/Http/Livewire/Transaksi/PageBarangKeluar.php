<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\Produk;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Transaksi;
use App\Models\BarangKeluar;
use App\Models\PesanCustomer;
use Livewire\WithPagination;

class PageBarangKeluar extends Component
{
    use WithPagination;
    public $produk, $date;
    public $min_date, $max_date, $total_penjualan, $total_date_penjualan;
    public $addItem = false;
    public $KBK, $userSaved = false;
    public $alamat, $tgl, $kode_produk, $customer_name,  $kode_transaksi, $harga_produk = 12800;
    public $jumlah, $sub_total, $transaksi_id, $nama_pelanggan;
    public $Alert;
    public $search = '';
    public $row = 10, $CariTanggal = false;
    protected $message = [
        'required' => 'Mohon Di Isi'
    ];

    public function MinDate()
    {
        $this->CariTanggal = true;
    }
    public function resetModal()
    {
        $this->KBK = '';
        $this->alamat = '';
        $this->tgl = '';
        $this->kode_produk = '';
        $this->jumlah = "";
    }

    public function OpenModal()
    {
        $this->addItem = true;
    }
    public function closeModal()
    {
        $this->resetModal();
        $this->addItem = false;
        $this->userSaved = false;
        $this->Alert = false;
        $this->deleteItem = false;
        $this->EditItem = false;
        $this->itemID;
    }
    public function generateKode()
    {
        $query = BarangKeluar::max('id');
        if (empty($query)) {
            $this->KBK = 'KBK-01';
        } else {
            $exp =  explode("-", $query);
            $str = 'KBK';
            $this->KBK = sprintf("%s-0%u", $str, $query + 1);
        }
    }
    public function submit()
    {
        $this->validate([
            'KBK' => 'required|unique:barang_keluars,kode_barang_keluar',
            'alamat' => 'required',
            'tgl' => 'required|date',
            'jumlah' => 'required',
            'sub_total' => 'required'
        ]);
        $arr = [
            'kode_barang_keluar' => $this->KBK,
            'alamat_tujuan' => $this->alamat,
            'customer' => $this->customer_name,
            'tgl_keluar' => $this->tgl,
            'jumlah' => $this->jumlah,
            'sub_total' => intval($this->jumlah) * intval($this->harga_produk),
        ];
        // dd($arr);
        // Customer::updateOrCreate([
        //     'customer'=> $this->customer,
        // ]);
        $barangkeluar = BarangKeluar::insert($arr);

        session()->flash('message', $this->KBK ? "Berhasil Di Tambahkan " . $this->KBK : 'Gagal Ditambah');
        $this->userSaved = true;
        $this->addItem = false;
    }
    public function getTotal()
    {
        $this->sub_total = "Rp. " . number_format(intval($this->jumlah) * intval($this->harga_produk));
    }
    public function render()
    {
        $barangkeluar = BarangKeluar::orderBy('id', 'desc')->paginate($this->row);
        if ($barangkeluar == null) {
            $this->total_date_penjualan = 0;
        } else {
            $this->total_penjualan = $barangkeluar->sum('jumlah') * 12800;
        }
        if ($this->CariTanggal == true) {
            if ($this->min_date != null && $this->max_date != null) {
                $barangkeluar = BarangKeluar::whereBetween('tgl_keluar', [$this->min_date, $this->max_date])->paginate(10);
                // dd($barangkeluar);
            }
        }
        if ($this->search != null) {
            $barangkeluar = Barangkeluar::where('kode_barang_keluar', 'like', '%' . $this->search . '%')
                ->orWhere('alamat_tujuan', 'like', '%' . $this->search . '%')
                ->orWhere('customer', 'like', '%' . $this->search . '%')
                ->orWhere('jumlah', 'like', '%' . $this->search . '%')
                ->orWhere('sub_total', 'like', '%' . $this->search . '%')->paginate($this->row);
        }
        // if ($this->row != null) {
        //     $barangkeluar =   BarangKeluar::orderBy('id', 'desc')->paginate($this->row);
        //     $this->CariTanggal = false;
        // }
        $customer_id = Customer::all();
        // dd($barangkeluar);
        return view('livewire.transaksi.page-barang-keluar', ['barangKeluar' => $barangkeluar, 'customer_id' => $customer_id]);
    }

    // public function getCustomer()
    // {
    //     $data = PesanCustomer::where('customer_id', $this->customer_name)->get();
    //     foreach ($data as $datas) {
    //         $this->jumlah = $datas->jumlah_pesanan;
    //         $this->sub_total = $datas->sub_total;
    //         // $this->nama_pelanggan = $data->customer->customer;
    //         $this->alamat = $datas->alamat;
    //         $this->nama_pelanggan = $datas->customer->customer;
    //     }
    // }
    public $deleteItem = false;
    public $EditItem = false;
    public $itemID;
    public $produk_id;
    public function deleteModal($id)
    {
        $bb =  BarangKeluar::find($id);
        $this->itemID = $bb->id;
        $this->KBK = $bb->kode_barang_keluar;
        $this->deleteItem = true;
    }
    public function EditModal($id)
    {
        $item = BarangKeluar::find($id);
        $this->itemID = $item->id;
        $this->KBK = $item->kode_barang_keluar;
        $this->nama_pelanggan = $item->customer;
        $this->alamat = $item->alamat_tujuan;
        $this->jumlah = $item->jumlah;
        $this->sub_total = $item->sub_total;
        $this->tgl = $item->tgl_keluar;
        $this->EditItem = true;
    }
    public function delete($id)
    {
        try {
            $bb =  BarangKeluar::find($id);
            $bb->delete();
            session()->flash('Alert', 'Berhasil Di Hapus');
            $this->Alert = true;
        } catch (\Exception $th) {
            session()->flash('Alert', 'Gagal Di Hapus.Error =' . $th->getMessage());
        }
    }
    public function edit($id)
    {
        $validate = $this->validate([
            // 'KBK' => 'required|unique:barang_keluars,kode_barang_keluar',
            'alamat' => 'required',
            'tgl' => 'required|date',
            // 'kode_prodprdouk' => 'required',
        ]);
        // dd($validate);
        BarangKeluar::where('id', $id)->update([
            // 'kode_barang_keluar' => $this->KBK,
            'alamat_tujuan' => $this->alamat,
            'customer' => $this->nama_pelanggan,
            'tgl_keluar' => $this->tgl,
            // 'produk_id' => $this->kode_produk,
            // 'transaksi_id' => '1',
            'jumlah' => $this->jumlah,
            'sub_total' => intval($this->jumlah) * intval($this->harga_produk),
        ]);
        session()->flash('Alert', 'Berhasil Di Edit');
        $this->EditItem = false;
    }
    public function closeCrud()
    {
        $this->deleteItem = false;
        $this->EditItem = false;
        $this->itemID;
    }

}
