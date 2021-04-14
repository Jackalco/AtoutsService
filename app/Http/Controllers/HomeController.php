<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Provider;
use App\Models\Promote;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $today = now();
        $promotes = Promote::where('end_date', '>=', $today)->inRandomOrder()->limit(5)->get();

        return view('home', compact('categories', 'promotes'));
    }
}
