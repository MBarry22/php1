<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Str;
class ProjectController extends Controller
{
    public function Index(){

        return view('projects.index')
            ->with('projects', Project::all())
            ->with('categoryname',null);
    }
    public function show(Project $project)
    {
        return view('projects.project',['project' => $project]);
    }
    public function listByCategory(Category $category)
    {
        
        return view('projects.index')
        ->with('projects', $category->projects)
        ->with('categoryname', $category->name);
        
    }
}
