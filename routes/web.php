<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get("/groups/viewConfirmDelete/{id}", [GroupController::class, "viewConfirmDelete"])->middleware(['auth', 'verified'])->name("admin.groups.viewConfirmDelete");

Route::get("/groups/inactive", [GroupController::class, 'inactive'])->middleware(['auth', 'verified'])->name('admin.groups.inactive');


Route::get("/groups/inactivate/{department}", [GroupController::class, 'inactivate'])->middleware(['auth', 'verified'])->name('admin.groups.inactivate');


Route::get("/group/activate/{group}", [GroupController::class, 'activate'])->middleware(['auth', 'verified'])->name('admin.groups.activate');




Route::resource("/groups", GroupController::class)->middleware(['auth', 'verified'])->names('admin.groups');







Route::get("/articles/viewConfirmDelete/{id}", [ArticleController::class, "viewConfirmDelete"])->middleware(['auth', 'verified'])->name("admin.articles.viewConfirmDelete");

Route::get("/articles/inactive", [ArticleController::class, 'inactive'])->middleware(['auth', 'verified'])->name('admin.articles.inactive');


Route::get("/articles/inactivate/{department}", [ArticleController::class, 'inactivate'])->middleware(['auth', 'verified'])->name('admin.articles.inactivate');


Route::get("/articles/activate/{group}", [ArticleController::class, 'activate'])->middleware(['auth', 'verified'])->name('admin.articles.activate');

Route::resource("/articles", ArticleController::class)->middleware(['auth', 'verified'])->names('admin.articles');

require __DIR__ . '/auth.php';
