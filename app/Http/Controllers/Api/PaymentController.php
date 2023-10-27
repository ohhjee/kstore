<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
// use Paystack;
use Unicodeveloper\Paystack\Paystack;



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
        // dd($request->collect());
        // dd($this->paystack->getAuthorizationUrl()->redirectNow());
        try {

            $pay = collect($this->paystack->getAuthorizationUrl())->toArray();
            // return response()->json(['pay' => $pay]);
            // dd($pay['url']);
            // return redirect()->away($pay['url']);
            return Inertia::location($pay['url']);
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }
    public function handleGatewayCallback()
    {

        $pays = collect($this->paystack->genTranxRef());
        dd($pays);
        return Inertia::render('checkout/checkout');
        $paymentDetails = $this->paystack->getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
