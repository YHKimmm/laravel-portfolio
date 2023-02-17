<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function index(User $user)
    {
        $loggedInUser = Auth::user();

        return view('admin.index')
        ->with('projects', Project::all())
        ->with('users', User::all())
        ->with('loggedInUser', $loggedInUser);
    }
}
