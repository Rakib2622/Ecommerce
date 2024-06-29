<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function show($id){
    $product = Product::find($id);
    return view('home.product_detail', compact('product'));
}
public function allProducts()
{
    $categories = Category::with('products')->get();
    return view('home.all_products', compact('categories'));
}



}
