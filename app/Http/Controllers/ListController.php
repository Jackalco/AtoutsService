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
        $providers = Provider::where('activity', $category->name)->get();
        
        foreach($providers as $provider) {
            $provider['average'] = $provider->average();
        }

        $providersOrganized = $providers->sortByDesc('average');

        return view('category/list', compact('providersOrganized', 'category'));
    }
}
