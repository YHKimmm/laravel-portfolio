<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index')
        ->with('projects', Project::all());
    }

    public function listByCategory(Category $category)
    {
        return view('projects.index')
        ->with('projects', $category->projects);
    }

    public function show(Project $project)
    {
        return view('projects.project')
        ->with('project', $project);
    }

    public function about()
    {
        return view('about.about');
    }

    
}
