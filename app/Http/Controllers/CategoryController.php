<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showServices() {
        $images = Image::get();
        $category = Category::where('category', 'Service')->orderBy('name', 'asc')->get();
        $categories[] = null;

        for ($i=0; $i < count($category) ; $i++) { 
            foreach($images as $image) {
                if ($image->id == $category[$i]->image_id) {
                    $categories[$i] = $category[$i];
                    $categories[$i]['path'] = $image->path;
                }
            }
        }

        return view('category/services', compact('categories'));
    }

    public function showArtisans() {
        $images = Image::get();
        $category = Category::where('category', 'Artisan')->orderBy('name', 'asc')->get();
        $categories[] = null;

        for ($i=0; $i < count($category) ; $i++) { 
            foreach($images as $image) {
                if ($image->id == $category[$i]->image_id) {
                    $categories[$i] = $category[$i];
                    $categories[$i]['path'] = $image->path;
                }
            }
        }

        return view('category/artisans', compact('categories'));
    }

    public function showHousings() {
        $images = Image::get();
        $category = Category::where('category', 'Logement')->orderBy('name', 'asc')->get();
        $categories[] = null;

        for ($i=0; $i < count($category) ; $i++) { 
            foreach($images as $image) {
                if ($image->id == $category[$i]->image_id) {
                    $categories[$i] = $category[$i];
                    $categories[$i]['path'] = $image->path;
                }
            }
        }

        return view('category/housings', compact('categories'));
    }
}
