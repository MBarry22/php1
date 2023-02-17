<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
class AdminController extends Controller
{
    public function Index(){

        return view('admin.index')
            ->with('projects', Project::all())
            ->with('users', User::all());
    }

}
