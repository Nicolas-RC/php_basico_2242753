<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    // Establecer los campos de la tabla
    protected $table = "Customer";
    protected $primaryKey = "CustomerId";
    public $timestamps = false;

    public function compra() {
        // Método hasMany(), tiene 2 parámetros:
        // 1. Modelo a relacionar
        // 2. Llave foránea, FK de Artista (1) en los albumes (M)
        return $this -> HasMany("App\Buy", "CustomerId");
    }
}
