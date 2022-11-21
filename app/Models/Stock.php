<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Stock
 *
 * @property int $id
 * @property int|null $bawaan_id
 * @property int|null $bahanbaku_air_id
 * @property int $jumlah_stock
 * @property string $satuan
 * @property string|null $tgl_stock
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Produk|null $Produk
 * @property-read \App\Models\BawaanBahanBakuAir|null $default_Bahan_air
 * @property-read \App\Models\Bawaan|null $default_stock
 * @method static \Illuminate\Database\Eloquent\Builder|Stock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereBahanbakuAirId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereBawaanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereJumlahStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereTglStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Stock extends Model
{
    protected $table = 'stocks';
    protected $primary_key = 'id';
    protected $fillable = ['bawaan_id' , 'bahanbaku_air_id', 'jumlah_stock','satuan', 'tgl_stock'];
    use HasFactory;

    public function Produk()
    {
        return $this->hasOne(Produk::class);
    }
    public function default_stock(){
        return $this->belongsTo(Bawaan::class , 'bawaan_id');
    }
    public function default_Bahan_air(){
        return $this->belongsTo(BawaanBahanBakuAir::class, 'bahanbaku_air_id');
    }
}
