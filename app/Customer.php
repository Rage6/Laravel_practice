<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $custTable = 'customers';

    protected $custColumns = ['id','username','created_at','updated_at'];
    // protected $custColumns = ['customer_id','username','created_at','updated_at'];
}
