<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; 
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    public function showOrderHistory()
    {
        $orders = Order::where('user_id', auth::id())->with('orderItems')->get();
        return view('cart', compact('orders'));
    }
}
