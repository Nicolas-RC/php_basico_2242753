<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    // Establecer los campos de la tabla
    protected $table = "Invoice";
    protected $primaryKey = "InvoiceId";
    public $timestamps = false;
}
