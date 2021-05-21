<?php
include 'categoria.php';
class VisorCategorias{
    public $lista_categorias = [];

    public function __construct(){}

    public function verCategorias(){
        try{
            $connect = new PDO('mysql:host=; dbname=','','');
            $query = 'select id,nombre from categorias;';
            $result = $connect->prepare($query);
            $result->execute();
            while($registro = $result->fetch(PDO::FETCH_ASSOC)){
                $categoriaAux = new Categoria(
                                $registro['id'],
                                $registro['nombre']
                );
                $this->lista_categorias[] = $categoriaAux;      
            }
        }catch(Exception $e){
            die('Error'.$e->getMessage());
        }finally{
            $connect = null;
        }
    }
}