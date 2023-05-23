<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConnectionsController;
use App\Http\Controllers\CinetpayController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\Admin\TbadminsController;
use App\Http\Controllers\Jury\TbjurysController;
use App\Http\Controllers\Candidat\TbcandidatsController;
use App\Http\Controllers\Candidat\DossiersController;
use App\Http\Controllers\Candidat\FactureController;
use App\Http\Controllers\Candidat\ProfilsController;
use App\Http\Controllers\Candidat\DiagramController;
use App\Http\Controllers\ImmersionController;
use App\Http\Controllers\CynetpaysController;
use App\Http\Controllers\UserProfileController;
use App\Charts\Charts\BaseChart;
use App\Events\Message;
use Illuminate\Http\Resquest;
use Illuminate\Http\Reponse;
use Dompdf\Dompdf;
use  \Illuminate\Support\Facades\Artisan;

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



Route::get('/',function () {
    return redirect('login');
});
Route::get('/test','ConnectionsController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route pour l'accès adminitration
Route::get('/admins','Admin\TbadminsController@index')->name('admin');
Route::get('/admins/register','Admin\registerController@index');
Route::get('/admins/show/{id}','Admin\TbadminsController@show');
Route::get('/admins/recherche', 'Admin\TbadminsController@recherche')->name('recherche');
Route::get('admins/diagram', 'Admin\DiagramController@diagram');
Route::get('/admins/documentPBE', 'Admin\TbadminsController@pbe');
//calendar
Route::get('/admins/calendrier', 'Admin\CalendrierController@index')->name('calendar.index');
Route::post('/admins/create-event', 'Admin\Calendrier@create')->name('calendar.create');
/*Route::patch('admins/edit-event', 'Admin\CalendrierController@edit')->name('calendar.edit');
Route::delete('admins/remove-event', 'Admin\CalendrierController@destroy')->name('calendar.destroy');*/

Route::get('/candidats/calendrier', 'Admin\CalendrierController@calendrierC');
Route::get('/jurys/calendrier', 'Admin\CalendrierController@calendrierJ');

//route pour l'accès jurys
Route::get('/jurys', 'Jury\TbjurysController@index')->name('jury');
Route::get('/jurys/register', 'Jury\RegisterController@index');

Route::get('/jurys/show/{id}', 'Jury\TbjurysController@show');
Route::get('/jurys/recherche', 'Jury\TbjurysController@recherche');
Route::get('jurys/diagram', 'Jury\DiagramController@diagram');
Route::get('/jurys/documentPBE', 'Jury\TbjurysController@pbe');
Route::get('/jurys/calendrier', 'Admin\CalendrierController@calendrierJ');
//+++++++++++++++++++++++ lES ROUTE DES NOTES+++++++++++++++++++++++++++++++
Route::post('/jurys/show/{id}', 'Jury\TbjurysController@note');



//route pour l'accès candidat
Route::get('/candidats', 'Candidat\TbcandidatsController@index')->name('candidat');
Route::get('/candidats/statistique', 'Candidat\DiagramController@diagram');
Route::get('/candidats/documentPBE', 'Candidat\TbcandidatsController@pbe');
Route::get('/candidats/facture','Candidat\FactureController@index');
Route::get('/candidats/facture-print','Candidat\FactureController@print');


Route::get('/dossiers/soumettre', 'Candidat\DossiersController@index');
Route::post('/dossiers/soumettre', 'Candidat\DossiersController@store');
Route::get('/dossiers/show/{id}', 'Candidat\DossiersController@show');
Route::get('/dossiers/edit/{id}', 'Candidat\DossiersController@edit')->name('dossiers.edit');
Route::put('/dossiers/update/{id}', 'Candidat\DossiersController@update');
Route::post('/dossiers/destroy', 'Candidat\DossiersController@destroy')->name('dossiers.destroy');
//Route::resource('dossiers', Candidat\DossiersController::class);

//la route de vérification du mail utilisateur
Route::get('/soumision/{id}/{token}', 'Auth\RegisterController@notification');
//Route::get('/soumision/{id}/{token}', 'Jury\RegisterController@notification');


//L'intégration du module de paiment Cinetpay
Route::get('/candidats/notify/', 'CynetpaysController@notify')->name('notify');
////
Route::get('cinet_return', 'CinetpayController@retour')->name('cinet-return');
Route::post('cinet_initialisation', 'CinetpayController@initialisation')->name('cinet-init');
Route::get('cinet_cancel', 'CinetpayController@cancel')->name('cinet-cancel');



//==========================================================================

//==========================================================================
//=======================JURYS CHAT=========================================

Route::get('/jurys/chats', 'ChatController@userlist');
Route::get('/jurys/chat/{id}', 'ChatController@send');
Route::post('/jurys/sends/{id}', 'ChatController@sav');
Route::get('/jurys/messagerie/{id}', 'ChatController@store');

//==========================admins=========================================
Route::get('/admins/chats', 'Admin\ChatController@userlist')->name('chats');
Route::get('/admins/chat/{id}', 'Admin\ChatController@send');
Route::post('/admins/sends/{id}', 'Admin\ChatController@sav');
Route::get('/admins/messagerie/{id}', 'Admin\ChatController@store');

//====== Route chatb candidat ====================================
Route::get('/candidats/chats', 'Candidat\ChatController@userlist');
Route::get('/candidats/chat/{id}', 'Candidat\ChatController@send');
Route::post('/candidats/sends/{id}', 'Candidat\ChatController@sav');
Route::get('/candidats/messagerie/{id}', 'Candidat\ChatController@store');

///==========================================================

//========================== la route des profiles==========

Route::get('/candidats/profile', 'Candidat\ProfilsController@index');
Route::put('/candidats/profile-info/{id}', 'Candidat\ProfilsController@infoprofile');
Route::put('/candidats/profile/{id}', 'Candidat\ProfilsController@updatepicture');

Route::get('/admins/profile', 'Admin\ProfilsController@index');
Route::put('/admins/profile-info/{id}', 'Admin\ProfilsController@infoprofile');
Route::put('/admins/profile/{id}', 'Admin\ProfilsController@updatepicture');

Route::get('/jurys/profile', 'Jury\ProfilsController@index');
Route::put('/jurys/profile-info/{id}', 'Jury\ProfilsController@infoprofile');
Route::put('/jurys/profile/{id}', 'Jury\ProfilsController@updatepicture');



//================= blogs==========================================
Route::get('/candidats/blog', 'BlogsController@blogC');
Route::get('/candidats/blog-create', 'BlogsController@createC');
Route::post('/candidats/blog', 'BlogsController@storeC');
Route::get('/candidats/blog/{id}/{title}', 'BlogsController@showC');

Route::get('/admins/blog', 'BlogsController@blogA');
Route::get('/admins/blog-create', 'BlogsController@createA');
Route::post('/admins/blog', 'BlogsController@storeA');
Route::get('/admins/blog/{id}/{title}', 'BlogsController@showA');
Route::get('/admins/blog/edit/{id}', 'BlogsController@updateA');

Route::get('/jurys/blog', 'BlogsController@blogJ');
Route::get('/jurys/blog-create', 'BlogsController@createJ');
Route::post('/jurys/blog', 'BlogsController@storeJ');
Route::get('/jurys/blog/{id}/{title}', 'BlogsController@show');

//===========gallery=============================================

Route::get('/candidats/gallery','GalleryController@galleryC');
Route::get('/candidats/gallery-create','GalleryController@createC');
Route::post('/candidats/gallery','GalleryController@storeC');

Route::get('/admins/gallery', 'GalleryController@galleryA');
Route::get('/admins/gallery-create','GalleryController@createA');
Route::post('/admins/gallery','GalleryController@storeA');

Route::get('/jurys/gallery', 'GalleryController@galleryJ');
Route::get('/jurys/gallery-create','GalleryController@createJ');
Route::post('/jurys/gallery','GalleryController@storeJ');
//==================================iamge utilisateur===============
Route::get('/test','HomeController@logique');


//=============================la liste de moyenne de chaque etudiants=====================

Route::get('/jurys/listemoyenne', 'Jury\TbjurysController@listemoyenne');
Route::get('/admins/listemoyenne', 'Admin\TbadminsController@listemoyenne');


//===============================Programmes immersion communautaire========================

Route::get('/PIC/programmes_immersion_commnunautaire', 'ImmersionController@index')->name('immersions');
Route::post('/PIC/programmes_immersion_commnunautaire', 'ImmersionController@register')->name('immersion');
Route::get('/PIC/programmes_immersion_commnunautaire/{id}/{statut}', 'ImmersionController@notification');

Route::get('/admins/immersion', 'ImmersionController@immersion');



//j'excecute ce code lorsque mes images ne s'affiche plus et le storage ne fonctionne plus
Route::get('fix-image',function(){
    try{
        Artisan::call('storage:link'); //on crée le liens symbolique
        Artisan::call('view:clear', []);
        Artisan::call('config:clear', []);//on vide les caches
        Artisan::call('cache:clear', []);
        Artisan::call('storage:link');//on crée le liens symbolique a nouveau

        shell_exec('php artisan storage:link');//si ça fonctionne pas on force
        shell_exec('ln -s /storage/app/public /public/storage'); //On utilise linux pour créer le lien à nouveau

        return 'it works 1';
    }catch(\Exception $ex){
        return "error : ".$ex->getMessage();
    }
});