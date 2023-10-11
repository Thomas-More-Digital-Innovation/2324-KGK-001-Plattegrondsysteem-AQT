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
use App\Http\Controllers\OpvolgingController;
use App\Http\Controllers\ProtocollenController;
use App\Http\Controllers\InventarisadminController;
use App\Http\Controllers\LampController;


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
    return view('dierefiche', ['id' => $id]);
});

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

// medische fiche - home

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

// data handlers


// admin - diersoort
// view pages
Route::get('/dierensoorten', [DiersoortController::class, 'index']);
Route::get('/dierensoorten/create', function () {
    return view('diersoort-input');
});
Route::get('/dierensoorten/{id}/edit', [DiersoortController::class, 'edit']);

// data handlers
Route::post('/diersoort-submit', [DiersoortController::class, 'diersoortsubmit']);
Route::put('/dierensoorten/{id}', [DiersoortController::class, 'update']);
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

Route::get('/lampadmin', function(){
    return view('lampadmin');
})->name('lampadmin');

// admin - inventaris
// view pages
Route::get('/inventarisadmin', [InventarisadminController::class, 'index'])->name('inventarisadmin');

// data handlers
Route::post('/inventarisadmin/make', [InventarisadminController::class, 'makeInventaris'])->name('inventarisadmin.makeInventaris');
Route::post('/inventarisadmin', 'InventarisadminController@makeInventaris')->name('inventarisadmin.post');

// admin - lamp
Route::get('/lampadmin', [LampController::class, 'index'])->name('lampadmin');

// data handlers
Route::post('/lampadmin/make', [LampController::class, 'make'])->name('lampadmin.make');



// admin - voederrichtlijnen
// view pages
Route::get('/voedingsrichtlijnenadmin', [voederrichtlijnenController::class , 'voederrichtlijnen'])->middleware('auth')->name('voederrichtlijnenadmin');
Route::get('/editvoedingsrichtlijn/{id}', [voederrichtlijnenController::class,'editVoederrichtlijn']);

// data handlers
Route::post('/addvoedingsrichtlijn', [voederrichtlijnenController::class, 'addVoederrichtlijn']);
Route::put('/updatevoedingsrichtlijn/{id}', [voederrichtlijnenController::class, 'updateVoederrichtlijn']);
Route::get('/deletevoedingsrichtlijn/{id}', [voederrichtlijnenController::class, 'deleteVoederrichtlijn']);

// admin - voedselsoorten
// view pages
Route::get('/voedselsoorten', [voedselsoortenController::class, 'voedselSoorten'])->middleware('auth')->name('voedselsoorten');
Route::get('/editvoedselsoort/{id}', [voedselsoortenController::class, 'editvoedselSoort']);

// data handlers
Route::post('/addvoedselsoort', [voedselsoortenController::class, 'addvoedselSoort']);
Route::put('/updatevoedselsoort/{id}', [voedselsoortenController::class, 'updatevoedselSoort']);
Route::get('/deletevoedselsoort/{id}', [voedselsoortenController::class, 'deletevoedselSoort']);

// admin - medische fiche
// view pages

// data handlers


// admin - opvolging
// view pages
Route::get('/admin/opvolging', [OpvolgingController::class, 'opvolging'])->middleware('auth')->name('opvolgingadmin');

// data handlers
Route::post('admin/addopvolging', [OpvolgingController::class, 'addopvolging']);
Route::get('admin/deleteopvolging/{id}/{id2}', [OpvolgingController::class, 'deleteopvolging']);

// admin - logboek
// view pages

// data handlers


?>