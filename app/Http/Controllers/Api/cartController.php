<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use Inertia\Inertia;
use App\Helper\Carts;
use App\Models\product;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use PhpParser\Node\Expr\FuncCall;

class cartController extends Controller
{
    public function index(Cart $cart, Request $request)
    {
        $user = $request->user();

        $cartItem = Carts::getCartItems();
        $id = Arr::pluck($cartItem, 'product_id');
        $products = product::get()->whereIn('id', $id);
        $cartItems = Arr::keyBy($cartItem, 'product_id');
        $cartItemer = Arr::keyBy($cartItem, 'id');


        // dump($cartItem);
        // $cartItem->each(function ($cartItem, $pros) {
        //     dd($pros, $cartItem);
        // });
        // $pro = product::where('id');
        // dd($pro);
        // $quantity = array();
        // foreach ($cartItem as $key => $array) {
        //     foreach ($array as $key1 => $value) {
        //         $real = $array[$key1]['quantity'];
        //         dump($real);
        //     }
        // }
        $quantity = [];
        foreach ($cartItem as   $key => $value) {
            $quantity[] =   [$key,  $value['quantity']];
            // dump($quantity);
        }
        $total = 0;
        foreach ($products as $product) {
            $total += $product->price * $cartItems[$product->id]['quantity'];
        }
        return Inertia::render(
            'cart',
            [
                'user' => $user,
                'product' => $products,
                'cart' => $cartItems,
                'total' => $total,
                'count' => $cartItems,
                'q' => $quantity
            ]
        );
    }
    public function show(Cart $cart)
    {
        return Inertia::render('cart', [

            'getCart' => $cart
        ]);
    }

    public function add(Request $request, product $product)
    {
        $quantity = $request->post('quantity', 1);
        $user = $request->user();
        // dd($user);
        if ($user) {
            $cartItem = Cart::where(['user_id' => $user->id, 'product_id' => $product->id])->first();
            if ($cartItem) {
                if ($cartItem['product_id'] === $product->id) {
                    $product->stock -= 1;
                    if ($product->stock < 0) {
                        return;
                    }
                    $product->update();
                }
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
        } else {
            $cartItem = json_decode($request->cookie('carts', '[]'), true);
            $productFound = false;
            foreach ($cartItem as &$items) {

                if ($items['product_id'] === $product->id) {
                    if ($items['product_id'] === $product->id) {
                        $product->stock -= 1;
                        if ($product->stock < 0) {
                            return;
                        }
                        $product->update();
                    }
                    $items['quantity'] += $quantity;
                    $productFound = true;
                    break;
                }
            }
            if (!$productFound) {

                $cartItem[] = [
                    'user_id' => null,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price
                ];
            }

            Cookie::queue('carts', json_encode($cartItem), 60 * 24 * 30);

            // return response(['count' => Carts::getCountFromItems($cartItem)]);
        };
    }


    public function checkout(Request $request)
    {

        $cartItems = Carts::getCartItems();
        $id = Arr::pluck($cartItems, 'product_id');
        $products = product::get()->whereIn('id', $id);
        $cartItems = Arr::keyBy($cartItems, 'product_id');
        // return [$products, $cartItems];
        $total = 0;
        $user = $request->user();

        foreach ($products as $product) {
            $total += $product->price * $cartItems[$product->id]['quantity'];
        }
        return Inertia::render('checkout/checkout', [
            'total' => $total,
            'user' => $user,

        ]);
    }


    public function destroy(Request $request, product $product)
    {
        $user = $request->user();
        if ($user) {
            $cartItem = Cart::query()->where(['user_id' => $user->id])->first();
            if ($cartItem) {
                $cartItem->delete();
                return back()->with('success', 'deleted');
            }
        }
    }
}
