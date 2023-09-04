<?php

namespace App\Http\Controllers\Admin;

use App\Models\product;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = UserService::index();
        $product = product::get();
        $proCount = $product->count();
        $count = $user->count();

        // dd($count);

        return view('admin.dashboard.dashboard', compact('count', 'user', 'product'));
    }
    public function create()
    {
    }
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
