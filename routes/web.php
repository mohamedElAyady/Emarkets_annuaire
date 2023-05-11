<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();


Route::get('/annuaire', function () {
    return view('/annuaire');
});

Route::get('/acceuil', function () {
    return view('/acceuil');
});

Route::get('/admin', function () {
    return view('/admin/admin_layout');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/admin/dashboard', function () {
    return view('/admin/dashboard');
});


Route::get('/admin/dashboard', function () {
    return view('/admin/dashboard');
});


Route::resource('admin/utilisateurs','App\Http\Controllers\UtilisateurController');
Route::post('/utilisateurs', 'App\Http\Controllers\UtilisateurController@store')->name('utilisateurs.store');
Route::get('/utilisateurs/softDelete/{id}', 'App\Http\Controllers\UtilisateurController@softDelete')->name('utilisateurs.softdelete');
Route::get('/utilisateurs/poubelle', 'App\Http\Controllers\UtilisateurController@poubelle');
Route::get('utilisateurs/restore/delete/{id}', 'App\Http\Controllers\UtilisateurController@restore')->name('utilisateur.restore');
Route::get('utilisateurs/harddelete/{id}', 'App\Http\Controllers\UtilisateurController@hardDelete')->name('utilisateur.harddelete');

/*Route::get('/admin/show', function () {
    return view('/admin/utilisateurs/show');
});*/