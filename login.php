<!DOCTYPE html>
<?php
session_start();
require './Helper/Linker.php';

use Helper\Linker;

Linker::getModel();
Linker::getController();

use Model\Usuario;
use Controller\UsuarioController;

$controller=new UsuarioController()

?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php
        Linker::getLinks();
        ?>
        <script type="text/javascript">
            function login() {
                $.ajax({
                    type: 'POST',
                    url: "Controller/controllerRouter.php",
                    data: {
                        target: 'Usuario',
                        method: 'login',
                        obj: {
                            correo: $("#txtCorreo").val()
                            ,pass: $("#txtPassword").val()
                        }

                    },
                    context: document.body
                }).done(function(response) {
                    if (response != null) {
//                        console.log(response);
                        response = JSON.parse(response);
                        if (response.data == true) {
                            window.location.replace("new.php");
                        } else {
//                            showStatus(response);
                            console.log(response.message); //ESTA MADRE VA EN UN ALERT BIEN CHIDO
                        }
                    } else {
                        console.log(response);
                    }

                });
            }

            function cleanInputs() {
                $("input").val("");
                $("textarea").html("");
            }
        </script>
        <title>Login</title>
    </head>
    <body>
        <div id="formAlumno" class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <legend>Login</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtCorreo">Correo Electronico</label>  
                    <div class="col-md-5">
                        <input id="txtCorreo" name="txtCorreo" type="text" placeholder="example@gmail.com" class="form-control input-md" required="">
                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtPassword">Contraseña</label>
                    <div class="col-md-5">
                        <input id="txtPassword" name="txtPassword" type="password" placeholder="************" class="form-control input-md" required="">
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="btnLogin"></label>
                    <div class="col-md-5">
                        <button id="btnLogin" name="btnLogin" class="btn btn-success col-md-12" onclick="login()">Login</button>
                    </div>
                </div>

            </fieldset>
        </div>

</html>
