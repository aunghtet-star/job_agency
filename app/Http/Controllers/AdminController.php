<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function profile(){
        return view('admin.details');
    }
    public function profileEdit(){
        $id = Auth::id();
        $data = User::where('id', $id)->findOrFail($id);
        return view('admin.index', compact('data'));
    }

    public function userList(){
        $data = User::all();
        return view('admin.users.list', compact('data'));
    }

    public function createPage()
    {
        return view('admin.users.create');
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $id = Auth::id();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|max:255',
            'phone' => 'required',
            'address' => 'required|string',
            'role' => 'required|in:admin,agent,user',
        ]);

        Log::info("Role:" . $request->role);

        if(Auth::check()) {
            //Create a new user

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'role' => $request->role,
                'password' => Hash::make($request->password)
              ]);

            return redirect()->route('user#list')->with('success', 'User Created');
        }

        //if the user is not authenticated, redirect to the login page
        return redirect()->route('login');
    }
}
