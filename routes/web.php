<?php

use Illuminate\Support\Facades\Route;

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

// Display all customers with GET request
Route::get('/', function () {
    return view('welcome');
});

// Adds a customer with POST reques
Route::post('/customer',function ($request) {

});

// Deletes existing customer with DELETE request
Route::delete('/customer/{id}', function ($id) {

});
