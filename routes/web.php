<?php

use Illuminate\Support\Facades\Route;

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
    //return redirect()->route('genres.index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


/*Route::get('/teste/{nome}', function ($nome){
    return "<h1> Ola : ".$nome."</h1>";
});
*/
/*Route::get('/soma/{n1}/{n2}', function ($n1,$n2){
    return "<h1> a soma e: ".$n1+$n2." !</h1>";
});
*/
/*
Route::get('layout',function (){
    return view('admin.layout');
});
*/
//Route::get('genres', [\App\Http\Controllers\GenreController::class, 'index']);
Route::prefix('admin')->group(function (){

    Route::resource('genres', \App\Http\Controllers\GenreController::class)->middleware('auth');
    Route::resource('directors', \App\Http\Controllers\DirectorController::class)->middleware('auth');;
    Route::resource('languages', \App\Http\Controllers\LanguageController::class)->middleware('auth');;
    Route::resource('countries', \App\Http\Controllers\CountryController::class)->middleware('auth');;
    Route::resource('movies', \App\Http\Controllers\MovieController::class)->middleware('auth');;
});

require __DIR__.'/auth.php';
