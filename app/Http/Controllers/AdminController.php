<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Category;
use App\Models\Provider;
use App\Models\User;
use App\Models\Search;
use App\Models\Score;
use App\Models\Price;

class AdminController extends Controller
{
    public function panel() {
        return view('admin/admin');
    }

    public function showCategories() {
        $categories = Category::orderBy('name', 'asc')->get();
        
        return view('admin/admin_category', compact('categories'));
    }

    public function storeCategory(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'image' => 'required|mimes:png,jpg',
        ]);

        $image = Image::storeImage($request->image);

        Category::create($request->only('name', 'category') + ['image_id' => $image]);

        return back()->with('success', 'La sous-catégorie a bien été ajoutée.');
    }

    public function editCategory($id) {
        $category = Category::find($id);

        if($category) {
            return view('admin/admin_category_edit', compact('category'));
        }
    }

    public function updateCategory(Request $request, $id) {
        $category = Category::find($id);
        $image = Image::find($category->image_id);
        

        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
        ]);

        if($category) {
            $category->update(
                ['name' => $request->get('name'), 'category' => $request->get('category')]
            );
            if($request->image) {
                $image->delete();
                $newImage = Image::storeImage($request->image);
                $category->update(['image_id' => $newImage]);
            }   
        }

        return redirect(route('admin.category'));
    }

    public function deleteCategory($id) {
        $category = Category::find($id);

        if($category) {
            $category->delete();
        }

        return redirect(route('admin.category'));
    }

    public function showProviders() {
        $providers = Provider::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        $users = User::where('statusLvl', 1)->orderBy('name', 'asc')->get();
        $today = now();

        return view('admin/admin_provider', compact('providers', 'categories', 'users', 'today'));
    }

    public function storeProvider(Request $request) {
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

        $user = User::find($request->owner);
        $date = date('Y-m-d', strtotime('+1 year'));
        $image = Image::storeImage($request->image);

        Provider::create(
            $request->only('name', 'address', 'city', 'phone', 'email', 'date', 'siret', 'workforce', 'structure', 'activity') + ['image_id' => $image] + ['owner' => $user->name] + ['user_id' => $user->id] + ['end_date' => $date]
        );

        return back()->with('successStore', 'Le prestataire a bien été ajouté.');
    }

    public function deleteProvider($id) {
        $provider = Provider::find($id);

        if($provider) {
            $provider->delete();
        }

        return back()->with('successDelete', 'Le prestataire a bien été supprimé');
    }

    public function addSubscription($id) {
        $provider = Provider::find($id);
        $date = date('Y-m-d', strtotime('+1 year'));

        $provider->update(['end_date' => $date]);

        return back()->with('successDelete', 'Le prestataire est abonné jusqu\'au '.$date);
    }

    public function showUsers() {
        $users = User::where('statusLvl', 1)->orderBy('name', 'asc')->get();

        return view('admin/admin_user', compact('users'));
    }

    public function deleteUser($id) {
        $user = User::find($id);

        if($user) {
            $user->delete();
        }

        return back()->with('success', 'L\'utilisateur a bien été supprimé');
    }

    public function showStatsMonth() {
        $month = date("m");
        $year = date("Y");
        $searches = Search::where('year', $year)->where('month', $month)->get();
        $providers = Provider::get();
        

        foreach($providers as $provider) {
            $provider['count'] = 0; 
            foreach ($searches as $search) {
                if($search->provider_id == $provider->id) {
                    $provider['count'] += 1;
                }
            }
        }

        $providersDetails = $providers->sortByDesc('count');

        return view('admin/admin_stats_month', compact('providersDetails'));
    }

    public function showStatsYear() {
        $year = date("Y");
        $searches = Search::where('year', $year)->get();
        $providers = Provider::get();
        

        foreach($providers as $provider) {
            $provider['count'] = 0;

            foreach ($searches as $search) {
                if($search->provider_id == $provider->id) {
                    $provider['count'] += 1;
                }
            }
        }

        $providersDetails = $providers->sortByDesc('count');

        return view('admin/admin_stats_year', compact('providersDetails'));
    }

    public function showPrices() {
        $year = Price::where('name', 'Abonnement')->get();
        $week = Price::where('name', 'Une semaine')->get();
        $twoweek = Price::where('name', 'Deux semaines')->get();
        $month = Price::where('name', 'Un mois')->get();
        return view('admin/admin_price', compact('year', 'week', 'twoweek', 'month'));
    }

    public function updatePrice(Request $request, $id) {
        $this->validate($request, [
            'price' => 'required'
        ]);

        $price = Price::find($id);
        $price->update(['price' => $request->get('price')]);
        return back()->with('success', 'Le prix a bien été modifié');
    }

    
}
