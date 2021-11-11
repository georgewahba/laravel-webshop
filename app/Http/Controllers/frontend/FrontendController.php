<?php

namespace App\Http\Controllers\frontend;

use App\Models\Stores;
use App\Models\Product;
use App\Models\Catagory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::where('trending', '1')->take(15)->get();
        $catagory = Catagory::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('products', 'catagory'));
    }

    public function catagory()
    {
        $catagory = Catagory::where('status' , '0')->get();
        return view('frontend.catagory', compact('catagory'));
    }

    public function viewCat($slug)
    {
        if (Catagory::where('slug' , $slug)->exists()) {
            $catagory = Catagory::where('slug' , $slug)->first();
            $products = Product::where("cate_id", $catagory->id)    ->where('status', '0')->get();
            return view('frontend.products.index', compact('catagory', 'products'));
        } else {
            return redirect('/')->with('status', 'link broken');
        }
    }

    public function product_view($slug, $name)
    {
        if (Catagory::where('slug' , $slug)->exists()) {
            if (Product::where('name' , $name)->exists()) {
                $products = Product::where('name' , $name)->first();
                return view('frontend.products.view', compact('products'));
            }
        } else {
            return redirect('/')->with('status', 'link broken');
        }
    }

    public function show_stores()
    {
        $stores = Stores::all();
        return view('frontend.stores.index', compact('stores'));
    }
}
