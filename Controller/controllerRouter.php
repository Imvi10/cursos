<?php
require '../Helper/Linker.php';
use Helper\Linker;

Linker::getModel();
Linker::getController();
use Controller\UsuarioController;


if (isset($_POST['target'])){
    $controller=null;
    
    switch ($_POST['target']){
        case "Propuesta":
            break;
        //...
        case "Usuario":
            $controller=new UsuarioController();
            break;
        //...
    }
    
    if($controller!=null){
        if (isset($_POST['method'])){
            //To check return values...
            $response=$controller->deploy($_POST['method']);
            if ($response['return']==TRUE){
                echo json_encode($response);
            }
        }
    }
    
}

function showErrorMessage(){
    //!!
}