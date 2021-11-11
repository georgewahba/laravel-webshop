<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Catagory;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function add()
    {
        $catagory = Catagory::all();
        return view('admin.products.add', compact('catagory'));
    }

    public function insert(Request $request)
    {
        $product = new Product();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time() . '.' .$ext;
            $file->move('assets/uploads/catagory',$filename);
            $product->image = $filename;
        }

        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->qty = $request->input('qty');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status') == True ? '1' : '0';
        $product->trending = $request->input('trending') == True ? '1' : '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_descrip = $request->input('meta_description');
        $product->save();
        return redirect('products')->with('status', 'product added');
  
        
    }

    
    public function edit($id)
    {
        $product = product::find($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = product::find($id);;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time() . '.' .$ext;
            $file->move('assets/uploads/catagory',$filename);
            $product->image = $filename;
        }

        $product->name = $request->input('name');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->qty = $request->input('qty');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status') == True ? '1' : '0';
        $product->trending = $request->input('trending') == True ? '1' : '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_descrip = $request->input('meta_description');
        $product->update();
        return redirect('products')->with('status', 'product updated');
  
        
    }

    public function destroy($id) 
    {
        $catagory = product::find($id);
        $catagory->delete();
        return redirect('products')->with('status', 'deleted');
    }
}
