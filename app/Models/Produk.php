<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Produk
 *
 * @property int $id
 * @property string $kode_stock_produk
 * @property string $tgl_stock_produk
 * @property int $jumlah_stock_produk
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Stock|null $Stock
 * @method static \Database\Factories\ProdukFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produk query()
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereJumlahStockProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereKodeStockProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereTglStockProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Produk extends Model
{
    protected $table = 'produks';
    protected $primary_key = 'id';
    protected $fillable = ['kode_stock_produk', 'tgl_stock_produk','jumlah_stock_produk'];
    use HasFactory;

    public function Stock()
    {
        return $this->hasOne(Stock::class);
    }
}
