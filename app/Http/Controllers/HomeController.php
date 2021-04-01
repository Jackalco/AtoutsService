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
        $promotes = Promote::where('end-date', '>=', $today)->get();

        return view('home', compact('categories', 'promotes'));
    }
}
