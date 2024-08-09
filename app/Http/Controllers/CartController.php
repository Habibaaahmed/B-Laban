<?php

/* namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.cart');
    }
} */
// app/Http/Controllers/CartController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Assuming you have a Product model
        $product = \App\Models\Product::find($productId);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true]);
    }
    public function removeFromCart(Request $request)
{
    $cart = session()->get('cart', []);
    $id = $request->input('id');

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);

        $total = array_reduce($cart, function($carry, $item) {
            return $carry + $item['price'] * $item['quantity'];
        }, 0);

        return response()->json(['success' => true, 'cart' => array_values($cart), 'total' => $total]);
    }

    return response()->json(['success' => false]);
}
public function checkout(Request $request)
{
    // Validate the request data
    $request->validate([
        'payment_method' => 'required|string',
        'size' => 'required|string',
    ]);

    $userId = auth()->id(); // Assuming you have user authentication
    $cart = session()->get('cart', []);

    // Calculate total amount
    $totalAmount = array_reduce($cart, function($carry, $item) {
        return $carry + $item['price'] * $item['quantity'];
    }, 0);

    // Create a new order
    $order = \App\Models\Order::create([
        'user_id' => $userId,
        'total_amount' => $totalAmount,
        'payment_method' => $request->input('payment_method'),
        'status' => 'pending',
        'size' => $request->input('size'),
    ]);

    // Add order items
    foreach ($cart as $productId => $item) {
        \App\Models\OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $productId,
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);
    }

    // Clear the cart
    session()->forget('cart');

    return response()->json(['success' => true, 'message' => 'Order placed successfully']);
}


}
