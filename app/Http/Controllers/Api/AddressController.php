<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\User;
use Inertia\Inertia;
use App\Helper\Carts;
use App\Models\Order;
use Inertia\Response;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unicodeveloper\Paystack\Paystack;
use App\Http\Resources\AddressResource;
use App\Http\Requests\Auth\AddressRequest;

// TODO: page disappearing after reloading
class AddressController extends Controller
{
    public $paystack;

    public function __construct()
    {
        $this->paystack = new Paystack();
    }
    public function methods(Request $request)
    {
        $request = \request();
        $user = $request->user()->id;
        list($products, $cartItems) = Carts::getProductAndCartItems();
        $total = 0;
        foreach ($products as $product) {
            $total += $product->price * $cartItems[$product->id]['quantity'];
        }
        // $data = $request->validate([
        //     'user_id' => auth()->user()->id,
        //     'total' => $total,
        //     'pay_method' => $this->paystack->genTranxRef()
        // ]);
        // dd($data);
        $orderData = ['total' => $total, 'user_id' => $user];
        Order::create($orderData);
    }
    public function index(AddressRequest $address)
    {
        // dd("hey-update");

        $request = \request();
        $user = $request->user()->id;
        $userAddress =  $address->validated();
        $getUserAddress = Address::where('user_id', $user)->exists();
        // dd($getUserAddress->exists());
        if ($getUserAddress) {
            dd("address don dey database");
        } else {
            Address::create($userAddress);
        }
    }
    public function show(Address $address, Request $request)
    {
        $user = User::get();
        list($products, $cartItems) = Carts::getProductAndCartItems();
        $cartCount = Cart::count();
        $user = $request->user();
        $get_user_address = $address->where('user_id', $user->id)->first();
        // $getUserAddress = $address->get();
        // dd($get_user_address);
        $total = 0;
        $reference = $this->paystack->genTranxRef();

        foreach ($products as $product) {
            $total += $product->price * $cartItems[$product->id]['quantity'];
        }
        return Inertia::render('checkout/checkout', [
            // 'address' => $get_user_addresss,
            'user' => $user,
            'total' => $total,
            'reference' => $reference,
            'count' => $cartCount

        ]);
    }
}
