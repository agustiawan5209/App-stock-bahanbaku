<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Payment
 *
 * @property int $id
 * @property int $user_id
 * @property string $name_card
 * @property string $metode
 * @property string $number_rek
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\PaymentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereMetode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereNameCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereNumberRek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUserId($value)
 * @mixin \Eloquent
 */
class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = ['user_id','name_card', 'metode', 'number_rek'];
    protected $hidden = ['user_id', 'metode', 'number_rek'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
