<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'barang_masuks';
    protected $fillable = ['kode_barang_masuk', 'bahan', 'bahan_baku_id', 'supplier_id', 'jumlah_pembelian','harga','sub_total', 'tgl_masuk', 'transaksi_id', 'status'];
    use HasFactory;

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class);
    }
    public function default_stock()
    {
        return $this->belongsTo(Bawaan::class, 'bahan');
    }
    public function transaksi(){
        return $this->belongsTo(Transaksi::class);
    }
    public function bahan_baku(){
        return $this->belongsTo(BahanBaku::class, 'bahan_baku_id');
    }
    // public static function boot() {
    //     parent::boot();

    //     static::deleting(function($item) { // before delete() method call this
    //          $item->transaksi()->delete();
    //          // do the rest of the cleanup...
    //     });
    // }
}
