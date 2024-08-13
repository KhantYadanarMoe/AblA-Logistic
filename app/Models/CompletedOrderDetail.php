<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedOrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['completed_order_id' ,'thumbnail', 'name', 'quantity', 'price'];
}
