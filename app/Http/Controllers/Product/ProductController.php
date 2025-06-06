<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function store(Request $request)
    {   
        $name = $request->input('name');
        $price = $request->input('price');
        $product = new Product();
        $product->name = $name;
        $product->price = $price;
        $product->save();
        
        return response()->json([
            'message' => 'Product created successfully',
        ]);
    }
}
