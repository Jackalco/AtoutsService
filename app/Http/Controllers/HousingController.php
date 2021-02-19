<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HousingController extends Controller
{
    public function index() {
        return view('services/housings');
    }
}
