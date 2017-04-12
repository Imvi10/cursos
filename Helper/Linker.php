<?php

namespace Helper;

class Linker {

    public static function getLinks() {
        ?>
        <link rel="stylesheet" href="./css/bootstrap.css"/>
        <script src="js/jquery-3.2.0.js"></script>
        <script src="js/bootstrap.js"></script>
        <?php
    }

    public static function getModel() {
        require '/wamp/www/Modulo_Alumnos/Model/DBConnection.php';
        require '/wamp/www/Modulo_Alumnos/Model/Usuario.php';
        require '/wamp/www/Modulo_Alumnos/Model/Propuesta.php';
    }

    public static function getController() {
        require '/wamp/www/Modulo_Alumnos/Controller/UsuarioController.php';
    }

}
