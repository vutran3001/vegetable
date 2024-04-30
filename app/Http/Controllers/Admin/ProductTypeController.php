<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;

class ProductTypeController extends Controller
{
    public function index(){
        $product_types = ProductType::all();
        return view('admin.product_type.index',compact('product_types'));
    }

    public function create(){
        return view('admin.product_type.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255|unique:product_types',
        ]);

        // Create a new product type record
        $productType = new ProductType();
        $productType->name = $request->name;
        if(!$productType->save()){
            request()->session()->flash('error', 'An error occurred, please try again.');
            return redirect()->route('product_type.create');
        }
        // Redirect back with success message
        request()->session()->flash('success', 'Product type added successfully.');
        return redirect()->route('product_type.index');
    }

    public function show($id){

    }

    public function edit($id){
        $product_type = ProductType::find($id);
        return view('admin.product_type.edit',compact('product_type'));
    }

    public function update(Request $request, $id){
         // Validate the form data
         $request->validate([
            'name' => 'required|string|max:255|unique:product_types',
        ]);

        // Create a new product type record
        $product_type = ProductType::find($id);
        $product_type->name = $request->name;
        if(!$product_type->save()){
            request()->session()->flash('error', 'An error occurred, please try again.');
            return redirect()->route('product_type.edit');
        }
        // Redirect back with success message
        request()->session()->flash('success', 'Product type update successfully.');
        return redirect()->route('product_type.index');
    }

    public function destroy($id){
        $product_type = ProductType::find($id);
        if(!$product_type->delete()){
            request()->session()->flash('error', 'An error occurred, please try again.');
            return redirect()->route('product_type.index');
        }
          // Redirect back with success message
          request()->session()->flash('success', 'Product type delete successfully.');
          return redirect()->route('product_type.index');
    }


}
