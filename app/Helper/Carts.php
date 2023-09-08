<?php

namespace App\Helper;

// use App\Http\Controllers\Controller;
use App\Models\Cart;

class Carts
{
    public static function getCartItemsCount(): int
    {
        $request = \request();
        $user = $request->user();
        if ($user) {
            // return cartItem::where('user_id', $user->id)->sum('quantity');
            return Cart::whereBelongsTo($user->id)->sum('quantity');
        } else {
            $cartItems = self::getCookiesCartItems();
            return array_reduce(
                $cartItems,
                fn ($carry, $item) => $carry + $item['quantity'],
                0
            );
        }
    }
    public static function getQ()
    {
        $request = \request();
        $user = $request->user();
        if ($user) {
            return Cart::where('user_id', $user->id)->get()->map(
                fn ($item) => ['quantity' => $item->quantity++]
            );
        }
    }

    public static function getCartItems()
    {
        $request = \request();
        $user = $request->user();
        if ($user) {
            return Cart::where('user_id', $user->id)->get()->map(
                fn ($item) => ['product_id' => $item->product_id, 'quantity' => $item->quantity]
            );
        } else {
            return self::getCookiesCartItems();
        }
    }
    public static function getCookiesCartItems()
    {
        $request = \request();
        return json_decode($request->cookie('cart_items', ['']), true);
    }
    public static function getCountFromItems($cartItems)
    {
        return array_reduce(
            $cartItems,
            fn ($carry, $item) => $carry + $item['quantity'],
            0
        );
    }
    public static function moveCartItemsIntoDb()
    {
        $request = \request();
        $cartItem = self::getCookiesCartItems();
        $dbcartItems = Cart::where(['user_id' => $request->user()->id])->get()->keyBy('product_id');
        $newCartItems = [];

        foreach ($cartItem as $cartItems) {
            if (isset($dbcartItems[$cartItems['product_id']])) {
                continue;
            } else {
                $newCartItems[] = [
                    'user_id' => $request->user()->id,
                    'product_id' => $cartItems['product_id'],
                    'quantity' => $cartItems['quantity']
                ];
            }
        }
        if (!empty($newCartItems)) {
            Cart::insert($newCartItems);
        }
    }
}