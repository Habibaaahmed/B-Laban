<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{ 
    
    public function destroy(Review $review)
    {
       
        if ($review->user_id === Auth::id()) {
            $review->delete();
            return response()->json(['success' => true]);
        }
        
        return response()->json(['success' => false], 403);
    }
    public function store(Request $request, $productId)
    {
        // Validate the review data
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:255',
        ]);

        // Create the review
        Review::create([
            'product_id' => $productId,
            'user_id' =>  Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);
        

        // Redirect back to the product page with a success message
        return redirect()->route('product.show', $productId)->with('success', 'Review added successfully.');
    }
}
