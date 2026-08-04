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
    'phone',
    'condition',
    'photo',
];

public function user()
{
    return $this->belongsTo(User::class);
}

public function scopeSearch($query, $search)
{
    return $query->where(function ($q) use ($search) {
    $q->where('title', 'LIKE', "%{$search}%")
      ->orWhere('category', 'LIKE', "%{$search}%")
      ->orWhere('location', 'LIKE', "%{$search}%")
      ->orWhere('price', 'LIKE', "%{$search}%");
});
}
}