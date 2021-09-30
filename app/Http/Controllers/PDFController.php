<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crabbly\Fpdf\Fpdf;
use Illuminate\Support\Facades\DB;
use App\Genre;

class PDFController extends Controller
{
    public function informe(){

        // Consulta para imprimir el informe con datos de la base de datos
        $genre = DB::table('genre')
                    ->join('track', 'genre.GenreId', '=', 'track.GenreId')
                    ->select('genre.Name as Genre_name', DB::raw('COUNT(track.TrackId) as tracksXgenre'))
                    ->groupBy('Genre_name')
                    ->get();

        // Prueba
        $arrayGeneros = [
            'Blues' => "'3'000.000'",
            'Rock & Roll' => "1'000.000",
            'Industrial Metal' => "250.000",
            'Death Metal' => "350.000",
            'Trash Metal' => "325.000",
            'Black Metal' => "400.000",
            'Melodic Death Metal' => "4.000",
            'Symphonic Black Metal' => "125.000"
        ];

        // Crear un objeto que representa un documento PDF
        $pdf = app('Fpdf');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',22);
        $pdf->Cell(191,10, 'Number of tracks per category', '', 0, 'C');

        // Establecer coordenadas de contenido del encabezado de la tabla
        $pdf->setXY(35, 30);

        // Nueva sección del documento
        // Celda de generos
        $pdf->setFont('Arial', 'B', 14);
        $pdf->cell(70, 10, 'Genre', 'TBR', 0, 'C');
        // Celda de canciones
        $pdf->cell(70, 10, 'Tracks', 'TB', 1, 'C');
        // Celdas de contenido de los generos y el número de canciones
        $pdf->setFont('Arial', '', 12);
        foreach($genre as $genero) {
            $pdf->setX(35);
            $pdf->cell(70, 10, $genero->Genre_name, 'TB', 0, 'C');
            $pdf->cell(70, 10, $genero->tracksXgenre, 'TB', 1, 'C');
        }

        // Retornar el documento
        return response($pdf->OutPut(), 200)
                ->header('Content-Type', 'application/pdf');
    }
}
