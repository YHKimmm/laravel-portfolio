<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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
}
