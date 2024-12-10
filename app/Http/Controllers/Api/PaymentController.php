<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use Inertia\Inertia;
use App\Helper\Carts;
use App\Models\Order;
// use Paystack;
use App\Models\Payment;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Unicodeveloper\Paystack\Paystack;
use Illuminate\Support\Facades\Redirect;



class PaymentController extends Controller
{

    public $paystack;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->paystack = new Paystack();
    }

    public function redirectToGateway(Request $request)
    {

        try {
            $pay = collect($this->paystack->getAuthorizationUrl())->toArray();
            $request = \request();
            $user = $request->user()->id;
            list($products, $cartItems) = Carts::getProductAndCartItems();
            $total = 0;
            foreach ($products as $product) {
                $total += $product->price * $cartItems[$product->id]['quantity'];
            }

            $rand = rand(0, 9999);
            $orderData = ['total' => $total, 'user_id' => $user, 'order_no' => $rand];
            Order::create($orderData);

            return Inertia::location($pay['url']);
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        };
    }
    public function handleGatewayCallback(Request $request)
    {

        $paymentDetails = $this->paystack->getPaymentData();
        // dd($paymentDetails);
        $user = $request->user();
        $carts = Cart::where('user_id', $user->id)->first();
        $carts->delete();
        $cartItem = Carts::getCartItems();
        $id = Arr::pluck($cartItem, 'product_id');
        $cartItem = Arr::keyBy($cartItem, 'product_id');
        $order =  Order::first();
        $payment = [
            'user_id' => $user->id,
            'order_no' => $order->order_no,
            'status' => $paymentDetails['data']['status'],
            'total' => $paymentDetails['data']['amount'],
            'pay_method' => $paymentDetails['data']['channel'],
            'reference' => $paymentDetails['data']['reference']

        ];
        // dd($payment);
        Payment::create($payment);
        $pay_details = Payment::where('order_no', $order->order_no)->first();
        // dd();
        $date = Carbon::parse($pay_details->created_at)->format('d M Y h:i:m');
        return Inertia::render('Order/order', [
            'user' => $user,
            'payment' => $pay_details,
            'cart' => $cartItem,
            'date' => $date
        ]);
        // dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
