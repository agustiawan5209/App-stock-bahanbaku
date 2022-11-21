<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BarangKeluar
 *
 * @property int $id
 * @property string $kode_barang_keluar
 * @property string $alamat_tujuan
 * @property string $customer
 * @property string $tgl_keluar
 * @property int $jumlah
 * @property int $sub_total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Produk|null $produk
 * @property-read \App\Models\Transaksi|null $transaksi
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar query()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereAlamatTujuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereKodeBarangKeluar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereTglKeluar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BarangKeluar extends Model
{
    protected $table = 'barang_keluars';
    protected $fillable =['kode_barang_keluar', 'alamat_tujuan', 'customer', 'tgl_keluar', 'jumlah', 'sub_total'];
    use HasFactory;

    public function produk(){
        return $this->belongsTo(Produk::class);
    }
    public function transaksi(){
        return $this->belongsTo(Transaksi::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer');
    }
}
