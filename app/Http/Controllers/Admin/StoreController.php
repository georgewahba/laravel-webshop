<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stores;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Stores::all();
        return view('admin.stores.index', compact('stores'));
    }

    public function add()
    {
        $store = Stores::all();
        return view('admin.stores.add', compact('store'));
    }

    public function insert(Request $request)
    {
        $store = new Stores();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time() . '.' .$ext;
            $file->move('assets/uploads/catagory',$filename);
            $store->image = $filename;
        }
        $store->name = $request->input('name');
        $store->adress = $request->input('adress');
        $store->phone = $request->input('phone');
        $store->save();

        return redirect('stores')->with('status', 'store added');

    }

    public function edit($id)
    {
        $store = Stores::find($id);
        return view('admin.stores.edit', compact('store'));
    }

    public function update(Request $request, $id)
    {
        $store = Stores::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time() . '.' .$ext;
            $file->move('assets/uploads/catagory',$filename);
            $store->image = $filename;
        }
        $store->name = $request->input('name');
        $store->adress = $request->input('adress');
        $store->phone = $request->input('phone');
        $store->update();

        return redirect('stores')->with('status', 'store updated');
    }

    public function destroy($id)
    {
        $store = Stores::find($id);
        $store->delete();
        return redirect('stores')->with('status', 'store deleted');
    }
}
