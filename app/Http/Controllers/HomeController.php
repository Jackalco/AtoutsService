<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Provider;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $providers = Provider::get();
        $cities = [];

        foreach($providers as $provider) {
             if(!in_array($provider->city, $cities)) {
                 $cities[] = $provider->city;
             }
        }

        return view('home', compact('categories', 'cities'));
    }
}
