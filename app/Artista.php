<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    // Establecer los campos de la tabla
    protected $table = "artist";
    protected $primaryKey = "ArtistId";
    public $timestamps = false;

    // Establecer la relación 1:M (1 Artista - M Albumes)
    public function albumes() {
        // Método hasMany(), tiene 2 parámetros:
        // 1. Modelo a relacionar
        // 2. Llave foránea, FK de Artista (1) en los albumes (M)
        return $this -> hasMany("App\Album", "ArtistId");
    }

    // Establecer la relación 1:M (1 Artista - M Canciones)
    public function tracks() {
        // El método hasManyThrough() sirve para pasar a una tabla directa sin pasar sobre otras que esten relacionadas
        // con la tabla final
        // Método hasManyThrough(), tiene 6 parámetros:
        // 1. Modelo de destino (Modelo 3)
        // 2. Modelo intermedio (Modelo 2)
        // 3. Clave FK del modelo 1, en el modelo 2
        // 4. Clave FK del modelo 2, en el modelo 3
        // 5. Clave PK del modelo 1
        // 6. Clave PK del modelo 2
        return $this -> hasManyThrough("App\Track", "App\Album", "Artistid", "AlbumId", "ArtistId", "AlbumId");
    }
}
