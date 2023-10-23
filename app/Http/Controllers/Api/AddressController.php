<?php

namespace App\Http\Controllers\Api;

use Inertia\Inertia;
use App\Helper\Carts;
use Inertia\Response;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Http\Requests\Auth\AddressRequest;
use Unicodeveloper\Paystack\Paystack;


class AddressController extends Controller
{
    public $paystack;

    public function __construct()
    {
        $this->paystack = new Paystack();
    }
    public function index(AddressRequest $address)
    {
        $request = \request();
        $user = $request->user()->id;
        $userAddress =  $address->validated();
        $getUserAddress = Address::where('user_id', $user)->exists();
        // $getUserAddress = Address::where('user_id', $userAddress['user_id'])->exists();


        if ($getUserAddress) {
            try {
                dd('hey-update');
            } catch (\Throwable $th) {
                throw $th;
            }
        } else {
            Address::create($userAddress);
        }
    }
    public function show(Address $address, Request $request)
    {
        // dd("hey");
        list($products, $cartItems) = Carts::getProductAndCartItems();

        $userAddress = $request->user()->id;
        $user = $request->user();
        $getUserAddress = $address->get()->whereIn('user_id', $userAddress)->first();
        $total = 0;
        $reference = $this->paystack->genTranxRef();

        foreach ($products as $product) {
            $total += $product->price * $cartItems[$product->id]['quantity'];
        }
        if ($getUserAddress) {
            return Inertia::render('checkout/checkout', [
                'address' => $getUserAddress,
                'user' => $user,
                'total' => $total,
                'reference' => $reference

            ]);
        }
    }
}
