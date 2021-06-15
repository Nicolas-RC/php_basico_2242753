<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Establecer los campos de la tabla
    protected $table = "Customer";
    protected $primaryKey = "CustomerId";
    public $timestamps = false;
}
