<?php
namespace Controller;

if(isset($_POST) && !empty($_POST)){
    session_start();
}

use Model\Categoria;

class CategoriaController {

    private $response = array(
        'return' => TRUE,       //Indica si el metodo debe devolver un valor
        'message'=>'Empty',     //Mensaje de respuesta en caso de existir
        'data'=>array()         //Datos que devuelve el metodo, si aplica
    );

    public function deploy($method) {
        switch ($method) {
            case "add":
                $this->add();
                return $this->response;
            case "getAll":
                $this->getAll();
                return $this->response;
                break;
        }
    }
    

    public function add() {
        if (isset($_POST)) {
            $categoriaArray = $_POST['obj'];
            $categoria = new Categoria($categoriaArray);
            if($categoria->add()){
                $this->response['message']='Categoria insertada correctamente';
            } else{
                $this->response['message']='Categoria no  insertada';
            }   
        }
    }

    public function getAll() {
        $categorias = Categoria::getAll();
        $this->response['data'] = $categorias;     
    }
}

?>