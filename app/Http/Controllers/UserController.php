<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;
use App\Models\Provider;
use App\Models\Category;
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

    public function editProvider($id, $id_provider) {
        $categories = Category::orderBy('name', 'asc')->get();
        $user = User::find($id);
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
            if($user->id == $provider->owner_id) {
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

        if($user->id == $provider->owner_id) {
            $provider->delete();
        } else {
            return back()->with('error', 'Vous n\'avez pas les droits pour supprimer ce prestataire.');
        }

    }
}
