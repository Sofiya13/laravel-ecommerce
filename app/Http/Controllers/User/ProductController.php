<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('user.shop.index', compact('products'));
    }

    public function home()
    {
        $products = Product::latest()->get();
        return view('user.home', compact('products'));
    }
    
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('user.shop.show', compact('product'));
    }
}

