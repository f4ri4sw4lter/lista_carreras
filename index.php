<?php 
  include 'classes/visorCarreras.php';
  include 'classes/visorCategorias.php';
  if(isset($_GET['pagina'])){
    $pagina = $_GET['pagina']*3;
  }else{
    $pagina = 0;
  }
  
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Aplicacion para administrar carreras">
  <meta name="author" content="Walter Farias">
  <title>Carreras</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/blog-home.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Lista Carreras
              <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="views/agregar_carrera/">Agregar Carrera</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h1 class="my-4">
          <small>Lista de Carreras</small>
        </h1>
        <?php
        $visor = new VisorCarreras();
        if(empty($_GET['categoria'])){
          $visor->verCarreras();
        }else{
          $visor->verCarrerasxCategoria($_GET['categoria']);
        }
        
        $i=(0+$pagina);
        while(isset($visor->lista_carreras[$i]) && $i<(3+$pagina)){
          echo '<div class="card mb-4">';
            echo '<div class="card-body">';
              echo '<h2 class="card-title">'.$visor->lista_carreras[$i]->getTitulo().'</h2>';
              echo '<p class="card-text">'.$visor->lista_carreras[$i]->getDescripcion().'</p>';
              echo '<p>categoria: '.$visor->lista_carreras[$i]->getNombreCategoria().'</p>';
              echo '<a href="views/carrera/index.php?carrera='.$visor->lista_carreras[$i]->getId().'" class="btn bg-success bg-gradient text-white">Leer mas &rarr;</a>';
            echo '</div>';
            echo '<div class="card-footer text-muted">';
              echo 'Fecha: '.$visor->lista_carreras[$i]->getFecha().'<br>';
              echo 'Participantes: '.$visor->lista_carreras[$i]->getAnotados().'/'.$visor->lista_carreras[$i]->getCupo();
          echo '</div></div>';
          ++$i;
        }
        ?>
        <ul class="pagination justify-content-center mb-4">
        <?php
            if(isset($_GET['pagina']) && $_GET['pagina']!=0){
              echo'<li class="page-item">
                <a class="page-link text-success" href="?pagina=';
                if($_GET['pagina']==1){
                  echo '0';
                }else{
                  echo (--$_GET['pagina']);
                }
                if(isset($_GET['categoria'])){
                  echo '&categoria='.$_GET['categoria'];
                }
              echo '">&larr; Nuevos</a></li>';
            }
            if(isset($visor->lista_carreras[$i])){
                echo '<li class="page-item">
                <a class="page-link text-success" href="?pagina=';
                if(isset($_GET['pagina'])){
                  echo (++$_GET['pagina']);
                }else{
                  echo '1';
                }
                if(isset($_GET['categoria'])){
                  echo '&categoria='.$_GET['categoria'];
                }
                echo '">Antiguos &rarr;</a>
              </li>
              ';
            }
            
        ?>
        </ul>
      </div>


      <div class="col-md-4">
        <div class="card my-4">
          <h5 class="card-header">Categorias</h5>
          <div class="card-body">
            <div class="row">
              <?php
              $visor = new VisorCategorias();
              $visor->verCategorias();
              echo '<div class="col-lg-12">';
              foreach($visor->lista_categorias as $categoria){
                echo '<div class="col-lg-12">';
                echo '<a href="index.php?categoria='.$categoria->getId().'" class="text-success">'.$categoria->getNombre().'</a>';
                echo '</div>';
              }
              echo '</div>';
              ?>
            </div>
          </div>
        </div>

        <div class="card my-4">
          <h5 class="card-header">Noticias</h5>
          <div class="card-body">
            Aqui el admin puede publicar cualquier clase de notificacion para los usuarios
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white"></p>
    </div>
  </footer>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>