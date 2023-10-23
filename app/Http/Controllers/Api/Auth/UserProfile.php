<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Inertia\Inertia;
use App\Helper\Carts;
use Inertia\Response;
use App\Models\product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
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
        return Inertia::render("profile", [
            'user' => $user,
            'cart' => $cartItems

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
