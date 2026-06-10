<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = false;
    protected $fillable = ['nom_category'];

    public function ads()
    {
        return $this->hasMany(Ad::class, 'categories_id');
    }
}