<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PurchasingDetailsController;
use App\Models\Article;
use App\Models\Project;
use App\Models\purchasingDetails;

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

Route::get("groups/pdf/list", [GroupController::class, "pdfList"])->middleware(['auth', 'verified'])->name("admin.groups.pdf.list");
Route::get("/group/activate/{group}", [GroupController::class, 'activate'])->middleware(['auth', 'verified'])->name('admin.groups.activate');



Route::resource("/groups", GroupController::class)->middleware(['auth', 'verified'])->names('admin.groups');







Route::get("/articles/viewConfirmDelete/{id}", [ArticleController::class, "viewConfirmDelete"])->middleware(['auth', 'verified'])->name("admin.articles.viewConfirmDelete");

Route::get("/articles/inactive", [ArticleController::class, 'inactive'])->middleware(['auth', 'verified'])->name('admin.articles.inactive');


Route::get("/articles/inactivate/{department}", [ArticleController::class, 'inactivate'])->middleware(['auth', 'verified'])->name('admin.articles.inactivate');
Route::get("/articles/pdf/list", [ArticleController::class, "pdfList"])->middleware(['auth', 'verified'])->name("admin.articles.pdf.list");

Route::put("/articless/updateCantidad/{group}", [ArticleController::class, 'updateCantidad'])->middleware(['auth', 'verified'])->name('admin.articles.updateCantidad');

Route::get("/articles/activate/{group}", [ArticleController::class, 'activate'])->middleware(['auth', 'verified'])->name('admin.articles.activate');

Route::resource("/articles", ArticleController::class)->middleware(['auth', 'verified'])->names('admin.articles');



Route::get("/details/pdf/list", [DetailController::class, "pdfList"])->middleware(['auth', 'verified'])->name("admin.details.pdf.list");
Route::resource("/details", DetailController::class)->middleware(['auth', 'verified'])->names('admin.details');






Route::get("/purchasingDetails/pdf/{id}", [PurchasingDetailsController::class, "pdf"])->middleware(['auth', 'verified'])->name("admin.purchasingDetails.pdf");
Route::resource("/purchasingDetails", PurchasingDetailsController::class)->middleware(['auth', 'verified'])->names('admin.purchasingDetails');




Route::get("/projects/activate/{project}", [ProjectController::class, 'activate'])->middleware(['auth', 'verified'])->name('admin.projects.activate');
Route::get("/projects/viewConfirmDelete/{id}", [ProjectController::class, "viewConfirmDelete"])->middleware(['auth', 'verified'])->name("admin.projects.viewConfirmDelete");


Route::get("/projects/inactive", [ProjectController::class, 'inactive'])->middleware(['auth', 'verified'])->name('admin.projects.inactive');
Route::get("/projects/inactivate/{department}", [ProjectController::class, 'inactivate'])->middleware(['auth', 'verified'])->name('admin.projects.inactivate');
Route::get("/projects/pdf/list", [ProjectController::class, "pdfList"])->middleware(['auth', 'verified'])->name("admin.projects.pdf.list");


Route::resource("/projects", ProjectController::class)->middleware(['auth', 'verified'])->names('admin.projects');



require __DIR__ . '/auth.php';
