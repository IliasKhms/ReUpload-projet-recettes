<?php

use Illuminate\Support\Facades\Route;


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

/*Route::get('/', function () {
    return view('welcome');
});
*/
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index']);

use App\Http\Controllers\ContactController;
Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store']);


use App\Http\Controllers\RecettesController;
Route::get('/recettes', [RecettesController::class, 'index']);
Route::get('recipes/search', [RecettesController::class, 'search'])->name('recipes.search');


use App\Http\Controllers\RecipesController;
Route::get('/recettes/{url}',[RecipesController::class, 'show']);

use App\Http\Controllers\AdminRecipesController;
Route::get('/admin/recipes', [AdminRecipesController::class, 'index']);
Route::get('/admin/recipes/{id}/edit', [AdminRecipesController::class,'edit'])->name('adminrecipes.edit');
Route::put('/admin/recipes/{id}', [AdminRecipesController::class, 'update'])->name('adminrecipes.update');
Route::delete('/admin/recipes/{id}', [AdminRecipesController::class, 'destroy'])->name('adminrecipes.destroy');
Route::get('/admin/recipes/create', [AdminRecipesController::class, 'create'])->name('adminrecipes.create');
Route::post('/admin/recipes', [AdminRecipesController::class,'store'])->name('adminrecipes.store');

use App\Http\Controllers\RatingController;
Route::post('/recettes/{url}', [RatingController::class,'store'])->name('ratings.store');

use App\Http\Controllers\CommentaireController;
Route::post('/recettes/{recipe}/comment', [CommentaireController::class, 'store'])->name('comment.store');
Route::delete('/admin/comment/{id}', [CommentaireController::class, 'destroy'])->name('comment.destroy');
