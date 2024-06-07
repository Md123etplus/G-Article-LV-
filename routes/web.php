<?php

use App\Http\Controllers\gestionArticles;
use App\Http\Controllers\test;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.index');
});//l'index mais pour plus tard
Route::get('/register', function () {
    return view('users.acceuil');
})->name('registration');
Route::get('/test/{username}', [test::class,'method1']);//
Route::get('/bar', [test::class,'bar']);//
Route::middleware('guest')->group(function(){
    Route::post('/register',[userController::class,'register'])->name('register');
    Route::post('/acceuil',[test::class,'store']);//
    Route::get('/login',[userController::class,'showLoginForm'])->name('login');
    Route::post('/login',[userController::class,'login'])->name('login');
});

Route::middleware('auth')->group(function(){
    Route::prefix('ajouterTitre')->group(function(){
        Route::get('/',[gestionArticles::class,'index'])->name('so')->withoutMiddleware('auth');
        Route::post('/',[gestionArticles::class,'ajouterTitre'])->name('articles');
        Route::get('/{article}',[gestionArticles::class,'show'])->name('articles.show')->withoutMiddleware('auth');
        Route::get('/{article}/edit',[gestionArticles::class,'edit'])->name('articles.edit');
        Route::put('/{article}/update',[gestionArticles::class,'update'])->name('articles.update');
        Route::delete('/{article}/delete',[gestionArticles::class,'delete'])->name('articles.delete');
        Route::get('/{user}/mine',[gestionArticles::class,'mine'])->name('articles.mine');
    });
    Route::get('/home',[userController::class,'dashboard'])->name('dashboard')->withoutMiddleware('auth');
    Route::get('/logout',[userController::class,'logout'])->name('logout');
});

// Route::get('/ajouterTitre',[gestionArticles::class,'index']);
// Route::post('/ajouterTitre',[gestionArticles::class,'ajouterTitre']);
// Route::get('/ajouterTitre/{article}',[gestionArticles::class,'show']);
// Route::get('/ajouterTitre/{article}/edit',[gestionArticles::class,'edit']);
// Route::put('/ajouterTitre/{article}/update',[gestionArticles::class,'update']);
// Route::delete('/ajouterTitre/{article}/delete',[gestionArticles::class,'delete']);