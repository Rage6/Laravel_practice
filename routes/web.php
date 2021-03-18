<?php

use Illuminate\Support\Facades\Route;
// I had to add the below imports based on...
// ... this StackOverflow link (https://stackoverflow.com/questions/34675057/undefined-method-in-requestall)...
use Illuminate\Http\Request;
// ... and a suggestion by the Laravel error message.
use App\Customer;

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
Route::get('/', 'CustomerController@index');

Route::prefix('customer')->group(function() {
  // Adds a customer with POST request
  Route::post('',['as' => 'customer.store', 'uses' => 'CustomerController@store']);

  // Deletes existing customer with DELETE request
  Route::delete('{id}', ['as' => 'customer.destroy', 'uses' => 'CustomerController@destroy']);
});
