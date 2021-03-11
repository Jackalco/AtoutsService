<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;
use App\Models\Provider;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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

    public function showProviders($id) {
        $user = User::find($id);
        $providers = Provider::where('owner_id', $id)->orderBy('name', 'asc')->get();

        return view('member_area/member_area_show_providers', compact('providers', 'user'));
    }

    public function editProvider($id, $provider) {
        $user = User::find($id);
        $provider = Provider::find($provider);

        if($user->id == $provider->owner_id) {
            return view('member_area/member_area_edit_provider', compact('provider', 'user'));
        } else {
            return view('member_area/member_area_edit_provider')->with('error', 'Vous n\'avez pas l\'autorisation de modifier ce prestataire.');
        }

        
    }

    public function updateProvider($id, $provider) {
        $user = User::find($id);
        $provider = Provider::find($provider);

        /*($user->id == $provider->owner_id) {
            
        }*/
    }
}
