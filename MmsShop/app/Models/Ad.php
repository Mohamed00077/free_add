<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
   protected $fillable = [
    'user_id',
    'title',
    'category', 
    'description',
    'price',
    'location',
    'condition',
    'photo',
];

public function user()
{
    return $this->belongsTo(User::class);
}

public function scopeSearch($query, $search)
{
    return $query->where('title', 'LIKE', "%{$search}%")
                 ->orWhere('category', 'LIKE', "%{$search}%"); 
}
}