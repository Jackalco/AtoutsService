<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showServices() {
        return view('category/services');
    }

    public function showArtisans() {
        return view('category/artisans');
    }

    public function showHousings() {
        return view('category/housings');
    }
}
