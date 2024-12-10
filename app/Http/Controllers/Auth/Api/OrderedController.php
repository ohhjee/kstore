<?php

namespace App\Http\Controllers\Auth\Api;

use Inertia\Inertia;
use App\Helper\Carts;
use App\Models\Payment;
use App\Models\product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class OrderedController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $payment = Payment::where('user_id', $user->id)->get();
        // $pin = Payment::get();
        // // foreach ($pin as $pins) {
        // # code...
        // $date = Carbon::parse($pin->created_at)->format('d M Y h:i:m');
        // }


        // dd($date);
        $user = $request->user();
        $cartItems = Carts::getCartItems();
        $id = Arr::pluck($cartItems, 'product_id');
        $products = product::get()->whereIn('id', $id);
        $cartItems = Arr::keyBy($cartItems, 'product_id');
        // $date = Carbon::parse($pin->created_at)->format('d M Y h:i:m');


        return Inertia::render('Order/order', ['user' => $user, 'cart' => $cartItems, 'payment' => $payment]);
    }
}
