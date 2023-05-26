<?php
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\AnnuaireController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\PackController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[AcceuilController::class,'index'])->name('home');
Route::get('/connect','App\Http\Controllers\AcceuilController@redirect')->middleware('auth','verified');

Auth::routes();

Route::get('/details/{id}', [AnnuaireController::class, 'affiche_details'])->name('details');
Route::get('/annuaire',[AnnuaireController::class,'Annuaire']);
Route::get('/acceuil',[AcceuilController::class,'Acceuil']);
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/search', 'App\Http\Controllers\SearchController@search')->name('search');
Route::post('/creer_demande_annoncement', 'App\Http\Controllers\EntrepriseController@demandeAnnoncement')->name('creer_demande_annoncement')->middleware('auth','verified');

Route::middleware(['auth','verified'])->group(function () {

    Route::delete('/comments/{id}', [CommentController::class,'destroy'])->name('comments.destroy');
    Route::post('/updatecomment', [CommentController::class, 'update'])->name('comments.update');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/demande_entreprise',[DemandeController::class,'newDemande']);



    Route::get('/profil', function () {return view('/profile/editprofil');});


    Route::middleware(['role.admin'])->group(function () {
        //admin/contact
        Route::resource('admin/contact', 'App\Http\Controllers\ContactController')->except(['store']);

        //admin/dashboard
        Route::get('admin/dashboard', 'App\Http\Controllers\AdminDashboardController@index');
        Route::get('admin', 'App\Http\Controllers\AdminDashboardController@index');

    
        /**  admin/utilisateurs routes */
        Route::get('admin/utilisateurs/poubelle', 'App\Http\Controllers\UtilisateurController@poubelle')->name('utilisateurs.poubelle');
        Route::get('admin/utilisateurs/{id}/restore', 'App\Http\Controllers\UtilisateurController@restore')->name('utilisateurs.restore');
        Route::delete('admin/utilisateurs/{id}/harddelete', 'App\Http\Controllers\UtilisateurController@hardDelete')->name('utilisateurs.harddelete');
        Route::resource('admin/utilisateurs', 'App\Http\Controllers\UtilisateurController')->except(['store']);
        Route::post('admin/utilisateurs', 'App\Http\Controllers\UtilisateurController@store')->name('utilisateurs.store');
        Route::get('admin/utilisateurs/softDelete/{id}', 'App\Http\Controllers\UtilisateurController@softDelete')->name('utilisateurs.softdelete');
        Route::post('admin/utilisateurs/{id}/updateUser', 'App\Http\Controllers\UtilisateurController@updateUser')->name('utilisateurs.updateUser');
        Route::post('/utilisateurs/{id}/change-password', 'App\Http\Controllers\UtilisateurController@changePassword')->name('utilisateurs.changePassword');
        Route::post('/update-usertype', 'App\Http\Controllers\UtilisateurController@updateUserType')->name('utilisateurs.update.usertype');


        /**  admin/entreprises routes */
        Route::post('admin/entreprises', 'App\Http\Controllers\EntrepriseController@store')->name('entreprises.store');
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
        Route::post('/demandes//rejette/{id}', 'App\Http\Controllers\DemandeController@rejette')->name('demandes.rejette');


        /**  admin/annonces routes */
        Route::get('/admin/annonces/adminChangeStatus', [App\Http\Controllers\AnnonceController::class, 'adminChangeStatus'])->name('admin.annonces.adminChangeStatus');
        Route::resource('admin/annonces', 'App\Http\Controllers\AnnonceController');
        Route::post('admin/annonces/{annonce}', 'AnnonceController@update');


        /*admin/contact*/
        Route::get('admin/boiteContact', [ContactController::class, 'initTable'])->name('contact.boiteContact');
        Route::resource('admin/packs', 'App\Http\Controllers\PackController')->except(['store']);
        Route::post('admin/pack/storeData', [PackController::class, 'storeData'])->name('admin.pack.storeData');


        /*admin/profile*/
        Route::get('/admin/profile', function () {return view('admin/admin_profile/profile');})->name('admin.profile');
        Route::post('/admin/change-password', 'App\Http\Controllers\AdminProfileController@changePassword')->name('admin.changePassword');
        Route::post('/admin/update-profile', 'App\Http\Controllers\AdminProfileController@updateProfile')->name('admin.updateProfile');
     });

    /*others*/
    Route::get('/demande', function () {return view('others/creer_demande');});
    Route::get('/demande_annoncement', function () { return view('others/demande_annoncement');});

    Route::middleware(['role.entreprise'])->group(function () {
        /*entreprise interface*/
        Route::get('/entreprise', function () {return view('entreprise/dashboard');})->name('entreprise.dashboard');
        Route::get('/entreprise/annonce', 'App\Http\Controllers\Entreprise\AnnonceController@affiche_details')->name('entreprise.annonce');
        Route::post('/entreprise/annonces/toggleStatut', 'App\Http\Controllers\Entreprise\AnnonceController@toggleStatut')->name('entreprise.annonce.toggleStatut');
        Route::get('/entreprise/support', function () {return view('/entreprise/support'); })->name('entreprise.support');
        Route::get('/entreprise/profile', function () {return view('/entreprise/profile'); })->name('entreprise.profile');
        Route::post('/entreprise/change-password', 'App\Http\Controllers\Entreprise\ChangePasswordController@update')->name('changePassword');
        Route::post('/entreprise/update-profile', 'App\Http\Controllers\Entreprise\ProfileController@update')->name('updateProfile');
        Route::post('/entreprise/supportContact', 'App\Http\Controllers\ContactController@supportContact')->name('entreprises.supportContact');
    });

});

    //logout
    Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
