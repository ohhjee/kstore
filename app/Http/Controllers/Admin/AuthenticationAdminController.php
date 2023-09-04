<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
// use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticationAdminController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }
    public function store(Request $request)
    {

        $adminCredentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|max:225'
        ]);
        if (!Auth::guard('admin')->attempt($adminCredentials)) {
            return back()->with('message', 'invalid credentials');
        }
        $verify = Auth::guard('admin')->attempt($adminCredentials);

        if ($verify) return redirect()->intended('admin/product');
    }
}
