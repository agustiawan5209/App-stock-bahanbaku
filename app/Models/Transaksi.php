<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Transaksi
 *
 * @property int $id
 * @property string $kode_transaksi
 * @property string $kode
 * @property string $metode
 * @property string|null $tgl_transaksi
 * @property string $bukti_transaksi
 * @property string|null $keterangan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BarangKeluar|null $barang_keluar
 * @property-read \App\Models\BarangMasuk|null $barang_masuk
 * @property-read \App\Models\BarangMasukAir|null $barang_masuk_air
 * @property-read \App\Models\PesanCustomer|null $pesan_customer
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereBuktiTransaksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereKodeTransaksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereMetode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTglTransaksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $fillable= ['kode_transaksi',  'kode','tgl_transaksi', 'metode','bukti_transaksi', 'keterangan'];
    use HasFactory;

    public function barang_keluar(){
        return $this->hasOne(BarangKeluar::class, 'kode');
    }
    public function barang_masuk(){
        return $this->hasOne(BarangMasuk::class, 'kode');
    }
    public function barang_masuk_air(){
        return $this->hasOne(BarangMasukAir::class, 'kode');
    }
    public function pesan_customer(){
        return $this->hasOne(PesanCustomer::class, 'transaksi_id');
    }
}
