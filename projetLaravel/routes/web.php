<?php

use App\Models\Correction;
use App\Models\Epreuve;
use Illuminate\Support\Facades\Route;


/*
 *
 */
Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

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



Auth::routes();
#admin
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\adminController::class, 'index'])->name('admin');
    Route::resource('myUsers', App\Http\Controllers\MyUserController::class);
    Route::resource('epreuves', App\Http\Controllers\EpreuveController::class);
    Route::resource('corrections', App\Http\Controllers\CorrectionController::class);
    #newsletter
    Route::post('admin/send-newsletter', [App\Http\Controllers\adminController::class, 'sendMail'])->name('sendMail');
});


#visiteur
Route::get('/', [App\Http\Controllers\guestController::class, 'welcome'])->name('welcome');
Route::get('/about', [App\Http\Controllers\pageController::class, 'about'])->name('about');
Route::get('/condition', [App\Http\Controllers\pageController::class, 'condition'])->name('condition');
Route::get('/contact', [App\Http\Controllers\pageController::class, 'contact'])->name('contact');
Route::get('/help', [App\Http\Controllers\pageController::class, 'help'])->name('help');
Route::get('/politiqueConf', [App\Http\Controllers\pageController::class, 'politiqueConf'])->name('politiqueConf');
#users
Route::get('/home',  [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('bibliotheque/corrections/{id}/epreuve',  [App\Http\Controllers\HomeController::class, 'showCorrections'])->name('corrections');
Route::get('/profil',  [App\Http\Controllers\HomeController::class, 'profil'])->name('profil');
Route::get('/profil/{id}/edit',  [App\Http\Controllers\HomeController::class, 'edit'])->name('profilEdit');
Route::get('/profil/{id}/update',  [App\Http\Controllers\HomeController::class, 'update'])->name('profilUpdate');
Route::post('/sendMailNewsletter',  [App\Http\Controllers\HomeController::class, 'sendMailNewsletter'])->name('sendMailNewsletter');
Route::get('/profil/{id}/password/edit',  [App\Http\Controllers\HomeController::class, 'editPassword'])->name('passwordEdit');
Route::get('/profil/{id}/password/update',  [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('passwordUpdate');


#epreuve
Route::get('/download/{id}/epreuve', [App\Http\Controllers\EpreuveController::class, 'download'])->name('downloadEpreuve');
Route::get('/read/{id}/epreuve', [App\Http\Controllers\EpreuveController::class, 'readFile'])->name('readFileEpreuve');
Route::resource('epreuvesUser', App\Http\Controllers\EpreuveUserController::class);
#correction
Route::get('/download/{id}/correction', [App\Http\Controllers\CorrectionController::class, 'download'])->name('downloadCorrection');
Route::get('/read/{id}/correction', [App\Http\Controllers\CorrectionController::class, 'readFile'])->name('readFileCorrection');
Route::get('bibliotheque/corrections/{id}/epreuve/create', [App\Http\Controllers\CorrectionUserController::class, 'create'])->name('addCorrection');
Route::resource('correctionsUser', App\Http\Controllers\CorrectionUserController::class);

