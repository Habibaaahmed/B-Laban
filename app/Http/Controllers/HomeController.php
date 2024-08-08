<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Paginate the categories (e.g., 4 per page)
        $categories = Category::paginate(4);

        // Retrieve all products
        $dishes = Product::with('reviews')->paginate(3);

        return view('homescreen.index', compact('categories', 'dishes'));
    }
}


