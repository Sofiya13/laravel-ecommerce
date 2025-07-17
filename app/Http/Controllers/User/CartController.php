<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())
                         ->with('product')
                         ->get();

        return view('user.cart.index', compact('cartItems'));
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cartItem = Cart::where('user_id', auth()->id())
                        ->where('product_id', $id)
                        ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $id,
                'quantity' => 1
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = Cart::where('user_id', auth()->id())
                        ->where('product_id', $id)
                        ->firstOrFail();

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return back()->with('success', 'Cart updated successfully!');
    }

    public function remove($id)
    {
        Cart::where('user_id', auth()->id())
            ->where('product_id', $id)
            ->delete();

        return back()->with('success', 'Item removed from cart!');
    }

    public function checkout()
    {
        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
}
