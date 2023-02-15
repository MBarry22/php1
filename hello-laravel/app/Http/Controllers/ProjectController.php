<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
class ProjectController extends Controller
{
    public function Index(){

        return view('projects.index')
            ->with('projects', Project::all());
    }
    public function show(Project $project)
    {
        return view('projects.project',['project' => $project]);
    }
    public function listByCategory(Category $category)
    {
        return view('projects.index')
        ->with('projects', $category->projects);
    }
}
