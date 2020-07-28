<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // The $table property isn't necessary because, by default, it assumes that the table's name is a lower-case, plural version of the class's name
    // A custom name can be used, but ONLY by using a 'protected' variable named '$table'.
    protected $table = 'customers';

    // The variable "$fillabe" has a special meaning. It's value is always an array of some/all of the model's desired columns
    // Controllers quickly use $fillable with functions like 'fill()' and 'all()', instead of working with each column seperately 
    protected $fillable = [
      'id',
      'username',
      'created_at',
      'updated_at',
      'first_name',
      'last_name'
    ];
}
