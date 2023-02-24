<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function create()
    {
        return view('admin.categories.create')
        ->with('category', null);
    }

    public function store() {
        $attributes = request()->validate([
            'name' => 'required',
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);

        Category::create($attributes);
        
        // Set a flash message
        session()->flash('success','New Category Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function edit(Category $category) {
        return view('admin.categories.create')
        ->with('category', $category)
        ->with('categories', Category::all());
    }

    public function update(Category $category) {
        $attributes = request()->validate([
            'name' => 'required',
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);

        $category->update($attributes);
        
        // Set a flash message
        session()->flash('success','Category Updated Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function destroy(Category $category) {
        $category->delete();

        // Set a flash message
        session()->flash('success','Category Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function getCategoriesJSON()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
}
