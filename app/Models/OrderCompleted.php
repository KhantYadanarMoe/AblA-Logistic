<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCompleted extends Model
{
    use HasFactory;

    protected $fillable = ['c_id' ,'user_id', 'order_no', 'total', 'address', 'phone', 'msg'];
    // 'c_id' ,

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function completedOrderDetails()
    {
        return $this->hasMany(CompletedOrderDetail::class, 'completed_order_id');
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
