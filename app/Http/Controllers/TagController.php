<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
     public function create()
    {
        return view('admin.tags.create')
        ->with('tag', null);
    }

    public function store() {
        $attributes = request()->validate([
            'name' => 'required',
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);

        Tag::create($attributes);
        
        // Set a flash message
        session()->flash('success','New Tag Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function edit(Tag $tag) {
        return view('admin.tags.create')
        ->with('tag', $tag)
        ->with('tags', Tag::all());
    }

    public function update(Tag $tag) {
        $attributes = request()->validate([
            'name' => 'required',
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);

        $tag->update($attributes);
        
        // Set a flash message
        session()->flash('success','Tag Updated Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function destroy(Tag $tag) {
        $tag->delete();

        // Set a flash message
        session()->flash('success','Tag Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function getTagsJSON()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }
}
