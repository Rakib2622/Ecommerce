<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'category_id',  // Ensure this field is present in your database
    ];

    // Relationship to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
