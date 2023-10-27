<?php

namespace App\Http\Controllers\Api;

use Inertia\Inertia;
use App\Helper\Carts;
use Inertia\Response;
use App\Models\product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Http\Requests\Auth\AddressRequest;
use App\Models\Address;
use Unicodeveloper\Paystack\Paystack;


class OrderController extends Controller
{
    public $paystack;

    public function __construct()
    {
        $this->paystack = new Paystack();
    }
    public function index(Request $request): Response
    {
        $userAddress = $request->user()->id;
        $user = $request->user();
        $cartItems = Carts::getCartItems();
        $id = Arr::pluck($cartItems, 'product_id');
        $products = product::get()->whereIn('id', $id);
        $cartItems = Arr::keyBy($cartItems, 'product_id');

        // $getUserAddress = Address::get()->whereIn('user_id', $userAddress)->first();
        // return [$products, $cartItems];
        $reference = $this->paystack->genTranxRef();
        // dd($reference);

        $total = 0;
        foreach ($products as $product) {
            $total += $product->price * $cartItems[$product->id]['quantity'];
        }
        return Inertia::render('checkout/checkout', [
            'user' => $user,
            'total' => $total,
            'reference' => $reference
        ]);
    }


    // public function checkout()
    // {

    //     $cartItems = Carts::getCartItems();
    //     $id = Arr::pluck($cartItems, 'product_id');
    //     $products = product::get()->whereIn('id', $id);
    //     $cartItems = Arr::keyBy($cartItems, 'product_id');
    //     // return [$products, $cartItems];
    //     $total = 0;
    //     foreach ($products as $product) {
    //         $total += $product->price * $cartItems[$product->id]['quantity'];
    //     }
    //     return Inertia::render('checkout/checkout', [
    //         'total' => $total
    //     ]);
    // }
}
