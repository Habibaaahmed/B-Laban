<?php


namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with('reviews.user')->findOrFail($id);
        
        return view('product.show', compact('product'));
    }


}
