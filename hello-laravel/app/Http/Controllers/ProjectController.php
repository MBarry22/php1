<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index')
            ->with('projects', Project::latest('published_date')->paginate(6)->withQueryString())
            ->with('categoryname', null);
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required', 'unique:projects,title'],
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['required', 'sometimes','exists:categories,id'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:max_width=1200'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024','dimensions:max_width=600'],
        ]);
        
        

        // Save upload in public storage and set path attributes 
        $image_path = request()->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = request()->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;
        
        
        $attributes['slug'] = Str::slug($attributes['title']);
        Project::create($attributes);

        session()->flash('success', 'Project created successfully.');

        return redirect('/admin');
    }
    
    // Show Function
    public function show(Project $project)
    {
       // $slug = Str::slug($project->title, '-');
       // add into view
       //, 'slug' => $slug
        return view('projects.project', ['project' => $project ]);
    }
    // List by Category Function 
    public function listByCategory(Category $category)
    {
        
        return view('projects.index-category')
        ->with('projects', $category->projects)
        ->with('categoryname', $category->name);
        
    }

    //Create Function for Admin projects
    public function create() {
        return view('admin.projects.create')
        ->with('categories', Category::all())
        ->with('project', null);
    }
    //Edit Function for Admin projects
    public function edit(Project $project) {
        return view('admin.projects.create')
        ->with('project', $project)
        ->with('categories', Category::all());
    }
    //Update Function for Admin projects
    public function update(Project $project, Request $request)
    {
        $attributes = request()->validate([
            'title' => ['required','unique:projects,title,'.$project->id],
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:max_width=1200'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024','dimensions:max_width=600'],
        ]);

        
        
        // Save upload in public storage and set path attributes 
        $image_path = request()->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $thumb_path = request()->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

        $attributes['slug'] = Str::slug($attributes['title']);
        
        $project->update($attributes);

        session()->flash('success', 'Project updated successfully.');

        return redirect('/admin');
    }

    //Destroy Function for Admin projects
    public function destroy(Project $project) {
        $project->delete();

        // Set a flash message
        session()->flash('success','Project Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
    
}
