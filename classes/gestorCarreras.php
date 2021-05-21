<?php
include 'carrera.php';
class GestorCarreras{

    public function agregarCarrera(){
        $nuevaCarrera = new Carrera(0,
                                    $_POST['titulo'],
                                    $_POST['categoria'],
                                    $_POST['descripcion'],
                                    $_POST['ubicacion'],
                                    $_POST['fecha'],
                                    0,
                                    $_POST['cupo']
        );

        try{
            $connect = new PDO('mysql:host=; dbname=','','');
            $query = 'insert into carreras (titulo,categoria,descripcion,ubicacion,fecha,anotados,cupo)
                      values("'.$nuevaCarrera->getTitulo().'",
                              '.$nuevaCarrera->getCategoria().',
                             "'.$nuevaCarrera->getDescripcion().'",
                             "'.$nuevaCarrera->getUbicacion().'",
                             "'.$nuevaCarrera->getFecha().'",
                              '.$nuevaCarrera->getAnotados().',
                              '.$nuevaCarrera->getCupo().');';
            $result = $connect->prepare($query);
            $result->execute();
        }catch(Exception $e){
            die('Error'.$e->getMessage());
        }finally{
            $connect = null;
        }
    }

}