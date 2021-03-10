<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showServices() {
        $categories = Category::where('category', 'Service')->orderBy('name', 'asc')->get();

        return view('category/services', compact('categories'));
    }

    public function showArtisans() {
        $categories = Category::where('category', 'Artisan')->orderBy('name', 'asc')->get();
 
        return view('category/artisans', compact('categories'));
    }

    public function showHousings() {
        $categories = Category::where('category', 'Logement')->orderBy('name', 'asc')->get();

        return view('category/housings', compact('categories'));
    }
}
