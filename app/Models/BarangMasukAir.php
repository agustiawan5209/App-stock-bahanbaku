<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BarangMasukAir
 *
 * @property int $id
 * @property string $kode_barang_masuk
 * @property string $bahan
 * @property int $bahan_baku_air_id
 * @property int $supplier_id
 * @property int $jumlah_pembelian
 * @property string $harga
 * @property string $sub_total
 * @property string|null $tgl_masuk
 * @property int $transaksi_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BahanBakuAir|null $bahan_baku_air
 * @property-read \App\Models\BawaanBahanBakuAir|null $default_bahan_air
 * @property-read \App\Models\Suppliers|null $supplier
 * @property-read \App\Models\Transaksi $transaksi
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukAir newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukAir newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukAir query()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukAir whereBahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukAir whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukAir whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukAir whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukAir whereJumlahPembelian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukAir whereKodeBarangMasuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukAir whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukAir whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukAir whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukAir whereTglMasuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukAir whereTransaksiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukAir whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BarangMasukAir extends Model
{
    protected $table = 'barang_masuk_airs';
    protected $fillable = ['kode_barang_masuk', 'bahan','bahan_baku_air_id', 'supplier_id', 'jumlah_pembelian','harga', 'sub_total', 'tgl_masuk', 'transaksi_id', 'status'];
    use HasFactory;

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class);
    }
    public function default_bahan_air()
    {
        return $this->belongsTo(BawaanBahanBakuAir::class, 'bahan');
    }
    public function transaksi(){
        return $this->belongsTo(Transaksi::class);
    }
    public function bahan_baku_air(){
        return $this->belongsTo(BahanBakuAir::class);
    }

}
