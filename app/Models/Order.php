<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    public function transaction() {
        return $this->hasOne(Transaction::class);
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    public function shipping() {
        return $this->hasOne(Shipping::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['id', 'user_id', 'subtotal' , 'discount' , 'tax', 'total', 'firstname', 'lastname', 'mobile', 'email', 'line1', 'line2', 'city', 'province', 'country', 'zipcode', 'status', 'is_shipping_different', 'updated_at' ,'created_at', 'delivered_date', 'canceled_date'];
    
}
