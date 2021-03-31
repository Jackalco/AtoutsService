<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Session;
use App\Models\User;
use App\Models\Provider;

class PaymentController extends Controller
{
    public function promote(Request $request, $id, $id_provider) {
        $provider = Provider::find($id_provider);
        $user = User::find($id);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $request->price,
            "currency" => "eur",
            "description" => "Promotion du prestataire ".$provider->name,
            "source" => $request->stripeToken
        ]);

        $date = date("m"."d"."Y");

        switch($request->price) {
            case "9999":
                break;
            case "19999":
                break;
            case "39999":
                break;
        }

        return redirect(route('member-area.providers.show', $user->id))->with('success', 'Payment réussi, ce prestataire est maintenant visible !');
    }
}
