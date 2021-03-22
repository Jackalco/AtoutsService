<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;  

class SearchController extends Controller
{
    public function show() {
        return view('search/search_show');
    }

    public function getSearch(Request $request) {
        $this->validate($request, [
            'category' => 'required',
            'city' => 'required'
        ]);

        return redirect()->route('search.index', ['category' => $request->get('category'), 'city' => $request->get('city')]);
    }

    public function index($category, $city) {
        $providers = Provider::where('city', $city)->where('activity', $category)->orderBy('name', 'asc')->get();

        return view('search/search_index', compact('providers'));
    }
}
