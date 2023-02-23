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


    public function create()
    {
        return view('admin.users.create')
        ->with('user', null);
    }

     public function store() {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'email_verified_at' => ['nullable','sometimes','date'],
            'remember_token' => ['nullable'],
            'created_at' => ['nullable','sometimes','date'],
        ]);

        User::create($attributes);
        
        // Set a flash message
        session()->flash('success','User Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    
    public function edit(User $user) {
        return view('admin.users.create')
        ->with('user', $user);
    }

    public function update(User $user) {
         $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'email_verified_at' => ['nullable','sometimes','date'],
            'remember_token' => ['nullable'],
            'created_at' => ['nullable','sometimes','date'],
        ]);

        // Save updates to the DB
        $user->update($attributes);

        session()->flash('success','User Updated Successfully');

        return redirect('/admin');
    }

    public function destroy(User $user) {
        $user->delete();

        // Set a flash message
        session()->flash('success','User Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
}
