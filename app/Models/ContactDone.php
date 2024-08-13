<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDone extends Model
{
    use HasFactory;

    public function scopeFilter($query, $filter){
        $query->when($filter['search']??false, function($query, $search){
                $query->where(function ($query) use($search){
                    $query->where('name', 'LIKE', '%'.$search.'%')
                      ->orWhere('message', 'LIKE', '%'.$search.'%');
                });
        });
    }
}
