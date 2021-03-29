<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Provider;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $providers = Provider::all();

        return view('home', compact('categories', 'providers'));
    }
}
