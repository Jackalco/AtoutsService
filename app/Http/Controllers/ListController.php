<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Image;
use App\Models\Category;

class ListController extends Controller
{
    public function index($id) {
        $category = Category::find($id);
        $providers = Provider::where('activity', $category->name)->orderBy('name', 'asc')->get();
        

        return view('category/list', compact('providers', 'category'));
    }
}
