<?php
namespace Controller;

if(isset($_POST) && !empty($_POST)){
    session_start();
}

use Model\Propuesta;

class PropuestaController {

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
            case "validar":
               $this->validar();
               return $this->response;
            break;
        }
    }
    

    public function add() {
        if (isset($_POST)) {
            $propuestaArray = $_POST['obj'];
            $propuesta = new Propuesta($propuestaArray);
            if($propuesta->add()){
                $this->response['message']='Propuesta insertada correctamente';
            } else{
                $this->response['message']='Propuesta no insertada';
            }   
        }
    }

    public function getAll() {
        $propuestas = Propuesta::getAll();
        $this->response['data'] = $propuestas;     
    }


    public function validar(){
        if(isset($_POST){
            $id = $_POST['id'];
            $action  = $_POST['action'];
            $propuesta = new Propuesta();
            if($propuesta->validar($id, $action)){
                $this->response['message'] = 'La propuesta ha sido procesada';
            }else{
                $this->response['message'] = 'La propuesta no pudo ser procesada';
            }
        }
    }
}

?>
