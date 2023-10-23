<?php

namespace App\Http\Controllers\Api\Auth;

use Inertia\Inertia;
use App\Helper\Carts;
use Inertia\Response;
use App\Models\product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(product $products, $slug, Request $request): Response
    {
        $product = $products->where('slug', $slug)->firstOrFail();
        $user = $request->user();
        $cartItems = Carts::getCartItems();
        $id = Arr::pluck($cartItems, 'product_id');
        $products = product::get()->whereIn('id', $id);
        $cartItems = Arr::keyBy($cartItems, 'product_id');

        return Inertia::render(
            'productview',
            [
                'user' => $user,
                'products' => $product,
                'cart' => $cartItems
            ]
        );
    }
}
