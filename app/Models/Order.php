<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'order_no', 'total', 'address', 'phone', 'msg'];

    public function items(){
        return $this->hasMany(OrderItem::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function scopeFilter($query, $filter){
        $query->when($filter['search']??false, function($query, $search){
                $query->where(function ($query) use($search){
                    $query->where('order_no', 'LIKE', '%'.$search.'%')
                      ->orWhere('id', 'LIKE', '%'.$search.'%')
                      ->orWhere('created_at', 'LIKE', '%'.$search.'%')
                      ->orWhere('total', 'LIKE', '%'.$search.'%');
                });
        });
    }
}
