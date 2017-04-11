<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <legend>Form Name</legend>

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
                        <input id="txtCreditos" name="txtCreditos" type="text" placeholder="45" class="form-control input-md" required="">
                        <span class="help-block">Numero de creditos </span>  
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="btnRegistrar"></label>
                    <div class="col-md-4">
                        <button id="btnRegistrar" name="btnRegistrar" class="btn btn-success">Registrarme</button>
                    </div>
                </div>

            </fieldset>
        </form>

        <?php
        // put your code here
        ?>
    </body>
</html>
