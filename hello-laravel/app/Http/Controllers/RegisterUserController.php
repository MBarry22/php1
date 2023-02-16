<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function create() {
        return view('register_user.create');
    }
    public function store() {
        request()->validate([
            'name' => 'required',
            'email' => ['required','email', 'unique:users,email'],
            'password' => ['required','min:8', 'confirmed'],
        ]);
    }
}
