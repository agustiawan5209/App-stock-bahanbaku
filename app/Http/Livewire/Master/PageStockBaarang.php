<?php

namespace App\Http\Livewire\Master;

use Carbon\Carbon;
use App\Models\Produk;
use Livewire\Component;
use Livewire\WithPagination;

class PageStockBaarang extends Component
{
    use WithPagination;
    public  $date = false, $Column =10;
    public $min_date, $max_date, $total_penjualan, $total_date_penjualan;
    public $ItemProdukModal;
    public $userSaved;
    public  $kodeProduk, $tgl_Produk, $jmlh_produk;
    public $autoKode = "";
    public $search = '';
    protected $messages = [
        'jmlh_produk.required' => 'Mohon Isi Jumlah produksi Air Mineral.',
        'tgl_Produk.required' => 'Mohon Isi Tanggal produksi Air Mineral.',
        'kodeProduk.required' => 'Mohon Isi Kode produksi Air Mineral.',
    ];
    public function mount()
    {
        $this->ItemProdukModal = false;
    }
    public function ProdukModal()
    {
        //@dd($this->ItemProdukModal);
        $this->ItemProdukModal = true;
    }
    public function render()
    {
        $produk = Produk::orderBy('id', 'desc')->paginate($this->Column);
        $this->total_penjualan = $produk->sum('jumlah_stock_produk') * 12800;
        if($produk == null){
            $this->total_penjualan = 0;
        }
        if ($this->search != null) {
            $produk = Produk::where("kode_stock_produk", "like", '%' . $this->search . '%')
                ->orWhere("jumlah_stock_produk", "like", '%' . $this->search . '%')->paginate($this->Column);
            $this->total_penjualan = $produk->sum('jumlah_stock_produk') * 12800;
            $this->date = false;
        }
        if ($this->date == true) {
            $produk = Produk::whereBetween('tgl_stock_produk', [$this->min_date, $this->max_date])->paginate($this->Column);
            $this->total_penjualan = $produk->sum('jumlah_stock_produk') * 12800;
        }

        return view('livewire.master.page-stock-baarang', [
            'produk' => $produk,
        ]);
    }
    /**
     * MinDate
     *
     * @return void
     */
    public function MinDate()
    {
        $this->date = true;
    }
    /**
     * autoCode
     *
     * @return void
     */
    public function autoCode()
    {
        $query = Produk::max('id');
        if (empty($query)) {
            $this->kodeProduk = "KSP-001";
        } else {
            $exp =  explode("-", $query);
            $str = 'KSP';
            $this->kodeProduk = sprintf("%s-0%u", $str, $query + 1);
        }
        return $this->kodeProduk;
    }
    /**
     * Saved
     *  Simpan
     * disabled
     * @return void
     */
    public function Saved()
    {
        $date = date('Y-m-d H:i:s');

        $this->validate([
            'kodeProduk' => 'required',
            'tgl_Produk' => 'required',
            'jmlh_produk' => 'required',
        ]);
        $data = [
            'kode_stock_produk' => $this->kodeProduk,
            'tgl_stock_produk' => $this->tgl_Produk,
            'jumlah_stock_produk' => $this->jmlh_produk,
            'created_at' => $date
        ];
        Produk::insert($data);
        session()->flash("message", $this->kodeProduk ? "Berhasil Ditambah" : "Gagal Ditambah");
        $this->userSaved = true;
        $this->ItemProdukModal = false;
        $this->kodeProduk = "";
        $this->tgl_Produk = "";
        $this->jmlh_produk = "";
    }
    public $itemDelete = false;
    public function DeleteModal($id)
    {
        $this->itemDelete = true;
    }
    public function delete($id)
    {
        Produk::find($id)->delete();
        session()->flash('message', 'Berhasil Di Hapus');
    }
}
