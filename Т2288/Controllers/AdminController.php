<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors(['email' => 'Невалиден email или парола.']);
    }

    public function dashboard()
    {
        $admins = Admin::all();

        return view('admin.dashboard', compact('admins'));
    }
    
    public function add(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins',
        'password' => 'required|min:6|confirmed',
    ]);

    $admin = Admin::create($data);

    return redirect()->route('admin.dashboard');
}


    // ... (допълнителни методи за CRUD операции)
}
