<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [RoleController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Super Admin Routes
//Client under Admin
Route::get('/client',[AdminController::class,'newclients']);
Route::get('/client-loginview',[AdminController::class,'viewNewClient']);
Route::post('/client-login',[AdminController::class,'storeclients']);
Route::get('/viewclient/{id}',[AdminController::class,'viewClient']);
Route::get('/deleteclient/{id}',[AdminController::class,'deleteClient']);

//Dev under Admin
Route::get('/dev',[AdminController::class,'newDev']);
Route::get('/dev-loginview',[AdminController::class,'viewNewdev']);
Route::post('/dev-login',[AdminController::class,'storedevs']);
Route::get('/viewdev/{id}',[AdminController::class,'viewdev']);
Route::get('/deletedev/{id}',[AdminController::class,'deletedev']);

//Project under Admin
Route::get('/project',[AdminController::class,'newproject']);
Route::get('/project-create',[AdminController::class,'createproject']);
Route::post('/projectstore',[AdminController::class,'projectstore']);
Route::get('/projectview/{id}',[AdminController::class,'projectview']);
Route::get('/projectdelete/{id}',[AdminController::class,'projectdelete']);


//ClientLogin Routes
Route::get('/myprojects',[ClientController::class,'myprojects']);
Route::get('/indexproject',[ClientController::class,'indexproject']);

//Client Login - Ticket Routes
Route::get('/raiseticket',[TicketController::class,'raiseticket']);
Route::post('/raiseticketstore',[TicketController::class,'raiseticketstore']);

//Reply Routes
Route::get('/view-reply/{id}',[ReplyController::class,'viewreply']);
Route::post('/store/reply',[ReplyController::class,'storereply']);
require __DIR__.'/auth.php';
