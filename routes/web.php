<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Http\Controllers\Auth\ResetPasswordController;

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
            "poblacion" => 50,34
        ],
        "Perú" => [
            "capital" => "Lima",
            "moneda" => "Sol",
            "poblacion" => 33.19
        ],
        "Paraguay" => [
            "capital" => "Asunción",
            "moneda" => "Guarani",
            "poblacion" => 7.04
        ],

        "Argentina" => [
            "capital" => "Buenos Aires",
            "moneda" => "Peso argentino",
            "poblacion" => 47.19
        ]
    ];

    // Mostrar la vista de paises
    // Llevar el arreglo a la vista paises.blade.php
    return view('paises')->with("pais", $paises);
});

//Mostrar vista metabuscador
Route::get('mostrarForm', 'MetabuscadorController@mostrarForm');

Route::post('buscarTermino', 'MetabuscadorController@buscarTermino');

//Definir rutas REST para el controlador CustomerController
Route::resource('customer', 'CustomerController')->middleware('authRockstar');

//Definir rutas REST para el controlador EmpleadoControler
Route::resource('employee', 'EmpleadoControler')->middleware('authRockstar');

//Definir ruta para la plantilla
Route::get('template', function(){
    return view('templates.template');
});

//Ruta para habilitar o deshabilitar un cliente
Route::get('customer/{idCustomer}/enable', 'CustomerController@enable')->middleware('authRockstar');

//Ruta para habilitar o deshabilitar un empleado
Route::get('employee/{idEmployee}/enable', 'EmpleadoControler@enable')->middleware('authRockstar');

//Ruta para habilitar o deshabilitar un usuario
Route::get('users/{idUser}/enable', 'UserController@enable')->middleware('authRockstar');

//Definir rutas REST para el controlador UserController
Route::resource('users', 'UserController')->middleware('authRockstar');

// Definir rutas de autenticación
Route::get('login', 'Auth\LoginController@form');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

// Ruta para el envío de correo electrónico
Route::get('testemail', function(){

    $details = ["Sendby" => "Nicolas Rosero 😎"];

    Mail::to('nrosero93@misena.edu.co')->send(new TestMail($details));
    die('Email sent');
});

// Rutas para el cambio de contraseña
Route::get("changepassword", "Auth\ResetPasswordController@emailForm");
Route::post("sendlink", "Auth\ResetPasswordController@submitLink");
Route::get("resetpassword/{token}", "Auth\ResetPasswordController@viewChange");
Route::post("resetpassword", "Auth\ResetPasswordController@changePassword");

// Rutas para cambio de contraseña cuando se crea un usuario
Route::get('chagePassword/{idUser}', 'ChangePasswordUserController@vistaCambiarPass');
Route::post('chagePassword/{idUser}', 'ChangePasswordUserController@cambiarContrasena');

// Rutas REST para importar archivos Excel
Route::resource('mediatype', 'MediaTypeController')->only(['create', 'store'])->middleware('authRockstar');

// Ruta para crear un informe
Route::get('reportpdf', 'PDFController@informe')->middleware('authRockstar');
