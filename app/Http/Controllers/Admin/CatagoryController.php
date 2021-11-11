<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use App\Http\Controllers\Controller;

class CatagoryController extends Controller
{
    public function index()
    {
        $catagory = Catagory::all();
        return view('admin.catagory.index', compact('catagory'));
    }
    public function add()
    {
        return view('admin.catagory.add');
    }
    public function insert(Request $request)
    {
        $catagory = new Catagory();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time() . '.' .$ext;
            $file->move('assets/uploads/catagory',$filename);
            $catagory->image = $filename;
        }

        $catagory->name = $request->input('name');
        $catagory->slug = $request->input('slug');
        $catagory->description = $request->input('description');
        $catagory->status = $request->input('status') == True ? '1' : '0';
        $catagory->popular = $request->input('popular') == True ? '1' : '0';
        $catagory->meta_title = $request->input('meta_title');
        $catagory->meta_keywords = $request->input('meta_keywords');
        $catagory->meta_descrip = $request->input('meta_description');
        $catagory->name = $request->input('name');
        $catagory->save();
        return redirect('dashboard')->with('status', 'catagory added');
    }

    public function edit($id)
    {
        $catagory = catagory::find($id);
        return view('admin.catagory.edit', compact('catagory'));
    }

    public function update(Request $request, $id)
    {
        $catagory = catagory::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time() . '.' .$ext;
            $file->move('assets/uploads/catagory',$filename);
            $catagory->image = $filename;
    }
        $catagory->name = $request->input('name');
        $catagory->slug = $request->input('slug');
        $catagory->description = $request->input('description');
        $catagory->status = $request->input('status') == True ? '1' : '0';
        $catagory->popular = $request->input('popular') == True ? '1' : '0';
        $catagory->meta_title = $request->input('meta_title');
        $catagory->meta_keywords = $request->input('meta_keywords');
        $catagory->meta_descrip = $request->input('meta_description');
        $catagory->name = $request->input('name');
        $catagory->update();
        return redirect('dashboard')->with('status', 'catagory updated');
        
    }

    public function destroy($id) 
    {
        $catagory = catagory::find($id);
        $catagory->delete();
        return redirect('catagories')->with('status', 'deleted');
    }
}
