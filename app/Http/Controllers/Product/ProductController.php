<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index');
    }

    public function store(Request $request) {
        $name = $request->input('name');
        $price = $request->input('price');
        $product = new \App\Models\Product();
        $product->name = $name;
        $product->price = $price;
        $product->save();

        return response()->json([
            'message' => 'Product created successfully',
        ]);
    }
}
