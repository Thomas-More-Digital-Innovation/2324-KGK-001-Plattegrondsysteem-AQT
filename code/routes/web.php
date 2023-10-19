<?php
// Import route handler
use Illuminate\Support\Facades\Route;

// Import controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\voedselsoortenController;
use App\Http\Controllers\voederrichtlijnenController;
use App\Http\Controllers\WerkplaatsadminController;
use App\Http\Controllers\DiersoortController;
use App\Http\Controllers\DierController;
use App\Http\Controllers\OpvolgingController;
use App\Http\Controllers\ProtocollenController;
use App\Http\Controllers\InventarisadminController;
use App\Http\Controllers\LampController;
use App\Http\Controllers\GewichtChartControler;
use App\Http\Controllers\TemperatuurChartController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\medischeFicheController;

// required for login
require __DIR__.'/auth.php';

// assign root route to login page
Route::get('/', function () {
    return view('auth.login');
});

// -- user section --
// main page
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// werkplek - home
Route::get('/werkplek', function () {
    $id = request('id'); // vraagt id op
    return view('werkplek', ['id' => $id]); // geeft id mee aan de view
});

// dierenfiche & checklist
Route::get('/dierefiche', function () {
    $id = request('id');
    $gewicht = app('App\Http\Controllers\GewichtChartControler')->gewichtLineChart();
    return view('dierefiche', ['id' => $id, 'gewicht' => $gewicht]);
});
Route::get('/comment/{id}/{id2}/{id3}', [HomeController::class, 'commentupdate']);

// inventaris - home
Route::get('/inventaris', function(){
    return view('inventaris');
})->name('inventaris');

// protocollen - home
Route::get('/protocollen', function () {
    return view('components.pages.protocollenhome');
})->name('protocollen');

// protocollen - type
Route::get('/protocoltype', function() {
    $id = request('id');
    $title = request('t');
    $color = request('c');
    return view('components.pages.protocollentypehome', ['id' => $id, 'title' => $title, 'color' => $color]);
});

// protocollen - detail
Route::get('/protocolinfo', function() {
    $id = request('id');
    $title = request('t');
    $color = request('c');
    return view('components.pages.protocolleninfohome', ['id' => $id, 'title' => $title, 'color' => $color]);
});

// voederrichtlijnen - home
Route::get('/voederrichtlijnen', function(){
    return view('voederrichtlijnen');
})->name('voederrichtlijnen');

// voederrichtlijnen - type
Route::get('/voedsel', function(){
    $id = request('id');
    return view('voedsel', ['id' => $id]);
})->name('voedsel');

Route::get('comment/{id}/{id2}/{id3}', [HomeController::class, 'commentupdate']);

Route::get('checkitem/{id}/{id2}/{id3}/{id4}', [HomeController::class, 'checkitemadd']);

Route::get('checkboxitem/{id}/{id2}/{id3}/{id4}/{id5}', [HomeController::class, 'checkboxitemadd']);

Route::get('voedselsoorten', [voedselsoortenController::class, 'voedselSoorten'])->middleware('auth')->name('voedselsoorten');

// account - home
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// redir to /profile? idk
Route::get('/account', [HomeController::class, 'account'])->middleware('auth')->name('account');

// afmelden
// --> auth.php

// -- admin section --
// admin - home
Route::get('/admin', [HomeController::class, 'adminhome'])->middleware('auth')->name('admin');

// admin - studenten
// view pages
Route::get('/students', [HomeController::class, 'students'])->middleware('auth')->name('students');
Route::get('/edituser/{id}', [HomeController::class, 'editUser'])->middleware('auth');

// data handlers
Route::post('/addUser', [HomeController::class, 'addUser'])->middleware('auth');
Route::post('/generateuser', [HomeController::class, 'userImport'])->middleware('auth');
Route::put('/updateuser/{id}', [HomeController::class, 'updateUser'])->middleware('auth');
Route::get('/deleteuser/{id}', [HomeController::class, 'deleteUser'])->middleware('auth');

// admin - protocollen
// view pages
Route::get('/admin/protocollen', [ProtocollenController::class, 'protocoladmin'])->middleware('auth')->name('protocoladmin');
Route::get('/admin/protocollen/edit/{id}', [ProtocollenController::class, 'protocoledit'])->middleware('auth')->name('protocoledit');

// data handlers
Route::post('/admin/protocollen/add/', [ProtocollenController::class, 'protocoladd'])->middleware('auth')->name('protocoladd');
Route::put('/admin/protocollen/update/{id}', [ProtocollenController::class, 'protocolupdate'])->middleware('auth')->name('protocolupdate');
Route::get('/admin/protocollen/delete/{id}', [ProtocollenController::class, 'protocoldelete'])->middleware('auth')->name('protocoldelete');

// admin - dier
// view pages
Route::get('/dier', [DierController::class, 'index'])->name('dier');
Route::get('/dier/create', [DierController::class, 'viewinput']);

// data handlers
Route::post('/dier-submit', [DierController::class, 'diersubmit']);
Route::delete('/dier-verwijderen/{id}', [DierController::class, 'dierverwijderen']);
Route::get('/dier-edit/{id}', [DierController::class, 'diersoortedit']);
Route::put('/dier-update/{id}', [DierController::class, 'dierupdate']);

