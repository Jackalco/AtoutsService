<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Session;

class PaymentController extends Controller
{
    public function makePayment(Request $request) {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => 100*150,
            "currency" => "eur",
            "description" => "test",
            "source" => $request->stripeToken
        ]);


        return back()->with('success', 'Payment réussi');
    }
}
