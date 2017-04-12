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

$user = $_SESSION['user'];
$idUser  = $user[id];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/bootstrap.css"/>
        <script src="js/jquery-3.2.0.js"></script>
        <script src="js/bootstrap.js"></script>
        <script type="text/javascript">

            function getAllCategorias(){
                $.ajax({

                    type : 'POST',
                    url: "Controller/controllerRouter.php",
                    data: {
                        target: 'Categoria',
                        method: 'getAll'
                    },
                    context: document.body
                }).done(function(response){
                    if(response!= null){
                        response = JSON.parse(response);
                        if(response == true){
                            $(response.data).each(
                                $("#slctIdCategoria").append("<option id='"+ this.id+"'> "+this.nombre+"</option>");
                            );
                           
                        }
                    }
                })
            }

            function add() {
                $.ajax({
                    type: 'POST',
                    url: "Controller/controllerRouter.php",
                    data: {
                        target: 'Usuario',
                        method: 'add',
                        obj: {
                            idUsuario: $idUser,
                            idCategoria: $("#slctIdCategoria").val(),
                            nombre: $("#txtNombre").val(),
                            descrpcion: $("#txtPropuesta").val()
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
           <div class="form-horizontal" id="frmPropuesta">
    <fieldset>

    <!-- Form Name -->
    <legend>Propuestas</legend>

    <!-- Text input-->
    
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtNombre">Nombre</label>  
  <div class="col-md-6">
  <input id="txtNombre" name="txtNombre" placeholder="Titulo propuesta" class="form-control input-md" required="" type="text">
  <span class="help-block">Añadir curso Matematicas</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtPropuesta">Contenido</label>  
  <div class="col-md-6">
  <input id="txtPropuesta" name="txtPropuesta" placeholder="Inserta aquí la propuesta de curso que tienes" class="form-control input-md" required="" type="text">
  <span class="help-block">Curso de Matematicas para ingeniería con Integrales y Derivadas </span>  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="slctIdCategoria">Categoría</label>
  <div class="col-md-6">
    <select id="slctIdCategoria" name="slctIdCategoria" class="form-control">
    </select>
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
            <table id="tablaPropuestas" class="table table-hover table-condensed">
                <tr>
                    <th>ID</th>
                    <th>idUsuario</th>
                    <th>idCategoria</th>
                    <th>nombre</th>
                    <th>descrpcion</th>
                    <th>status</th>
                </tr>
                <?php
                $response = $controller->getAll();
//                print_r($response);
//                echo $response;
                foreach ($response['data'] as $propuesta){
                    echo '<tr>';
                    echo '<td>'.$propuesta['id'].'</td>';
                    echo '<td>'.$propuesta['idUsuario'].'</td>';
                    echo '<td>'.$propuesta['idCategoria'].'</td>';
                    echo '<td>'.$propuesta['nombre'].'</td>';
                    echo '<td>'.$propuesta['descripcion'].'</td>';
                    echo '<td>'.$propuesta['status'].'</td>';
                                        
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
