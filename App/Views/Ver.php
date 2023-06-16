<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link [href]="assets/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  <h1>Ver</h1>
    <p>Nombre: ${{anime.id}}</p>
    <!--<p>Nombre: ${{nombre}}</p>
    <p>Descripcion: ${{descripcion}}</p>
    <p>Genero: ${{genero}}</p>
    <p>Estado: ${{estado}}</p>
    <p>Fecha de estreno: ${{fecha_estreno}}</p>
    <p>Fecha de finalizacion: ${{fecha_finalizacion}}</p>
    <p>Imagen: ${{imagen}}</p>
    <p>Video: ${{video}}</p>
    <p>Idioma: ${{idioma}}</p>
    <p>Subtitulos: ${{subtitulos}}</p>
    <p>Calidad: ${{calidad}}</p>
    <p>Resolucion: ${{resolucion}}</p>
    <p>Formato: ${{formato}}</p>
    <p>Capitulos: ${{capitulos}}</p>
    <p>Temporadas: ${{temporadas}}</p>
    <p>Fecha de creacion: ${{fecha_creacion}}</p>
    <p>Fecha de actualizacion: ${{fecha_actualizacion}}</p>
    <p>Fecha de eliminacion: ${{fecha_eliminacion}}</p>
    <p>Estado: ${{estado}}</p>
    <p>Id de usuario: ${{id_usuario}}</p>
    <p>Id de categoria: ${{id_categoria}}</p>
    <p>Id de tipo: ${{id_tipo}}</p>-->

    <div *repFor="elemento, index of lista">
        <div *repFor="value, index of elemento">
            <p>Tipo: ${{anime.nombre}}</p>
            <p>Capitulo: ${{anime.capitulo}}</p>
        </div>
    </div>

    <!--< ?php for($i = 0; $i < 10; $i++): ?>
        <p>Tipo: ${{anime.nombre}}</p>
        <p>Capitulo: ${{anime.capitulo}}</p>
    < ?php endfor; ?>-->

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <img [src]="assets/img/1.png" alt="">

    <script [src]="assets/js/jquery-3.6.0.min.js"></script>
    <script [src]="assets/js/bootstrap.min.js"></script>
    <script>
      
      /*$(document).ready(function(){
            $("#exampleModal").modal("show");
          });*/

    </script>
  </body>
</html>