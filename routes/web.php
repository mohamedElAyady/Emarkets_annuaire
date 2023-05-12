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


/**  admin/utilisateurs routes */
Route::get('admin/utilisateurs/poubelle', 'App\Http\Controllers\UtilisateurController@poubelle')->name('utilisateurs.poubelle');
Route::get('admin/utilisateurs/{id}/restore', 'App\Http\Controllers\UtilisateurController@restore')->name('utilisateurs.restore');
Route::delete('admin/utilisateurs/{id}/harddelete', 'App\Http\Controllers\UtilisateurController@hardDelete')->name('utilisateurs.harddelete');
Route::resource('admin/utilisateurs', 'App\Http\Controllers\UtilisateurController')->except(['store']);
Route::post('admin/utilisateurs', 'App\Http\Controllers\UtilisateurController@store')->name('utilisateurs.store');
Route::get('admin/utilisateurs/softDelete/{id}', 'App\Http\Controllers\UtilisateurController@softDelete')->name('utilisateurs.softdelete');
Route::post('admin/utilisateurs/{id}/updateUser', 'App\Http\Controllers\UtilisateurController@updateUser')->name('utilisateurs.updateUser');
Route::post('/utilisateurs/{id}/change-password', 'App\Http\Controllers\UtilisateurController@changePassword')->name('utilisateurs.changePassword');

/**  admin/entreprises routes */
Route::get('admin/entreprises/poubelle', 'App\Http\Controllers\EntrepriseController@poubelle')->name('entreprises.poubelle');
Route::get('admin/entreprises/{id}/restore', 'App\Http\Controllers\EntrepriseController@restore')->name('entreprises.restore');
Route::delete('admin/entreprises/{id}/harddelete', 'App\Http\Controllers\EntrepriseController@hardDelete')->name('entreprises.harddelete');
Route::resource('admin/entreprises', 'App\Http\Controllers\EntrepriseController')->except(['store']);
Route::post('admin/entreprises', 'App\Http\Controllers\EntrepriseController@store')->name('entreprises.store');
Route::get('admin/entreprises/softDelete/{id}', 'App\Http\Controllers\EntrepriseController@softDelete')->name('entreprises.softdelete');
Route::post('admin/entreprises/{id}/updateUser', 'App\Http\Controllers\EntrepriseController@updateUser')->name('entreprises.updateUser');
Route::post('/entreprises/{id}/change-password', 'App\Http\Controllers\EntrepriseController@changePassword')->name('entreprises.changePassword');
