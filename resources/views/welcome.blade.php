<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="base_url" content="{{ URL::to('/') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>Api</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
        

        <script src="{{ asset('js/form.js') }}" defer></script>
    </head>
    <body>
        <br><br>
        <div class="container">     
            <div class="row">
                <div class="col-sm-3">
                    <div class="btn-group-vertical">
                        <button type="button" class="btn btn-primary" id="btn_get">GET: Obtener</button>
                        <button type="button" class="btn btn-success" id="btn_insert">POST: INSERTAR</button>
                        <button type="button" class="btn btn-warning" id="btn_update">PUT ACTUALIZAR</button>
                        <button type="button" class="btn btn-danger" id="btn_delete">DELETE: BORRAR</button>
                    </div>
                </div>
                <div class="col-sm-9">
                    <h2 class="mb-2">API DE LIBROS</h2>

                    <table class="table table-hover hide">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Codigo</th>
                        </tr>
                        </thead>
                        <tbody id="getInfo"></tbody>
                    </table>
                    
                    <form action="" method="post" id="insert" class="hide">
                        @csrf
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea name="descripcion" rows="3" class="form-control" placeholder="Descripción"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Código</label>
                            <input type="text" name="codigo" class="form-control" placeholder="código">
                        </div>
                        <button type="submit" class="btn btn-success">INSERTAR</button>
                    </form>

                    <form action="" method="put" id="update" class="hide">
                        @csrf
                        <label>Libro</label>
                        <select name="id" id="id_book" class="form-control"></select><br>
                        <hr>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea name="descripcion" rows="3" class="form-control" placeholder="Descripción"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Código</label>
                            <input type="text" name="codigo" class="form-control" placeholder="código">
                        </div>
                        <button type="submit" class="btn btn-warning">ACTUALIZAR</button>
                    </form>

                    <div class="form-group delete-group hide">
                        <select name="id_delete" id="id_delete" class="form-control">
                            <option value="0" disabled selected>Seleccion Libro</option>
                        </select><br>
                        <button type="button" class="btn btn-danger" id="delete">DELETE: BORRAR</button>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </body>
</html>
<style>
    .btn{
        margin: 2px;
    }
    .btn-group-vertical{
        width: 100%
    }
    .hide{
        display: none;
    }
</style>