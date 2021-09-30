<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaType extends Model
{
    // Establecer los campos de la tabla
    protected $table = "MediaType";
    protected $primaryKey = "MediaTypeId";
    public $timestamps = false;

    // Permitir la carga masiva desde archivos Excel
    protected $guarded = [];

    public function formato()
    {
        // Método hasMany(), tiene 2 parámetros:
        // 1. Modelo a relacionar
        // 2. Llave foránea, FK de Artista (1) en los albumes (M)
        return $this->hasMany("App\Track", "MediaTypeId");
    }
}
