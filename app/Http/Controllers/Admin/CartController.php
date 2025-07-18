<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
         $cartItems = Cart::with(['product', 'user'])
            ->orderBy('product_id', 'asc') // sort by product or price if needed
            ->get();

        return view('admin.cart.index', compact('cartItems'));
    }
}
