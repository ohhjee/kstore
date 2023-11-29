<?php

namespace App\Http\Controllers\Auth\Api;

use App\Models\Cart;
use Inertia\Inertia;
use App\Helper\Carts;
use Inertia\Response;
use App\Models\product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request, product $products, Cart $cart): Response
    {
        $product = $products->limit(12)->get();
        // if (empty($products)) {
        // }
        $user = $request->user();
        $cartItems = Carts::getCartItems();
        $id = Arr::pluck($cartItems, 'product_id');
        $products = product::get()->whereIn('id', $id);
        $cartItems = Arr::keyBy($cartItems, 'product_id');
        return Inertia::render("Home", [
            'user' => $user,
            'product' => $product,
            'cart' => $cartItems
        ]);
    }
}
