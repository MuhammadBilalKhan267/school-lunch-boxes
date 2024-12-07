<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function get(){
        return View("pages.order");
    }
    public function store(Request $request)
    {
        // Server-side validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{11}$/', // Validate 11 digits
            'lunch-box' => 'required|string',
        ]);

        // Create a new order
        $order = Order::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'lunchbox' => $validatedData['lunch-box'],
        ]);

        // Return response
        return response()->json([
            'success' => true,
            'message' => 'Your order has been successfully submitted!',
        ]);
    }
}

