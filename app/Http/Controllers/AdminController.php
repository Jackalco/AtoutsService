<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Category;

class AdminController extends Controller
{
    public function panel() {
        return view('admin/admin');
    }

    public function showCategories() {
        return view('admin/admin_category');
    }

    public function showProviders() {
        return view('admin/admin_provider');
    }

    public function showUsers() {
        return view('admin/admin_user');
    }

    public function storeCategory(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'image' => 'required|mimes:png,jpg',
        ]);

        $image = Image::storeImage($request->image);

        Category::create($request->only('name', 'category') + ['image_id' => $image]);

        return back()->with('success', 'La sous-catégorie a bien été ajoutée.');
    }
}
