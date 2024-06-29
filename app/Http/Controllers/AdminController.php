<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();

        return view('admin.category',compact('data'));        
    }
    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->addSuccess('Category added successfully');
        return redirect()->back();

    }
    public function edit_category($id){
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));

    }
    public function update_category(Request $request, $id){
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->updated('Category');
        return redirect('view_category');
    }
    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        toastr()->deleted('Category');
        return redirect()->back();
    }


    public function view_product()
    {
        $product = Product::all();

        return view('admin.product',compact('product'));        
    }

    public function show_add_product(){
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    public function add_product(Request $request){
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        // Create a new product instance
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id; // Use category_id instead of category
    
        // Handle the image upload
        $image = $request->file('image');
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $product->image = $imagename;
        }
    
        // Save the product to the database
        $product->save();
    
        // Flash success message and redirect back
        toastr()->addSuccess('Product added successfully!');
        return redirect()->back();
    }


    public function edit_product($id){
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.edit_product',compact('product','category'));

    }
    public function update_product(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        
        
        // Handle the image upload
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($product->image && file_exists(public_path('products/' . $product->image))) {
                unlink(public_path('products/' . $product->image));
            }
    
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);
            $product->image = $imagename;
        }
    
        $product->save();
    
        toastr()->success('Product updated successfully');
        return redirect('view_product');
    }
    
    public function delete_product($id){
        $product = Product::find($id);
        $image_path = public_path('products/'.$product->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $product->delete();
        toastr()->deleted('Product');
        return redirect()->back();
    }
    public function search_product(Request $request)
{
    $search = $request->input('search'); // Make sure the input name matches the form input
    $product = Product::where('title', 'LIKE', '%' . $search . '%')
                       ->orWhere('description', 'LIKE', '%' . $search . '%')
                       ->orWhere('category', 'LIKE', '%' . $search . '%')
                       ->get();

    return view('admin.product', compact('product'));
}

}
