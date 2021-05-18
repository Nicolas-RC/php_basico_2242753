<!DOCTYPE html>
<html lang="es-419">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" />
        <meta charset="UTF-8">
        <title>Paises</title>
    </head>
    <body>
        <header>
            <h1>Lista de paises</h1>
        </header>
        <section class="container">
            <table class="table table-hover">
                <thead>
                    <tr class="bg-success">
                        <th>Nombre</th>
                        <th>Capital</th>
                        <th>Moneda</th>
                        <th>Población</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pais as $nombre => $dato)
                        <tr>
                            <td  class="text-success border border-secondary">{{ $nombre }}</td>
                            <td>{{ $dato["capital"] }}</td>
                            <td>{{ $dato["moneda"] }}</td>
                            <td>{{ $dato["poblacion"] }}M</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </body>
</html>
