<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StockBahanBakuAirMineral
 *
 * @property int $id
 * @property int|null $bahanbaku_air_id
 * @property int $jumlah_stock
 * @property string $satuan
 * @property string|null $tgl_stock
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Produk|null $Produk
 * @property-read \App\Models\BawaanBahanBakuAir|null $default_bahan_air
 * @property-read \App\Models\Bawaan|null $default_stock
 * @method static \Illuminate\Database\Eloquent\Builder|StockBahanBakuAirMineral newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StockBahanBakuAirMineral newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StockBahanBakuAirMineral query()
 * @method static \Illuminate\Database\Eloquent\Builder|StockBahanBakuAirMineral whereBahanbakuAirId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockBahanBakuAirMineral whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockBahanBakuAirMineral whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockBahanBakuAirMineral whereJumlahStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockBahanBakuAirMineral whereSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockBahanBakuAirMineral whereTglStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockBahanBakuAirMineral whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StockBahanBakuAirMineral extends Model
{
    protected $table = 'stock_bahan_baku_air_minerals';
    protected $primary_key = 'id';
    protected $fillable = ['bahanbaku_air_id', 'jumlah_stock','satuan', 'tgl_stock'];
    use HasFactory;

    public function Produk()
    {
        return $this->hasOne(Produk::class);
    }
    public function default_stock(){
        return $this->belongsTo(Bawaan::class , 'bawaan_id');
    }
    public function default_bahan_air(){
        return $this->belongsTo(BawaanBahanBakuAir::class, 'bahanbaku_air_id');
    }
}
