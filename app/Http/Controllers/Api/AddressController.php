<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use Inertia\Inertia;
use App\Helper\Carts;
use Inertia\Response;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unicodeveloper\Paystack\Paystack;
use App\Http\Resources\AddressResource;
use App\Http\Requests\Auth\AddressRequest;
use App\Models\User;

// TODO: page disappearing after reloading
class AddressController extends Controller
{
    public $paystack;

    public function __construct()
    {
        $this->paystack = new Paystack();
    }
    public function index(AddressRequest $address)
    {
        // dd("hey-update");

        $request = \request();
        $user = $request->user()->id;
        $userAddress =  $address->validated();
        $getUserAddress = Address::where('user_id', $user)->exists();
        // $getUserAddress = Address::where('user_id', $userAddress['user_id'])->exists();

        if ($getUserAddress) {
            try {
                // dd('hey-update');
            } catch (\Throwable $th) {
                throw $th;
            }
        } else {
            Address::create($userAddress);
        }
        // return Inertia::render('checkout/checkout');
    }
    public function show(Address $address, Request $request)
    {

        // $userAddress = $request->user()->id;
        $user = User::get();
        list($products, $cartItems) = Carts::getProductAndCartItems();
        $cartCount = Cart::count();
        $user = $request->user();
        $get_user_address = $address->where('user_id', $user->id)->first();
        // $getUserAddress = $address->get();
        $total = 0;
        $reference = $this->paystack->genTranxRef();

        foreach ($products as $product) {
            $total += $product->price * $cartItems[$product->id]['quantity'];
        }

        // $userAddress =  $address->validated();
        // $getUserAddress = Address::where('user_id', $user)->exists();
        // if ($getUserAddress) {
        //     try {
        //         // dd('hey-update');
        //     } catch (\Throwable $th) {
        //         throw $th;
        //     }
        // } else {
        //     $userAddress->update();
        // }

        return Inertia::render('checkout/checkout', [
            // 'address' => $get_user_addresss,
            'user' => $user,
            'total' => $total,
            'reference' => $reference,
            'count' => $cartCount

        ]);
    }
}
