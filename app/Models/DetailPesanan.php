<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DetailPesanan
 *
 * @property int $id
 * @property string|null $produk
 * @property int $jumlah
 * @property int $sub_total
 * @property string $keterangan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPesanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPesanan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPesanan query()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPesanan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPesanan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPesanan whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPesanan whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPesanan whereProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPesanan whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPesanan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DetailPesanan extends Model
{
    protected $table = 'detail_pesanans';
    protected $fillable = ['produk', 'jumlah','sub_total', 'keterangan'];
    use HasFactory;
    use HasFactory;
}
