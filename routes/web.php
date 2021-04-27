<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('variables', function() {
    $mensaje = 20;
    // var_dump es una función nativa de php, sirve para análizar el contenido de una variable
    //variable: tipo de dato, dato que almacena
    var_dump($mensaje);
    echo "<hr/>";
    $mensaje = "Hola ficha 2242753";
    var_dump($mensaje);
    echo "<hr/>";
    $mensaje = 7.312;
    var_dump($mensaje);
    echo "<hr/>";
    $mensaje = false;
    var_dump($mensaje);
});

Route::get("arreglos", function() {
    //Definición de un arreglo en php
    $estudiantes = ["Ana", "María", "Jorge"];
    echo "<pre>";
    var_dump($estudiantes);
});

Route::get("paises", function(){
    $paises = [
        "Colombia" => [
            "capital" => "Bogotá",
            "moneda" => "Peso",
            "población" => 50,34
        ],
        "Perú" => [
            "capital" => "Lima",
            "moneda" => "Sol",
            "población" => 33.19
        ],
        "Paraguay" => [
            "capital" => "Asunción",
            "moneda" => "Guarani",
            "población" => 7.04
        ]
    ];
    echo "<pre>";
    print_r($paises);
    echo "<pre>";
    echo "<hr/>";

    //Recorre el arreglo de paises
    foreach($paises as $nombre => $pais){
        echo "<h2> $nombre </h2>";
        echo "<pre>";
        print_R($pais["capital"]);
        echo "<pre>";
        echo "<hr/>";
    }
});
