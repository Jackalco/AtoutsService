<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;
use App\Models\User;
use App\Models\Provider;
use App\Models\Price;
use App\Models\Promote;
use Laravel\Cashier\Cashier;

class PaymentController extends Controller
{
    public function promote(Request $request, $id, $id_provider) {
        $provider = Provider::find($id_provider);
        $week = Price::where('name', 'Une semaine')->get();
        $twoweek = Price::where('name', 'Deux semaines')->get();
        $month = Price::where('name', 'Un mois')->get();
        $user = User::find($id);
        $this->validate($request, [
            'price' => 'required'
        ]);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $request->price*100,
            "currency" => "eur",
            "description" => "Promotion du prestataire ".$provider->name,
            "source" => $request->stripeToken
        ]);

        $today = strtotime(date("Y/m/d"));

        switch($request->price) {
            case $request->price == $week[0]->price:
                Promote::create(['provider_id' => $provider->id, 'end_date' => date("d-m-Y", strtotime("+7 days", $today))]);
                break;
            case $request->price == $twoweek[0]->price:
                Promote::create(['provider_id' => $provider->id, 'end_date' => date("d-m-Y", strtotime("+15 days", $today))]);
                break;
            case $request->price == $month[0]->price:
                Promote::create(['provider_id' => $provider->id, 'end_date' => date("d-m-Y", strtotime("+1 month", $today))]);
                break;
        }

        return redirect(route('member-area.providers.show'))->with('success', 'Payment réussi, ce prestataire sera maintenant visible dans le bandeau publicitaire !');
    }

    public function subscription(Request $request, $id) {
        $user = Auth::user();
        $provider = Provider::find($id);
        $priceSubscription = Price::where('name', 'Abonnement')->limit(1)->get();
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $priceSubscription[0]->price*100,
            "currency" => "eur",
            "source" => $request->stripeToken,
            "description" => "Abonnement d'un an du prestataire ".$provider->name,
        ]);
        $date = date('d-m-Y', strtotime('+1 year'));
        $provider->update(['end_date' => $date]);

        return redirect(route('member-area.providers.show'))->with('success', 'Payment réussi, ce prestataire sera maintenant visible sur Atouts Services !');
    }
}
