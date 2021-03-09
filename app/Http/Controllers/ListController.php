<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Image;

class ListController extends Controller
{
    public function index($id) {
        $providersList = Provider::where('activity', $id)->orderBy('name', 'asc')->get();
        $images = Image::get();
        $providers[] = null;

        if($providersList != null) {
            for ($i=0; $i < count($providersList) ; $i++) { 
                foreach($images as $image) {
                    if ($image->id == $providersList[$i]->logo) {
                        $providers[$i] = $providersList[$i];
                        $providers[$i]['path'] = $image->path;
                    }
                }
            }
        }
        

        return view('category/list', compact('providers'));
    }
}
