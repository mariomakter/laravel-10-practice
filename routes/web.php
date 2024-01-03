<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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
    //  return view('welcome');
    // $users = User::all();
    $users = User::get();
    // $user = User::create([
    //     'name' => 'Tania',
    //     'email' => "sania@gmail.com",
    //     'password' =>'12345678',
    // ]);
    // dd($user);
    // $user = User::where('id', 3)->first();
    // $user->update([
    //     'name' => 'Sadia',
    // ]);
    // dd($user);
    // $user = User::find(3);
    // $user->delete();
    // dd($user);
    dd($users);
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
