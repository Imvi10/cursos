<!DOCTYPE html>
<?php
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
        <link rel="stylesheet" href="./css/bootstrap.css"/>
        <script src="js/jquery-3.2.0.js"></script>
        <script src="js/bootstrap.js"></script>
        <script type="text/javascript">
            function add() {
                $.ajax({
                    type: 'POST',
                    url: "Controller/controllerRouter.php",
                    data: {
                        target: 'Usuario',
                        method: 'add',
                        obj: {idTipo: $("#slctIdTipoUsuario").val(),
                            correo: $("#txtCorreo").val(),
                            nombre: $("#txtNombre").val(),
                            pass: $("#txtPassword").val(),
                            creditos: $("#txtCreditos").val(),
                            noCuenta: $("#txtCuenta").val()
                        }

                    },
                    context: document.body
                }).done(function(response) {
                    if (response != null) {
                        response = JSON.parse(response);
                        if (response.return == true) {
                            cleanInputs()
                        } else {
//                            showStatus(response);
                            console.log(response.message) //ESTA MADRE VA EN UN ALERT BIEN CHIDO
                        }
                    } else {
                        console.log(response)
                    }

                });
            }

            function cleanInputs() {
                $("input").val("");
                $("textarea").html("");
            }
        </script>
        <title></title>
    </head>
    <body>
        <div id="formAlumno" class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <legend>Agregar Usuario</legend>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="slctIdTipoUsuario">Tipo usuario</label>
                    <div class="col-md-5">
                        <select id="slctIdTipoUsuario" name="slctIdTipoUsuario" class="form-control">
                            <option value="1">ALUMNO</option>
                            <option value="2">INSTRUCTOR</option>
                            <option value="3">ADMINISTRADOR</option>
                        </select>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtCorreo">Correo Electronico</label>  
                    <div class="col-md-5">
                        <input id="txtCorreo" name="txtCorreo" type="text" placeholder="example@gmail.com" class="form-control input-md" required="">
                        <span class="help-block">Escribe tu dirección de correo</span>  
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtNombre">Nombre </label>  
                    <div class="col-md-5">
                        <input id="txtNombre" name="txtNombre" type="text" placeholder="Luis Alberto " class="form-control input-md" required="">
                        <span class="help-block">Escribe tu nombre aquí</span>  
                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtPassword">Contraseña</label>
                    <div class="col-md-5">
                        <input id="txtPassword" name="txtPassword" type="password" placeholder="************" class="form-control input-md" required="">
                        <span class="help-block">Escribe tu contraseña aquí</span>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtCreditos">Creditos </label>  
                    <div class="col-md-5">
                        <input id="txtCreditos" name="txtCreditos" type="number" min="0" step="100" placeholder="100" class="form-control input-md" required="">
                        <span class="help-block">Numero de creditos </span>  
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtCuenta">Numero de cuenta </label>  
                    <div class="col-md-5">
                        <input id="txtCuenta" name="txtCuenta" type="text" placeholder="XXXXXXXX " class="form-control input-md" >
                        <span class="help-block">Aqui puedes colocar un numero de cuenta</span>  
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="btnRegistrar"></label>
                    <div class="col-md-4">
                        <button id="btnRegistrar" name="btnRegistrar" class="btn btn-success" onclick="add()">Registrar</button>
                    </div>
                </div>

            </fieldset>
        </div>

        <span class="col-sm-2"></span>
        <div class="col-md-8">
            <table id="tablaUsuarios" class="table table-hover table-condensed">
                <tr>
                    <th>ID</th>
                    <th>Correo</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                </tr>
                <?php
                $response = $controller->getAllTable();
//                print_r($response);
//                echo $response;
                foreach ($response['data'] as $user){
                    echo '<tr>';
                    echo '<td>'.$user['id'].'</td>';
                    echo '<td>'.$user['correo'].'</td>';
                    echo '<td>'.$user['nombre'].'</td>';
                    echo '<td>'.$user['tipo'].'</td>';
                    echo '<td><button class="btn-warning" onclick="loadUser('.$user['tipo'].')">Editar</button></td>';
                    
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
