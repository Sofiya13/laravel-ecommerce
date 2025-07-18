<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('user.shop.index', compact('products'));
    }

     public function home(Request $request)
    {
        $query = Product::query();

        if ($request->filled('product_name')) {
            $query->where('product_name', 'LIKE', '%' . $request->product_name . '%');
        }

        $products = $query->get();

        return view('user.home', compact('products'));
    }
}