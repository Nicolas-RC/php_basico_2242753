<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    // Establecer los campos de la tabla
    protected $table = "Genre";
    protected $primaryKey = "GenreId";
    public $timestamps = false;

    public function trackGenre() {
        // Método hasMany(), tiene 2 parámetros:
        // 1. Modelo a relacionar
        // 2. Llave foránea, FK de Genero (1) en los canciones (M)
        return $this -> hasMany("App\Track", "GenreId");
    }
}
