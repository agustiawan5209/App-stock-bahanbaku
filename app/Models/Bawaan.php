<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Bawaan
 *
 * @property int $id
 * @property string $gambar
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\BahanBaku[] $bahan_baku
 * @property string $bbs
 * @property string $maxbb
 * @property int $volume
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Suppliers|null $Supplier
 * @property-read int|null $bahan_baku_count
 * @property-read \App\Models\Stock|null $stock
 * @method static \Illuminate\Database\Eloquent\Builder|Bawaan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bawaan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bawaan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bawaan whereBahanBaku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bawaan whereBbs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bawaan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bawaan whereGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bawaan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bawaan whereMaxbb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bawaan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bawaan whereVolume($value)
 * @mixin \Eloquent
 */
class Bawaan extends Model
{
    protected $table = 'bawaans';
    protected $fillable = ['id','gambar','bahan_baku', 'bbs', 'maxbb', 'volume'];
    use HasFactory;

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }
    public function Supplier(){
        return $this->hasOne(Suppliers::class);
    }
    public function bahan_baku(){
        return $this->hasMany(BahanBaku::class, 'bawaan_id');
    }
}
