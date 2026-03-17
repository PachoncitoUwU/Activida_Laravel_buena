<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('welcome');
});

Route::get('/aprendices', function (){
    return view("aprendices");
});

Route::get('/consultar',function(){
    $user = new App\Models\User();
    //SELECT * FROM users
    return dd($user->all());
});

Route::get('/insertar',function(){
    $user = new App\Models\User();
    $user-> email = 'otroemail@mail.com';
    $user-> name = 'Otro Ejemplo';
    $user-> password = 'mypassword';
    $user-> save();
    // Insert into users (email, name, password) values ('?,?,?')
    return dd($user);
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.list');