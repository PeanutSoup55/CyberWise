<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        $total = User::count(); 
        return view('admin.users.home', compact('users', 'total'));
    }

    public function delete($id)
    {
        $users = User::findOrFail($id)->delete();
        if ($users) {
            session()->flash('success', 'User Deleted Successfully');
            return redirect(route('admin/users'));
        } else {
            session()->flash('error', 'User Not Delete successfully');
            return redirect(route('admin.users'));
        }
    }
}
