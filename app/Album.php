<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    // Establecer los campos de la tabla
    protected $table = "Album";
    protected $primaryKey = "AlbumId";
    public $timestamps = false;
}
