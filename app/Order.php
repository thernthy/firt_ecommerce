<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'order_date', 'status', 'total_amount', 'contact_number', 'telegram_name', 'payment_screen_short', 'shipping_address', 'created_at', 'updated_at'
    ];

    // Define relationships
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
