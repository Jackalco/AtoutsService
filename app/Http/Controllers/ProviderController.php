<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Provider;
use App\Models\Image;
use App\Models\Category;
use App\Models\Score;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    public function show() {
        return view('provider/provider');
    }

    public function showForm() {
        $categories = Category::orderBy('name', 'asc')->get();

        return view('provider/form_provider', compact('categories'))->withUser(Auth::user());
    }

    public function applyForm(Request $request, $user) {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email',
            'date' => 'required|date',
            'siret' => 'required',
            'workforce' => 'required',
            'structure' => 'required',
            'owner' => 'required',
            'activity' => 'required',
            'image' => 'required|mimes:png,jpg'
        ]);

        $image = Image::storeImage($request->image);

        Provider::create(
            $request->only('name', 'address', 'city', 'phone', 'email', 'date', 'siret', 'workforce', 'structure', 'owner', 'activity') + ['image_id' => $image] + ['owner_id' => $user]
        );

        return back()->with('success', 'Félicitations ! Votre entreprise a bien été ajoutée parmis nos prestataires.');
    }

    public function showProvider($id) {
        $provider = Provider::find($id);
        $evaluations = Score::where('provider_id', $provider->id)->get();
        $average = null;
        $sum = null;
        $user = Auth::user();

        if($user) {
            History::create(['user_id' => $user->id] + ['provider_id' => $provider->id]);
        }
        
        if(count($evaluations)) {
            foreach($evaluations as $evaluation) {
                $sum += $evaluation->score;
            }
            $temporary_average = $sum/count($evaluations);
            $average = number_format($temporary_average, 1, ',', ' ');

        }
        else {
            $average = null;
        }

        return view('provider/show_provider', compact('provider', 'average', 'user'));
    }

    public function evaluate(Request $request, $provider_id, $user_id) {
        $user = User::find($user_id);
        $provider = Provider::find($provider_id);
        $score = Score::where('user_id', $user_id)->where('provider_id', $provider_id)->first();

        $this->validate($request, [
            'score' => 'required|regex:/^([1-5]*)$/'
        ]);

        if($score) {
            $score->update(['score' => $request->get('score')]);
            return back()->with('success', 'Merci, votre évaluation a bien été mise à jour.');
        } else {
            Score::create($request->only('score') + ['user_id' => $user->id] + ['provider_id' => $provider->id]);
            return back()->with('success', 'Merci, votre évaluation a bien été ajoutée.');
        }
        

        

    }
}
