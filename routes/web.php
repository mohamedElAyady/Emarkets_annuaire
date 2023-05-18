<?php
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\AnnuaireController;
use App\Http\Controllers\EntrepriseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/',[AcceuilController::class,'index']);
Route::get('/connect','App\Http\Controllers\AcceuilController@redirect')->middleware('auth','verified');

Auth::routes();

Route::get('/card', function () {
    return view('/card_details');
});
Route::get('/details/{id}', [AnnuaireController::class, 'affiche_details'])->name('details');
Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store');





Route::get('/annuaire',[AnnuaireController::class,'Annuaire']);
Route::get('/acceuil',[AcceuilController::class,'Acceuil']);
Route::get('/demande_entreprise',[EntrepriseController::class,'demande_entreprise'])->middleware('auth','verified');



Route::get('/admin/dashboard',[AdminController::class,'dashbord'])->middleware('auth','verified');


Route::get('/admin', function () {
    return view('/admin/admin_layout');
});


Route::get('/entreprise', function () {
    return view('/demande_entreprise');
});


Route::get('/profil', function () {
    return view('/profile/editprofil');
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


// Route::get('/admin/dashboard', function () {
//     return view('/admin/dashboard');
// });



Route::post('admin/entreprises', 'App\Http\Controllers\EntrepriseController@store')->name('entreprises.store');


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

/**  admin/demandes routes */
Route::resource('admin/demandes', 'App\Http\Controllers\DemandeController')->except(['store']);
Route::get('/demandes/{id}/accepte', 'App\Http\Controllers\DemandeController@accepte')->name('demandes.accepte');
Route::get('/demandes/{id}/rejette','App\Http\Controllers\DemandeController@rejette')->name('demandes.rejette');

/*layout initialization*/
Route::get('/admin/admin_layout', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.admin_layout');

/**  admin/annonces routes */
Route::get('/admin/annonces/changeStatus', [App\Http\Controllers\AnnonceController::class, 'changeStatus'])->name('admin.annonces.changeStatus');
Route::resource('admin/annonces', 'App\Http\Controllers\AnnonceController');
Route::post('admin/annonces/{annonce}', 'AnnonceController@update');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');