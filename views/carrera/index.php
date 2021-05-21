<?php
    include '../../includes/head.php';
    include '../../classes/visorCarreras.php';
    include '../../classes/visorCategorias.php';
    $visor = new VisorCarreras();
    $carrera = $visor->verCarrera($_GET['carrera']);
?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
        <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../../index.php">Lista Carreras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../agregar_carrera/">Agregar Carrera</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article>
                    <header class="mb-4">
                        <h1 class="fw-bolder mb-1"><?=$carrera->getTitulo()?></h1>
                        <div class="text-muted fst-italic mb-2"><?=$carrera->getFecha()?></div>
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?=$carrera->getNombreCategoria()?></a>
                    </header>
                    <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                    <section class="mb-5">
                        <p class="fs-5 mb-4"><?=$carrera->getDescripcion()?></p>
                        <ul>
                            <li><p class="fs-5 mb-4">Cupos disponibles: <?=($carrera->getCupo()-$carrera->getAnotados())?></p></li>
                            <li><p class="fs-5 mb-4">Ubicacion: <?=$carrera->getUbicacion()?></p></li>
                        </ul>       
                    </section>
                </article>
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
                            echo '<a href="../index.php?categoria='.$categoria->getId().'" class="text-success">'.$categoria->getNombre().'</a>';
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
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
    </footer>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>