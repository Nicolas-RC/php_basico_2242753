<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    // Establecer los campos de la tabla
    protected $table = "employee";
    protected $primaryKey = "EmployeeId";
    public $timestamps = false;

    // Relación 1:M (1 Empleado - M Clientes)
    public function compraE() {
        // El método hasManyThrough() sirve para pasar a una tabla directa sin pasar sobre otras que esten relacionadas
        // con la tabla final
        // Método hasManyThrough(), tiene 6 parámetros:
        // 1. Modelo de destino (Modelo 3)
        // 2. Modelo intermedio (Modelo 2)
        // 3. Clave FK del modelo 1, en el modelo 2
        // 4. Clave FK del modelo 2, en el modelo 3
        // 5. Clave PK del modelo 1
        // 6. Clave PK del modelo 2
        return $this-> hasManyThrough(
                                        "App\Buy",
                                        "App\Customer",
                                        "SupportRepId",
                                        "CustomerId",
                                        "EmployeeId",
                                        "CustomerId"
                                    );
    }

    public function clientes() {
        // Método hasMany(), tiene 2 parámetros:
        // 1. Modelo a relacionar
        // 2. Llave foránea, FK de Empleados (1) en empleados (M)
        return $this -> HasMany("App\Customer", "SupportRepId");
    }
}
