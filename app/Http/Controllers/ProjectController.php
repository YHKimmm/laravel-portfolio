<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\validation\Rule;


class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index')
            ->with('projects', Project::latest('published_date')->paginate(6)->withQueryString())
            ->with('categoryName', null);
    }

    public function listByCategory(Category $category)
    {
        return view('projects.index-category')
        ->with('projects', $category->projects);
    }

    public function listByTag(Tag $tag)
    {
        return view('projects.index-tag')
        ->with('projects', $tag->projects);
    }

    public function show(Project $project)
    {
        return view('projects.project')
        ->with('project', $project)
        ->with('tags', Tag::all());
    }

    public function about()
    {
        return view('about.about');
    }

    public function create()
    {
        return view('admin.projects.create')
        ->with('project',null)
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    public function store(Request $request, Project $project) {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg'],
            'tags' => ['nullable', 'sometimes', 'array'],
            'tags.*' => ['exists:tags,id']
        ]);

        // Generate the slug from the title
        $attributes['slug'] = Str::slug($attributes['title']);

        // Save upload in public storage and set path attributes 
        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

        $project = Project::create($attributes);

        $project->tags()->attach($request['tags']);
        
        
        // Set a flash message
        session()->flash('success','Project Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function edit(Project $project) {
        return view('admin.projects.create')
        ->with('project', $project)
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    public function update(Project $project, Request $request) {
        $attributes = request()->validate([
            'title' => ['required','unique:projects,title,'.$project->id],
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg'],
        ]);

        $attributes['slug'] = Str::slug($attributes['title']);

         // Check if new thumbnail or image file has been uploaded and update database accordingly
        if ($request->hasFile('thumb')) {
            $thumb_path = $request->file('thumb')->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
            $attributes['thumb'] = $thumb_path;
        }
        
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->storeAs('images',$request->image->getClientOriginalName(), 'public');
            $attributes['image'] = $image_path;
        }

        $project->tags()->sync($request['tags']);

        // Save updates to the DB
        $project->update($attributes);

        session()->flash('success','Project Updated Successfully');

        return redirect('/admin');
    }

    public function destroy(Project $project, Request $request) {
        

        $project->tags()->detach($request['tags']);
        $project->delete();

        // Set a flash message
        session()->flash('success','Project Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function getProjectsJSON()
    {
        $projects = Project::with(['category','tags'])->get();
        return response()->json($projects);
    }

    
}
