<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Index;

use App\Http\Controllers\HomeController;

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
   return view('auth.login');
});


Route::get('dierefiche', function () {
    $id = request('id'); // Retrieve the 'id' query parameter
    return view('dierefiche', ['id' => $id]); // Pass the 'id' to the view
});

Route::get('protocollen', function () {
    return view('components.pages.protocollenhome');
 })->name('protocollen');

Route::get('voederrichtlijnen', function(){ // voederrichtlijnen pagina 1
    return view('voederrichtlijnen');
})->name('voederrichtlijnen');

Route::get('voedsel', function(){ // voederrichtlijnen pagina 2
    $id = request('id');
    return view('voedsel', ['id' => $id]);
})->name('voedsel');

Route::get('account', [HomeController::class, 'account'])->middleware('auth')->name('account');

Route::post('addUser', [HomeController::class, 'addUser'])->middleware('auth');

Route::get('deleteuser/{id}', [HomeController::class, 'deleteUser'])->middleware('auth');

Route::get('edituser/{id}', [HomeController::class, 'editUser'])->middleware('auth');
Route::put('updateuser/{id}', [HomeController::class, 'updateUser'])->middleware('auth');

Route::get('home', [HomeController::class, 'index'])->middleware('auth')->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('werkplek', function () {
    $id = request('id'); // vraagt id op
    return view('werkplek', ['id' => $id]); // geeft id mee aan de view
});

Route::get('protocoltype', function() {
   $id = request('id');
   $title = request('t');
   $color = request('c');
   return view('components.pages.protocollentypehome', ['id' => $id, 'title' => $title, 'color' => $color]);
});

Route::get('protocolinfo', function() {
   $id = request('id');
   $title = request('t');
   $color = request('c');
   return view('components.pages.protocolleninfohome', ['id' => $id, 'title' => $title, 'color' => $color]);
});


require __DIR__.'/auth.php';