// admin - diersoort
// view pages
Route::get('/dierensoorten', [DiersoortController::class, 'index'])->name('dierensoorten');
Route::get('/dierensoorten/create', function () {
    return view('diersoort-input');
});

// data handlers
Route::post('/diersoort-submit', [DiersoortController::class, 'diersoortsubmit']);
Route::get('/diersoort-edit/{id}', [DiersoortController::class, 'diersoortedit']);
Route::put('/diersoort-update/{id}', [DiersoortController::class, 'diersoortupdate']);
Route::delete('/dierensoorten/{id}', [DiersoortController::class, 'destroy']);

// admin - werkplaatsen
// view pages
Route::get('/werkplaatsadmin', [WerkplaatsadminController::class, 'index'])->name('werkplaatsadmin.index');

// data handlers
Route::post('/werkplaatsadmin/update', [WerkplaatsadminController::class, 'updateWorkplaceStatus'])->name('werkplaatsadmin.update');

// admin inventarisselect
Route::get('/inventarisselect', function(){
    return view('inventarisselect');
})->name('inventarisselect');

Route::get('/lampadmin', function(){ // do we need this?
    return view('lampadmin');
})->name('lampadmin');

Route::get('/plantadmin', function(){
    return view('plantadmin');
})->name('plantadmin');

// admin - inventaris
// view pages
Route::get('/inventarisadmin', [InventarisadminController::class, 'index'])->name('inventarisadmin');
Route::get('/inventarisedit', [InventarisadminController::class, 'inventarisedit'])->name('inventarisedit');

// data handlers
Route::get('deleteinventaris/{id}', [InventarisadminController::class, 'deleteinventaris']);
Route::post('/inventarisadmin/make', [InventarisadminController::class, 'makeInventaris'])->name('inventarisadmin.makeInventaris');
Route::put('/inventarisadmin/update', [InventarisadminController::class, 'inventarisupdate'])->name('inventarisadmin.update');
Route::post('/inventarisadmin', 'InventarisadminController@makeInventaris')->name('inventarisadmin.post');

// admin - lamp

Route::get('/lampadmin', [LampController::class, 'index'])->name('lampadmin');

// data handlers
Route::post('/lampadmin/make', [LampController::class, 'make'])->name('lampadmin.make');


// admin - plant
Route::get('/plantadmin', [PlantController::class, 'index'])->name('plantadmin');

// data handlers
Route::post('/plantadmin/make', [PlantController::class, 'make'])->name('plantadmin.make');
Route::post('/plantadmin/koppel', [PlantController::class, 'koppel'])->name('plantadmin.koppel');
Route::get('/deleteplant/{id}', [PlantController::class, 'deleteplant'])->middleware('auth');
Route::get('/deleteplantkoppel/{id}/{id2}', [PlantController::class, 'deletePlantkoppel'])->middleware('auth');


Route::get('/lampedit/{id}', [LampController::class, 'lampedit'])->name('lampedit');
Route::post('/lampadmin/make', [LampController::class, 'make'])->name('lampadmin.make');
Route::post('/lampadmin/update/{id}', [LampController::class, 'lampupdate'])->name('lampupdate');
Route::get('/deletelamp/{id}', [LampController::class, 'deleteLamp'])->middleware('auth');


// admin - voederrichtlijnen
// view pages
Route::get('/voedingsrichtlijnenadmin', [voederrichtlijnenController::class , 'voederrichtlijnen'])->middleware('auth')->name('voederrichtlijnenadmin');
// Route::get('/editvoedingsrichtlijn/{id}', [voederrichtlijnenController::class,'editVoederrichtlijn']);

// data handlers
Route::post('/addeditvoedingsrichtlijn', [voederrichtlijnenController::class, 'addeditVoederrichtlijn']);
Route::put('/updatevoedingsrichtlijn/{id}', [voederrichtlijnenController::class, 'updateVoederrichtlijn']);
Route::get('/deletevoedingsrichtlijn/{id}', [voederrichtlijnenController::class, 'deleteVoederrichtlijn']);

// admin - voedselsoorten
// view pages
Route::get('/voedselsoorten', [voedselsoortenController::class, 'voedselSoorten'])->middleware('auth')->name('voedselsoorten');

// data handlers
Route::post('/addeditvoedselsoort', [voedselsoortenController::class, 'addeditvoedselSoort']);
Route::get('/deletevoedselsoort/{id}', [voedselsoortenController::class, 'deletevoedselSoort']);

// admin - medische fiche
// view pages
Route::get('/medischefiche', [medischeFicheController::class, 'index'])->middleware('auth')->name('medischeFiche');

// data handlers
Route::post('/fichesubmit', [medischeFicheController::class, 'fichesubmit']);
Route::get('/fichedelete/{id}', [medischeFicheController::class, 'fichedelete']);


// admin - opvolging
// view pages
Route::get('/admin/opvolging', [OpvolgingController::class, 'opvolging'])->middleware('auth')->name('opvolgingadmin');

// data handlers
Route::post('admin/addeditopvolging', [OpvolgingController::class, 'addeditopvolging']);
Route::get('admin/deleteopvolging/{id}/{id2}', [OpvolgingController::class, 'deleteopvolging']);

// admin - logboek
// view pages

// data handlers
Route::get('/gewichtlinechart', [GewichtChartControler::class,'gewichtLineChart']);
Route::get('/temperatuurlinechart', [TemperatuurChartController::class,'temperatuurLineChart']);
?>