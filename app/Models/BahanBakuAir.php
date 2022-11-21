<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BahanBakuAir
 *
 * @property int $id
 * @property string|null $gambar
 * @property int $bahanbaku_air_id
 * @property string $satuan
 * @property int $harga
 * @property int $jumlah_stock
 * @property int $suppliers_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BawaanBahanBakuAir|null $default_bahan_air
 * @property-read \App\Models\Bawaan|null $default_stock
 * @property-read \App\Models\Suppliers $supplier
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBakuAir newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBakuAir newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBakuAir query()
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBakuAir whereBahanbakuAirId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBakuAir whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBakuAir whereGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBakuAir whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBakuAir whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBakuAir whereJumlahStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBakuAir whereSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBakuAir whereSuppliersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BahanBakuAir whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BahanBakuAir extends Model
{
    protected $table = 'bahan_baku_airs';
    protected $fillable = ['gambar', 'bahanbaku_air_id' , 'satuan','isi', 'harga','jumlah_stock', 'suppliers_id'];
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
    public function barang_masuk_air()
    {
        return $this->hasOne(BarangMasukAir::class, 'bahan_baku_air_id');
    }
}
