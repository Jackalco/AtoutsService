<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Category;
use App\Models\Provider;
use App\Models\User;

class AdminController extends Controller
{
    public function panel() {
        return view('admin/admin');
    }

    public function showCategories() {
        $categories = Category::orderBy('name', 'asc')->get();
        
        return view('admin/admin_category', compact('categories'));
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

    public function editCategory($id) {
        $category = Category::find($id);

        if($category) {
            return view('admin/admin_category_edit', compact('category'));
        }
    }

    public function updateCategory(Request $request, $id) {
        $category = Category::find($id);
        $image = Image::find($category->image_id);
        

        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
        ]);

        if($category) {
            $category->update(
                ['name' => $request->get('name'), 'category' => $request->get('category')]
            );
            if($request->image) {
                $image->delete();
                $newImage = Image::storeImage($request->image);
                $category->update(['image_id' => $newImage]);
            }   
        }

        return redirect(route('admin.category'));
    }

    public function deleteCategory($id) {
        $category = Category::find($id);

        if($category) {
            $category->delete();
        }

        return redirect(route('admin.category'));
    }

    public function showProviders() {
        $providers = Provider::orderBy('name', 'asc')->get();

        return view('admin/admin_provider', compact('providers'));
    }

    public function deleteProvider($id) {
        $provider = Provider::find($id);

        if($provider) {
            $provider->delete();
        }

        return back()->with('success', 'Le prestataire a bien été supprimé');
    }

    public function showUsers() {
        $users = User::orderBy('name', 'asc')->get();

        return view('admin/admin_user', compact('users'));
    }

    public function deleteUser($id) {
        $user = User::find($id);

        if($user) {
            $user->delete();
        }

        return back()->with('success', 'L\'utilisateur a bien été supprimé');
    }

    
}
