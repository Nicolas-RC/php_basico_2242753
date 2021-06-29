<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    // Establecer los campos de la tabla
    protected $table = "Track";
    protected $primaryKey = "TrackId";
    public $timestamps = false;
}
