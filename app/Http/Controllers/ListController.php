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
        $today = now();
        $providers = Provider::where('activity', $category->name)->where('end_date', '>=', $today)->get();
        
        foreach($providers as $provider) {
            $provider['average'] = $provider->average();
        }

        $providersOrganized = $providers->sortByDesc('average');

        return view('category/list', compact('providersOrganized', 'category'));
    }
}
