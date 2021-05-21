<?php
    class carrera{
        private $id;
        private $titulo;
        private $categoria;
        private $descripcion;
        private $ubicacion;
        private $fecha;
        private $cupo; //limite de participantes
        private $anotados;
        private $url;

        function __construct($id, $titulo, $categoria, $descripcion, $ubicacion, $fecha, $anotados, $cupo){
            $this->id = $id;
            $this->titulo = $titulo;
            $this->categoria = $categoria;
            $this->descripcion = $descripcion;
            $this->ubicacion = $ubicacion;
            $this->fecha = $fecha;
            $this->anotados = $anotados;
            $this->cupo = $cupo;
            //TODO: Crear URL-.
        }

        public function getNombreCategoria(){
            try{
                $connect = new PDO('mysql:host=; dbname=','','');
                $query = 'select nombre from categorias where id='.$this->categoria.';';
                $result = $connect->prepare($query);
                $result->execute();
                $registro = $result->fetch(PDO::FETCH_ASSOC);
                return $registro['nombre'];  
            }catch(Exception $e){
                die('Error'.$e->getMessage());
            }finally{
                $connect = null;
            }
        }

        public function agregarCarrera(){


        }

        public function getTitulo(){
            return $this->titulo;
        }public function getCategoria(){
            return $this->categoria;
        }public function getDescripcion(){
            return $this->descripcion;
        }public function getUbicacion(){
            return $this->ubicacion;
        }public function getFecha(){
            return $this->fecha;
        }public function getCupo(){
            return $this->cupo;
        }public function getAnotados(){
            return $this->anotados;
        }public function getUrl(){
            return $this->url;
        }public function getId(){
            return $this->id;
        }

        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }public function setAnotados($anotados){
            $this->anotados = $anotados;
        }
    }
