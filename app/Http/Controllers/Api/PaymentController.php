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
        // dd($this->paystack->getAuthorizationUrl()->redirectNow());
        try {

            return $this->paystack->getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }
    public function handleGatewayCallback()
    {
        // dd($this->paystack->genTranxRef());

        $paymentDetails = $this->paystack->getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}
