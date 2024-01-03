<?php

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
    // return view('welcome');
   // fetch all users
    $users = DB::select("select * from users");
    dd($users);
//create new users
// $user = DB::insert('insert into users(name,email,password) values(?,?,?)',[
//     'Mariom',
//     'mariom@gmail.com',
//     12345678,
// ]);
// dd($user);
//update users
//$user = DB::update("update users set name='Maria' where id=1");
//update user alternative way array binding
// $user = DB::update("update users set email=? where id=?", [
//     'maria@gmail.com',
//     1,
// ]);
//  dd($user);
//delete user
$user = DB::delete("delete from users where id=1");
dd($user);
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
