<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'id_order',
        'order_code',
        'id_user',
        'receiver',
        'phone',
        'address',
        'email',
        'code_coupon',
        'shipping_fee',
        'method',
        'status',
        // 'instructions',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'id_order';
    public function User()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function Cart()
    {
        return $this->hasMany(Cart::class, 'order_code', 'order_code');
    }
    public function Coupon()
    {
        return $this->belongsTo(Coupon::class, 'code_coupon', 'code');
    }
    public function Library()
    {
        return $this->hasMany(Library::class, 'id_product', 'id_product');
    }
}
