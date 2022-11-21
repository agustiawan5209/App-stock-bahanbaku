<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pesan
 *
 * @property int $id
 * @property string $kode_pesan
 * @property string $tgl_pemesanan
 * @property int $detail_pesanan_id
 * @property int $supplier_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\DetailPesanan|null $detail_pesanan
 * @method static \Illuminate\Database\Eloquent\Builder|Pesan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pesan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pesan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pesan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesan whereDetailPesananId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesan whereKodePesan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesan whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesan whereTglPemesanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pesan extends Model
{
    protected $table = "pesans";
    protected $primary_key = "id";
    protected $fillable = ['kode_pesan','kode_transaksi', 'detail_pesanan_id', 'supplier_id', 'status', 'tgl_pemesanan'];
    use HasFactory;
    public function detail_pesanan(){
        return $this->belongsTo(DetailPesanan::class);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
