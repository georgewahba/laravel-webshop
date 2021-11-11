<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function view($id)
    {
        $user = User::find($id);
        return view('admin.users.view', compact('user'));
    }

    public function birthday()
    {
        //calculate tomorrow's date
        $tomorrow = date('m-d', strtotime('tomorrow'));

        $users = User::where('date_of_birth', 'like', '%'.$tomorrow.'%')->get();

        return view('admin.users.birthday', compact('users'));
    }
    
}
