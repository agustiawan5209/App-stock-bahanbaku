<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PesanCustomer
 *
 * @property int $id
 * @property string $kode_pesan
 * @property string $tgl_pemesanan
 * @property string $jumlah_pesanan
 * @property int $customer_id
 * @property string $sub_total
 * @property int $transaksi_id
 * @property string $status
 * @property string $alamat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Customer|null $customer
 * @property-read \App\Models\Transaksi $transaksi
 * @method static \Illuminate\Database\Eloquent\Builder|PesanCustomer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PesanCustomer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PesanCustomer query()
 * @method static \Illuminate\Database\Eloquent\Builder|PesanCustomer whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanCustomer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanCustomer whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanCustomer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanCustomer whereJumlahPesanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanCustomer whereKodePesan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanCustomer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanCustomer whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanCustomer whereTglPemesanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanCustomer whereTransaksiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanCustomer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PesanCustomer extends Model
{
    protected $table='pesan_customers';
    protected $fillable = ['kode_pesan', 'tgl_pemesanan', 'jumlah_pesanan','customer_id', 'sub_total','transaksi_id', 'status', 'alamat'];
    use HasFactory;
    public function customer(){
        return $this->belongsTo(Customer::class ,'customer_id');
    }
    public function transaksi(){
        return $this->belongsTo(Transaksi::class ,'transaksi_id');
    }
}
