<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $custTable = 'customers';

    protected $custColumns = ['username'];
}
