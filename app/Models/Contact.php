<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['firstName', 'lastName', 'message', 'phone', 'email'];

    public function scopeFilter($query, $filter){
        $query->when($filter['search']??false, function($query, $search){
                $query->where(function ($query) use($search){
                    $query->where('firstName', 'LIKE', '%'.$search.'%')
                      ->orWhere('message', 'LIKE', '%'.$search.'%');
                });
        });
    }
}
