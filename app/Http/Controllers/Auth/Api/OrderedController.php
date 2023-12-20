<?php

namespace App\Http\Controllers\Auth\Api;

use Inertia\Inertia;
use App\Helper\Carts;
use App\Models\product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderedController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $user = $request->user();
        $cartItems = Carts::getCartItems();
        $id = Arr::pluck($cartItems, 'product_id');
        $products = product::get()->whereIn('id', $id);
        $cartItems = Arr::keyBy($cartItems, 'product_id');

        return Inertia::render('Order/order', ['user' => $user, 'cart' => $cartItems]);
    }
}
