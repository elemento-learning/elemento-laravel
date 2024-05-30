<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'login')->name('login');
Route::view('/register', 'register')->name('register');
Route::view('/dashboard', 'dashboard.index')->name('dashboard');

Route::view('/modul', 'modul.index')->name('modul');
Route::view('/modul/create', 'modul.form')->name('modul.create');
Route::view('/modul/edit/{id}', 'modul.form')->name('modulEdit');

Route::view('/magic-card', 'magic-card.index')->name('magic-card');
Route::view('/magic-card/create', 'magic-card.form')->name('magic-card.create');
Route::view('/magic-card/edit/{id}', 'magic-card.form')->name('magicCardEdit');
