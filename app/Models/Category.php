<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function featuredProduct()
    {
        return $this->products()->first(); // Assuming you want the first product as a representative
    }
}
