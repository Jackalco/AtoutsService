<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{
    public function panel() {
        return view('admin/admin');
    }

    public function showCategories() {
        $images = Image::get();
        $category = Category::orderBy('name', 'asc')->get();
        $categories[] = null;

        for ($i=0; $i < count($category) ; $i++) { 
            foreach($images as $image) {
                if ($image->id == $category[$i]->image_id) {
                    $categories[$i] = $category[$i];
                    $categories[$i]['path'] = $image->path;
                }
            }
        }

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
        return view('admin/admin_provider');
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

        return redirect('/admin/utilisateurs');
    }

    
}
