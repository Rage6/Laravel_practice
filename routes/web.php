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
    // The 'view()' below is actually a function that seeks out the 'welcome' template
    return view('customers');
});

// Adds a customer with POST reques
Route::post('/customer',function ($request) {

  $validator = Validator::make($request->all(), [
    'username' => 'required|max:255',
  ]);

  if ($validator->fails()) {
    return redirect('/')
      ->withInput()
      ->withError($validator);
  }

});

// Deletes existing customer with DELETE request
Route::delete('/customer/{id}', function ($id) {

});
