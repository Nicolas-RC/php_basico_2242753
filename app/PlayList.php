<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PlayList extends Model
{
    // Establecer los campos de la tabla
    protected $table = "Playlist";
    protected $primaryKey = "PlaylistId";
    public $timestamps = false;

    // Relación M:N (M Tracks - N Playlist)
    public function PlayTrack(){
        // El BelongsToMany() sirve para hacer una relación M:N
        // El BelongsToMany() tiene 4 parámetros:
        // 1- El modelo a relacionar
        // 2- Hace referencia a la tabla intermedio
        //
        //
        return $this -> BelongsToMany("App\Track", "PlaylistTrack", "PlaylistId", "TrackId");
    }
}
