<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use Inertia\Inertia;
use App\Helper\Carts;
use App\Models\product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class cartController extends Controller
{
    public function index(Cart $cart, Request $request)
    {
        $cartItem = Carts::getCartItems();
        $id = Arr::pluck($cartItem, 'product_id');
        $products = product::query()->whereIn('id', $id);
        $cartItems = Arr::keyBy($cartItem, 'product_id');
        // dd($cartItems);
        $total = 0;
        foreach ($products as $product) {
            $total += $product->price * $cartItems[$product->id]['quantity'];
        }
        return Inertia::render(
            'productview',
            [
                'cart' => $cartItem
            ]
        );
    }
    public function add(Request $request, product $product)
    {
        $quantity = $request->post('quantity', 1);
        $user = $request->user();
        if ($user) {
            $cartItem = Cart::where(['user_id' => $user->id, 'product_id' => $product->id])->first();
            if ($cartItem) {
                $cartItem->quantity += $quantity;
                $cartItem->update();
            } else {
                // dd($product);
                $data = [
                    'user_id' => $request->user()->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity
                ];
                Cart::create($data);
            }
            // return response()->json([
            //     'count' => Carts::getCartItemsCount(),
            // ]);
        } else {
            $unauthorizedCartItems = Carts::getCookiesCartItems();
            $productFound = false;
            foreach ($unauthorizedCartItems as $items) {

                if ($items['product_id'] === $product->id) {

                    $items['quantity'] += $quantity;
                    $productFound = true;
                    break;
                }
            }
            if (!$productFound) {

                $cartItem[] = [
                    'user_id' => 'null',
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price
                ];
            }
            // Cookie::queue('cart_items', json_encode($cartItem), 60 * 24 * 30);
            // return response([
            //     'count' => Carts::getCountFromItems($cartItem)
            // ]);
        };
    }
}
