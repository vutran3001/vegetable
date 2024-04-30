<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    public function create(){
        $product_types = ProductType::all();
        return view('admin.product.create',compact('product_types'));
    }

}
