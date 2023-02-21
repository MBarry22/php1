<?php
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});
Route::get('/about', function () {
    return view('about');

});
Route::get('/projects', [ProjectController::class, 'index']);

Route::get('/projects/{project:slug}', [ProjectController::class, 'show']);
Route::get('/categories/{category:slug}', [ProjectController::class, 'listByCategory']);

//Register
Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

//Login
Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->name('login')->middleware('guest');

//Logout
Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');

//Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/projects', [AdminController::class, 'index']);
    //Route::get('/admin/projects', [ProjectController::class, 'index']);
    Route::get('/admin/projects/{project:slug}', [ProjectController::class, 'show']);
});

// fallback route
Route::fallback(function() {

    // Set a flash message
    session()->flash('error','Requested page not found.  Home you go.');

    // Redirect to /
    return redirect('/');
});