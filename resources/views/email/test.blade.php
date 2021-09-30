<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }

        .contenedor {
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cuerpoEmail, .titulo, .texto {
            justify-content: center;
            align-items: center;
        }

        img {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <div class="container">
            <div class="row">
                <div class="titulo">
                    <img src="{{ asset('assets/eddie.png') }}" width="200" height="200">
                </div>
                <div class="cuerpoEmail">
                    <div class="titulo">
                        <h1>Test mail ROCKSTAR</h1>
                    </div>
                    <div class="texto">
                        <h3>Send by {{ $details["Sendby"] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
