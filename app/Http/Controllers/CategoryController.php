<?php


namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::with('products')->findOrFail($id);
        return view('homescreen.show', compact('category'));
    }
    public function search(Request $request, $categoryId)
    {
        $query = $request->input('query');

        $products = Product::where('category_id', $categoryId)
                            ->where('name', 'LIKE', "%{$query}%")
                            ->get();

        return response()->json(['products' => $products]);
    }


}