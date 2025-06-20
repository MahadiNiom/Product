<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    protected $fillable = ['name'];
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category')
            ->withTimestamps();
    }
}
