<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use Cviebrock\EloquentSluggable\Services\SlugService;
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
Route::get('check_slug', function () {
    $slug = SlugService::createSlug(App\Models\News::class, 'slug', request('title'));
    return response()->json(['slug' => $slug]);
});

Route::get('/home', function () {
	if(auth()->check()){
		if(auth()->user()->is_admin == 1){
			$route =  '/dashboard';
		}else{
			$route =  '/';
		}
	}else{
		$route =  '/login';
	}
	return redirect($route);
});

Route::get('/', function () {
    return view('index')->with([
		'news' => App\Models\News::all()->take(3)
	]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/team', function () {
    return view('team');
});

Route::get('/blog', function () {
    return view('blog');
});


Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

Route::middleware('user')->group(function () {
	Route::get('/register', [TeamController::class, 'register']);
	Route::post('/register', [TeamController::class, 'store']);
	Route::put('/register/{id}', [TeamController::class, 'update']);
});

Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('admin')->group(function () {
	Route::get('/dashboard', [AdminController::class, 'index']);
	Route::resource('/users', UserController::class);
	Route::get('/teams', [TeamController::class, 'index']);
	Route::get('/teams/{id}', [TeamController::class, 'show']);
	Route::resource('/news', NewsController::class);
});


