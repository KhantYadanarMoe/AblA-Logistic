<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'thumbnail', 'name', 'quantity', 'price'];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function completedOrder()
    {
        return $this->belongsTo(OrderCompleted::class, 'order_id', 'c_id');
    }
}
