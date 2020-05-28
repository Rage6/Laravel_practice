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
Route::get('/', function () {
  // $allCustomers is an 'instance' made with the Customer model (see app/Customer.php) and
  $allCustomers = Customer::orderBy('created_at', 'asc')->get();
  // The 'view()' below is actually a function that seeks out the 'welcome' template
  return view('customers',[
    // When the $allCustomers instance is sent to 'view/customer.blade.php', it is labeled as 'customers'
    'allCustomers' => $allCustomers
  ]);
});

// Adds a customer with POST reques
Route::post('/customer',function (Request $request) {

  $validator = Validator::make($request->all(), [
        'username' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $customer = new Customer;
    $customer->username = $request->username;
    $customer->save();

    return redirect('/');

});

// Deletes existing customer with DELETE request
Route::delete('/customer/{id}', function ($id) {
  Customer::findOrFail($id)->delete();
  return redirect('/');
});
