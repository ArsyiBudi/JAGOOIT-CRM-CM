<?php

use Illuminate\Support\Facades\Route;

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


// Client
Route::get('/', function () {
    return view('clients.landing');
});

Route::get('/track', function () {
    return view('admin.track');
});
// Client End


// Admin 
Route::get('/login', function () {
    return view('admin.login');
});

Route::get('/leads/menu', function () {
    return view('admin.leads.menu');
});

Route::get('/leads/create', function () {
    return view('admin.leads.create');
});

Route::get('/leads/detail', function () {
    return view('admin.leads.detail');
});

Route::get('/leads/activity/create', function () {
    return view('admin.leads.create');
});

Route::get('/leads/offer/create', function () {
    return view('admin.leads.offer');
});
// Admin End