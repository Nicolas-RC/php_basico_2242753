<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    // Establecer los campos de la tabla
    protected $table = "employee";
    protected $primaryKey = "EmployeeId";
    public $timestamps = false;
}
