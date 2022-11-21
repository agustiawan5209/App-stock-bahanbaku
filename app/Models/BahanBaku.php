<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BahanBaku
 *
 * @property int $id
 * @property string|null $gambar
 * @property int $bawaan_id
 * @property string $isi
 * @property string $satuan
 * @property int $harga
 * @property int $jumlah_stock
 * @property int $suppliers_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BawaanBahanBakuAir|null $default_bahan_air
 * @property-read \App\Models\Bawaan|null $default_stock
 * @property-read \App\Models\Suppliers $supplier
 * @method static \Database\Factories\BahanBakuFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBaku newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBaku newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBaku query()
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBaku whereBawaanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBaku whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBaku whereGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBaku whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBaku whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBaku whereIsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBaku whereJumlahStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBaku whereSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBaku whereSuppliersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBaku whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BahanBaku extends Model
{
    protected $table = 'bahan_bakus';
    protected $fillable = ['gambar','bawaan_id','satuan' ,'isi', 'harga','jumlah_stock', 'suppliers_id'];
    use HasFactory;

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class, 'suppliers_id');
    }
    public function getStock(){
        return $this->hasOne(Stock::class);
    }
    public function default_stock(){
        return $this->belongsTo(Bawaan::class, 'bawaan_id');
    }
    public function default_bahan_air(){
        return $this->belongsTo(BawaanBahanBakuAir::class, 'bahanbaku_air_id');
    }
    public function barang_masuk()
    {
        return $this->hasOne(BarangMasuk::class, 'bahan');
    }
}
