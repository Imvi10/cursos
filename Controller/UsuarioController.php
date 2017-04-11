<?php
namespace Controller;

if(isset($_POST) && !empty($_POST)){
    session_start();
}

use Model\Usuario;

class UsuarioController {

    private $response = array(
        'return' => TRUE,       //Indica si el metodo debe devolver un valor
        'status'=> FALSE,        //Indica si el metodo se realizo correctamente o hubo un error
        'message'=>'Empty',     //Mensaje de respuesta en caso de existir
        'data'=>array()         //Datos que devuelve el metodo, si aplica
    );

    public function deploy($method) {
        switch ($method) {
            case "login":
                $this->login();
                return $this->response;
            case "add":
                $this->add();
                return $this->response;
                break;
            case "getAll":
                return $this->getAll();
                break;
            case "getAllTable":
                $this->getAllTable();
                return $this->response;
                break;
            default :
                $this->showInvalidMethodMessage();
                break;
        }
    }
    
    public function login(){
        if (isset($_POST)){
            $userArray=$_POST['obj'];
            
            $user=new Usuario($userArray);
            $user->setPass($user->getPass());
            $userArray=$user->validate();
            
            if($userArray!=null){
                $_SESSION['user']=$user;
                $this->response['status']=TRUE;
                $this->response['data']=TRUE;
            } else{
                $this->response['status']=FALSE;
                $this->response['data']=FALSE;
                $this->response['message']='Datos incorrectos';
            }
        }
    }

    public function add() {
        if (isset($_POST)) {
            $userArray = $_POST['obj'];

            $user = new Usuario($userArray);
            $user->setPass($user->getPass());
            if($user->add()){
                $this->response['status']=TRUE;
                $this->response['message']='Usuario insertado correctamente';
            } else{
                $this->response['status']=FALSE;
                $this->response['message']='Usuario no insertado';
            }
            
            
        }
    }

    public function getAll() {
//        $usuarios = Usuario::getAll();
//        
//        $this->response['data']=$usuarios;
        
    }

    public function getAllTable() {
        $usuarios = Usuario::getAllTable();

        $this->response['status']=TRUE;
        $this->response['data']=$usuarios;
        return $this->response;
    }

    private function showInvalidMethodMessage() {
        
    }

    private function cleanString($string) {


        return $string;
    }

}
