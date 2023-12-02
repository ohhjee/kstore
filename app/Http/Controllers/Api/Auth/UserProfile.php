<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Inertia\Inertia;
use App\Helper\Carts;
use Inertia\Response;
use App\Models\product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Controller
{
    public function create(Request $request): Response
    {
        $user = $request->user();
        $cartItems = Carts::getCartItems();
        $id = Arr::pluck($cartItems, 'product_id');
        $products = product::get()->whereIn('id', $id);
        $cartItems = Arr::keyBy($cartItems, 'product_id');
        $cart = Cart::where(['user_id' => $user->id])->orderBy('created_at', 'desc')->first();


        $message = '';
        $date = '';
        if (empty($cart->created_at)) {
            $message = "no transaction made";
        } else {

            $date = Carbon::parse($cart->created_at)->format('d M Y h:i:m');
        }
        // dd(gettype($date));
        // }

        // $filteredDate = [];
        // foreach ($cart as $date) {
        //     if ($date->created_at) {
        //         $filteredDate[] = $date;
        //     }
        // }
        // return $date;
        // }
        // $date;
        // dd($date);
        if ($date === null) {
            dd('i am null');
        }
        return Inertia::render("profile", [
            'user' => $user,
            'cart' => $cartItems,
            'date' => $date,
            'msg' => $message

        ]);
    }
    public function update(Request $request)
    {
        $UserID = Auth::id();
        $user = User::findOrfail($UserID);
        // dd($user);
        $credentials = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:225|' . Rule::unique('users')->ignore($user->id),

        ]);
        $user->fill([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $user->save();
        return back()->with('message', 'profile Updated');
    }
}
