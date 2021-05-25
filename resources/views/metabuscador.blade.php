<!DOCTYPE html>
<html lang="en-419">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.css" integrity="sha512-mG7Xo6XLlQ13JGPQLgLxI7bz8QlErrsE9rYQDRgF+6AlQHm9Tn5bh/vaIKxBmM9mULPC6yizAhEmKyGgNHCIvg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MetaBuscador</title>
    </head>
    <body>
        <header>
            <h1>MetaBuscador</h1>
        </header>
        <form class="form-horizontal" action="{{url('buscarTermino')}}" method="POST">
            @csrf

            <fieldset>

            <!-- Form Name -->
            <legend>Realizar búsquedas en varios motores</legend>


            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="busqueda">Buscar</label>
              <div class="col-md-4">
              <input id="busqueda" name="termino" type="text" placeholder="Ingresa el término de búsqueda" class="form-control input-md" required>
              </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="motores">Seleccione el motor de búsqueda</label>
              <div class="col-md-4">
                <select id="motores" name="motores" class="form-control">
                  <option value="1">Google Chorme</option>
                  <option value="2">Bing</option>
                  <option value="3">Yahoo!</option>
                  <option value="4">Yandex</option>
                  <option value="5">Ask</option>
                  <option value="6">DuckDuckGo</option>
                  <option value="7">WolframAlpha</option>
                  <option value="8">Ecosia</option>
                  <option value="9">Qwant</option>
                  <option value="10">Gibiru</option>
                </select>
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for=""></label>
              <div class="col-md-4">
                <button class="btn btn-primary">Buscar</button>
              </div>
            </div>

            </fieldset>
            </form>
    </body>
</html>
