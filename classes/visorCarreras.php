<?php
include 'carrera.php';

class VisorCarreras{
    public $lista_carreras =[];

    public function __construct(){}

    public function verCarrera($id){
        try{
            $connect = new PDO('mysql:host=localhost; dbname=carreras_bdd','root','');
            $query = 'select * from carreras where id='.$id.';';
            $result = $connect->prepare($query);
            $result->execute();
            $registro = $result->fetch(PDO::FETCH_ASSOC);
            $carreraAux = new Carrera(
                            $registro['id'],
                            $registro['titulo'],
                            $registro['categoria'],
                            $registro['descripcion'],
                            $registro['ubicacion'],
                            $registro['fecha'],
                            $registro['anotados'],
                            $registro['cupo']
            );
            return $carreraAux;
        }catch(Exception $e){
            die('Error'.$e->getMessage());
        }finally{
            $connect = null;
        }
    }

    public function verCarreras(){
        try{
            $connect = new PDO('mysql:host=localhost; dbname=carreras_bdd','root','');
            $query = 'select * from carreras;';
            $result = $connect->prepare($query);
            $result->execute();
            while($registro = $result->fetch(PDO::FETCH_ASSOC)){
                $carreraAux = new Carrera(
                                $registro['id'],
                                $registro['titulo'],
                                $registro['categoria'],
                                $registro['descripcion'],
                                $registro['ubicacion'],
                                $registro['fecha'],
                                $registro['anotados'],
                                $registro['cupo']
                );
                $this->lista_carreras[] = $carreraAux;
            }
        }catch(Exception $e){
            die('Error'.$e->getMessage());
        }finally{
            $connect = null;
        }
    }

    public function verCarrerasxCategoria($categoria){
        try{
            $connect = new PDO('mysql:host=; dbname=','','');
            $query = 'select * from carreras where categoria="'.$categoria.'";';
            $result = $connect->prepare($query);
            $result->execute();
            while($registro = $result->fetch(PDO::FETCH_ASSOC)){
                $carreraAux = new Carrera(
                                $registro['id'],
                                $registro['titulo'],
                                $registro['categoria'],
                                $registro['descripcion'],
                                $registro['ubicacion'],
                                $registro['fecha'],
                                $registro['anotados'],
                                $registro['cupo']
                );
                $this->lista_carreras[] = $carreraAux;
            }
        }catch(Exception $e){
            die('Error'.$e->getMessage());
        }finally{
            $connect = null;
        }
    }
}