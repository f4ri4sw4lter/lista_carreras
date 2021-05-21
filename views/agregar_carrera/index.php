<?php
    include '../../includes/head.php';
    include '../../classes/visorCategorias.php';
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
            <li class="nav-item active">
                <a class="nav-link" href="">Agregar Carrera</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4 class="mb-3">Datos de la Carrera</h4>
                <form class="needs-validation" method="post" action="../../scripts/agregar_carrera.php">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="titulo" class="form-label">Titulo</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo o nombre de la carrera" required autofocus>
                            <div class="invalid-feedback">
                                Ingrese un nombre valido.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <textarea type="textarea" class="form-control" id="descripcion" name="descripcion" placeholder="Informacion sobre la carrera que desee agregar" rows="3" required></textarea>
                        </div>

                        <div class="col-sm-6">
                            <label for="categoria" class="form-label">Categoria</label>
                            <select class="form-select form-select-lg mb-3" id="categoria" name="categoria" aria-label=".form-select-lg example">
                                <?php
                                $visor = new VisorCategorias();
                                $visor->verCategorias();
                                foreach($visor->lista_categorias as $categoria){
                                    echo '<option value="'.$categoria->getId().'">'.$categoria->getNombre().'</option>';
                                }
                                ?> 
                            </select>                 
                        </div>

                        <div class="col-sm-6">
                            <label for="cupo" class="form-label">Cupo</label>
                            <input type="number" class="form-control" id="cupo" name="cupo" placeholder="Cantidad de participantes">
                        </div>

                        <div class="col-12">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="text" class="form-control" id="fecha" name="fecha" placeholder="dd/mm/aaaa a las hh:mm hs" required>
                        </div>

                        <div class="col-12">
                            <label for="ubicacion" class="form-label">Ubicacion</label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Direccion o referencia">
                        </div>
                    </div>
                    <br class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Agregar Carrera</button>
                </form>
                <br>
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

    <?php include '../../includes/footer.php'; ?>

    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>