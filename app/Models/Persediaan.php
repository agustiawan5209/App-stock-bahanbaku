<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Persediaan
 *
 * @property int $id
 * @property int $bahan_baku
 * @property int $default_stock
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Persediaan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Persediaan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Persediaan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Persediaan whereBahanBaku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persediaan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persediaan whereDefaultStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persediaan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persediaan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Persediaan extends Model
{
    protected $table = 'persediaans';
    protected $fillable = ['bahan_baku', 'default_stock'];
    use HasFactory;

    public function default_stock(){
        return $this->belongsTo(DefaultBB::class, 'bahan_baku');
    }
}
