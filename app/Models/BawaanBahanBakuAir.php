<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BawaanBahanBakuAir
 *
 * @property int $id
 * @property string $gambar
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\BahanBaku[] $bahan_baku
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Suppliers|null $Supplier
 * @property-read int|null $bahan_baku_count
 * @property-read \App\Models\Stock|null $stock
 * @method static \Illuminate\Database\Eloquent\Builder|BawaanBahanBakuAir newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BawaanBahanBakuAir newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BawaanBahanBakuAir query()
 * @method static \Illuminate\Database\Eloquent\Builder|BawaanBahanBakuAir whereBahanBaku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BawaanBahanBakuAir whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BawaanBahanBakuAir whereGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BawaanBahanBakuAir whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BawaanBahanBakuAir whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BawaanBahanBakuAir extends Model
{
    protected $table = 'bawaan_bahan_baku_airs';
    protected $fillable = ['id','gambar','bahan_baku'];
    use HasFactory;

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }
    public function Supplier(){
        return $this->hasOne(Suppliers::class);
    }
    public function bahan_baku(){
        return $this->hasMany(BahanBaku::class, 'bahanbaku_air_id');
    }
}
