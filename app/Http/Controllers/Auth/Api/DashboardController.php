<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(Request $request, product $products): Response
    {
        $product = $products->limit(12)->get();
        // dd($product['title']);
        return Inertia::render("Home", [
            'product' => $product
        ]);
    }
    public function AuthenticatedUser(Request $request): Response
    {
        $user = $request->user();

        if ($user->id) {
            // dd($user);
            return Inertia::render("Home", [
                'user' => $user,

            ]);
        }
    }
}
