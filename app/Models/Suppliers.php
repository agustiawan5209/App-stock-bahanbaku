<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Suppliers
 *
 * @property int $id
 * @property string $supplier
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $User
 * @property-read \App\Models\BahanBaku|null $bahan_baku
 * @property-read \App\Models\BahanBakuAir|null $bahan_baku_air
 * @property-read \App\Models\BarangMasuk|null $barang
 * @method static \Illuminate\Database\Eloquent\Builder|Suppliers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Suppliers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Suppliers query()
 * @method static \Illuminate\Database\Eloquent\Builder|Suppliers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suppliers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suppliers whereSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suppliers whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Suppliers whereUserId($value)
 * @mixin \Eloquent
 */
class Suppliers extends Model
{
    protected $table = 'suppliers';
    protected $fillable = ['supplier', 'user_id'];
    use HasFactory;

    public function bahan_bakus(){
        return $this->hasOne(BahanBaku::class, 'suppliers_id');
    }
    public function bahan_baku_air(){
        return $this->hasOne(BahanBakuAir::class, 'suppliers_id');
    }
    public function barang()
    {
        return $this->hasOne(BarangMasuk::class, 'supplier_id');
    }
    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
