<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// This built-in 'Validator' class is a shorthand way to confirm that a post's values meet all of our criteria. See the 'store' function for example.
use Illuminate\Support\Facades\Validator;
// This is a model's class that is needed when dealing with the dB
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $allCustomers is an 'instance' made with the Customer model (see app/Customer.php) and
      $allCustomers = Customer::orderBy('created_at', 'asc')->get();
      // By default, the 'view()' function below seeks out the 'welcome' template, but the 'customers' argument tells it to use customers.blade.php instead
      return view('customers',[
        // When the $allCustomers instance is sent to 'view/customer.blade.php', it is labeled as 'customers'
        'allCustomers' => $allCustomers
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'username' => 'required|max:255',
      ]);

      if ($validator->fails()) {
          return redirect('/')
              ->withInput()
              ->withErrors($validator);
      }

      // Creates an (unfilled) instance
      $customer = new Customer;

      // 1) If there IS NOT a $fillable array in the model, then each column is filled individually
      // $customer->username = $request->username;
      // $customer->first_name = $request->first_name;
      // $customer->last_name = $request->last_name;

      // 2) If there IS a $fillable array in the model, then simply use the 'fill' and all() function
      $customer->fill($request->all());

      // Saves the newly filled instance into the dB
      $customer->save();

      return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Customer::findOrFail($id)->delete();
      return redirect('/');
    }
}
