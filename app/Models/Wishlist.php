<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    // app/Models/Wishlist.php

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    protected $fillable = ['user_id', 'thumbnail', 'name', 'price', 'desc'];

    public function scopeFilter($query, $filter){
        $query->when($filter['search']??false, function($query, $search){
                $query->where(function ($query) use($search){
                    $query->where('name', 'LIKE', '%'.$search.'%')
                      ->orWhere('desc', 'LIKE', '%'.$search.'%');
                });
        });
    }
}
