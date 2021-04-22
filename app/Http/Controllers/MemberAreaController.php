<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;
use App\Models\Provider;
use App\Models\Category;
use App\Models\History;
use App\Models\Price;
use App\Models\Promote;
use Illuminate\Support\Facades\Auth;

class MemberAreaController extends Controller
{
    public function show() {
        return view('member_area/member_area')->withUser(Auth::user());
    }

    public function editPersonnal() {
        return view('member_area/member_area_edit_personnal')->withUser(Auth::user());
    }

    public function updatePersonnal(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::find($id);

        if($user) {
            $user->update(
                ['name' => $request->get('name'), 'email' => $request->get('email')]
            );   
        }
        
        return redirect(route('member-area'));
    }

    public function showProviders() {
        $user = Auth::user();
        $today = now();
        $providers = Provider::where('user_id', $user->id)->orderBy('name', 'asc')->get();

        return view('member_area/member_area_show_providers', compact('providers', 'user', 'today'));
    }

    public function editProvider($id_provider) {
        $categories = Category::orderBy('name', 'asc')->get();
        $user = Auth::user();;
        $provider = Provider::find($id_provider);

        return view('member_area/member_area_edit_provider', compact('provider', 'user', 'categories')); 
    }

    public function updateProvider(Request $request, $id, $id_provider) {
        $user = User::find($id);
        $provider = Provider::find($id_provider);

        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email',
            'siret' => 'required',
            'workforce' => 'required',
            'structure' => 'required',
            'owner' => 'required',
            'activity' => 'required',
        ]);

        if($provider) {
            if($user->id == $provider->user_id) {
                $provider->update(
                    ['name' => $request->get('name'), 
                    'address' => $request->get('address'),
                    'city' => $request->get('city'),
                    'phone' => $request->get('phone'),
                    'email' => $request->get('email'),
                    'siret' => $request->get('siret'),
                    'workforce' => $request->get('workforce'),
                    'structure' => $request->get('structure'),
                    'owner' => $request->get('owner'),
                    'activity' => $request->get('activity'),]
                );

                if($request->image) {
                    $image->delete();
                    $newImage = Image::storeImage($request->image);
                    $provider->update(['image_id' => $newImage]);
                }

                if($request->description) {
                    $provider->update(['description' => $request->get('description')]);
                }

                if($request->color) {
                    $provider->update(['color' => $request->get('color')]);
                }

                return redirect(route('member-area.providers.show', $user->id))->with('success', 'Les informations de l\'entreprise ont bien été mis à jour.');
            } else {
                return back()->with('error', 'Vous n\'avez pas les droits de modifier ce prestataire.');
            }
        }
        $provider->update(
            ['name' => $request->get('name'), 
            'category' => $request->get('category')]
        );
    }

    public function deleteProvider($id, $id_provider) {
        $user = User::find($id);
        $provider = Provider::find($id_provider);

        if($user->id == $provider->user_id) {
            $provider->delete();
            return back()->with('success', 'Ce prestataire a bien été supprimé !');
        } else {
            return back()->with('error', 'Vous n\'avez pas les droits pour supprimer ce prestataire.');
        }

    }

    public function showPromotePayment($id_provider) {
        $user = Auth::user();
        $provider = Provider::find($id_provider);
        $week = Price::where('name', 'Une semaine')->get();
        $twoweek = Price::where('name', 'Deux semaines')->get();
        $month = Price::where('name', 'Un mois')->get();
        $today = now();
        $promote = Promote::where('provider_id', $provider->id)->where('end_date', '>', $today)->orderBy('end_date', 'desc')->limit(1)->get();

        if($user->id == $provider->user_id) {
            return view('member_area/member_area_promote', compact('user', 'provider', 'week', 'twoweek', 'month', 'promote'));
        } else {
            return redirect(route('home'));
        }
    }

    public function showSubscriptionPayment($id_provider) {
        $user = Auth::user();
        $provider = Provider::find($id_provider);
        $today = now();
        $price = Price::where('name', 'Abonnement')->limit(1)->get();

        if($user->id == $provider->user_id) {
            return view('member_area/member_area_subscription', compact('provider', 'today', 'price'));
        } else {
            return redirect(route('home'));
        }
    }

    public function showHistory() {
        $user = Auth::user();
        $histories = History::where('user_id', $user->id)->orderBy('id', 'desc')->get();

        return view('member_area/member_area_show_history', compact('histories', 'user'));
    }

    public function deleteHistory($id, $history_id) {
        $user = User::find($id);
        $history = History::find($history_id);

        if($history) {
            if($history->user_id == $user->id) {
                $history->delete();
                return back()->with('success', 'Cet élément a bien été supprimé de votre historique');
            }
        }

        
    }
}
