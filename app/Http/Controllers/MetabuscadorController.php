<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetabuscadorController extends Controller
{
    public function mostrarForm(){
        //Mostrar la vista del metabuscador
        return view('metabuscador');
    }

    //Realizar búsqueda por motor
    public function buscarTermino(){
        //Buscar termino ingresado
        $termino = $_POST['termino'];
        $motor = $_POST['motores'];

        //Realizar busqueda según el motor elegido
        switch($motor){
            case 1:
                return redirect()->to("https://www.google.com/search?q=$termino");
                break;
            case 2:
                return redirect()->to("https://www.bing.com/search?q=$termino");
                break;
            case 3:
                return redirect()->to("https://espanol.search.yahoo.com/search?p=$termino");
                break;
            case 4:
                return redirect()->to("https://yandex.com/search/?text=$termino");
                break;
            case 5:
                return redirect()->to("https://www.ask.com/web?q=$termino");
                break;
            case 6:
                return redirect()->to("https://duckduckgo.com/?q=$termino");
                break;
            case 7:
                return redirect()->to("https://www.wolframalpha.com/input/?i=$termino");
                break;
            case 8:
                return redirect()->to("https://www.ecosia.org/search?q=$termino");
                break;
            case 9:
                return redirect()->to("https://www.qwant.com/?l=es&q=$termino");
                break;
            case 10:
                return redirect()->to("https://gibiru.com/results.html?q=$termino");
                break;
        }
    }
}
