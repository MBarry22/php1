<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    // Admin Index Page
    public function Index(){

        return view('admin.index')
            ->with('projects', Project::all())
            ->with('users', User::all())
            ->with('categories',Category::all())
            ->with('tags',Tag::all());
    }

    // User Functions Start Here

    public function usercreate(){
        return view('admin.users.create')
        ->with('user', null);
    }

    public function userstore(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'email' => 'required',
            'password' => 'required',
        ]);
        
        
        
        $attributes['slug'] = Str::slug($attributes['name']);
        User::create($attributes);

        session()->flash('success', 'User created successfully.');

        return redirect('/admin/projects');
    }

    //Edit Function for Admin Users
    public function edituser(User $user) {
        return view('admin.users.create')
        ->with('user', $user);
    }

    public function updateuser(User $user, Request $request)
    {
        $attributes = request()->validate([
            'name' => ['required'],
            'email' => 'nullable',
            'password' => 'nullable',

        ]);

        

        $attributes['slug'] = Str::slug($attributes['name']);
        
        $user->update($attributes);

        session()->flash('success', 'User updated successfully.');

        return redirect('/admin/projects');
    }

    //Destroy Function for Admin users
    public function destroyuser(User $user) {
        $user->delete();

        // Set a flash message
        session()->flash('success','User Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin/projects');
    }

    // User Functions End Here

    // -----------------------------------------------------------------------------------------------

    // Category Functions Start Here

    // create function for admin categories
    public function categorycreate(){
        return view('admin.categories.create')
        ->with('category', null);
    }

    // Store function for admin categories
    public function categorystore(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
        ]);
        
        
        
        $attributes['slug'] = Str::slug($attributes['name']);
        Category::create($attributes);

        session()->flash('success', 'Category created successfully.');

        return redirect('/admin/projects');
    }

    //Edit Function for Admin Categories
    public function editcategory(Category $category) {
        return view('admin.categories.create')
        ->with('category', $category);
    }

    // Update Function for Admin Categories
    public function updatecategory(Category $category, Request $request)
    {
        $attributes = request()->validate([
            'name' => ['required'],

        ]);

        

        $attributes['slug'] = Str::slug($attributes['name']);
        
        $category->update($attributes);

        session()->flash('success', 'Category updated successfully.');

        return redirect('/admin/projects');
    }

    //Destroy Function for Admin categories
    public function destroycategory(Category $category) {
        $category->delete();

        // Set a flash message
        session()->flash('success','Category Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin/projects');
    }

    // Category Functions End Here

    // -----------------------------------------------------------------------------------------------

    // Tags Functions Start Here

    // create function for admin Tags
    public function tagscreate(){
        return view('admin.tags.create')
        ->with('tag', null);
    }

    // Store function for admin Tags
    public function tagsstore(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
        ]);
        
        
        
        $attributes['slug'] = Str::slug($attributes['name']);
        Tag::create($attributes);

        session()->flash('success', 'Tag created successfully.');

        return redirect('/admin/projects');
    }

    //Edit Function for Admin Tags
    public function edittags(Tag $tag) {
        return view('admin.tags.create')
        ->with('tag', $tag);
    }

    // Update Function for Admin Tags
    public function updatetags(Tag $tag, Request $request)
    {
        $attributes = request()->validate([
            'name' => ['required'],

        ]);

        

        $attributes['slug'] = Str::slug($attributes['name']);
        
        $tag->update($attributes);

        session()->flash('success', 'Tag updated successfully.');

        return redirect('/admin/projects');
    }

    //Destroy Function for Admin Tags
    public function destroytags(Tag $tag) {
        $tag->delete();

        // Set a flash message
        session()->flash('success','Tag Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin/projects');
    }


    // Tags Functions End Here

    // -----------------------------------------------------------------------------------------------
    
    // Tags JSON 
    public function getTagsJSON()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }

}
