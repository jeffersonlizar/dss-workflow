<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="description" content="DSS" >
        <meta name="keywords" content="DSS,Workflows,KPI" >
        <meta name="author" content="Jefferson Lizarzabal" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
        <!-- optimizando para moviles -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- material icons -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>public/css/material-icons.css" />
        <!-- importando materialize -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>public/css/materialize.css" />
        <!-- estilo personal -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>public/css/personal.css" />        
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/odometer-theme-default.css" />

        <title>DSS</title>
        <link rel="icon" href="<?php echo base_url() ?>public/img/dss-icon.png" />
    </head>
<body class="login">
<div id="log" class="valign-wrapper">
    <div class="valign">
        <form id="formulario" method="POST" action="<?php echo base_url().'usuarios/iniciar' ?>" class="col s12 white">
            <h3>Iniciar Sesión</h3>
            <div class="row">

                <div class="input-field col s12">
                <label>Email</label>

                    <input id="user" name="user" type="text" class="validate"  pattern="[a-zA-Z0-9 ]+" value="<?php echo $usuario_login ?>" <?php if(isset($usuario_login)) echo 'readonly'; ?> >
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="pass" name="pass" type="password" class="validate">
                    <input id="primera_vez" name="primera_vez" type="hidden" class="validate" value="<?php echo $primera_vez ?>">
                    <label>Contraseña</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <span id="error" class="error"><?php echo $error_login ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <input id="form_submit" type="submit" class="btn itami" value="Ingresar">
                </div>
            </div>            
        </form>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery-2.1.1.min.js"></script>
<!-- materialize -->
<script type="text/javascript" src="<?php echo base_url() ?>public/js/materialize.min.js" ></script>
<script src="<?php echo base_url() ?>public/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ?>public/js/validate-spanish.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#formulario").validate({
            rules: {
                user: {
                    required: true,
                    minlength: 3,
                    maxlength: 60
                },
                pass: {
                    required: false,
                    minlength: 3,
                    maxlength: 60
                }
            }
        });
    });

    $('#form_submit').click(function(e){
        e.preventDefault();
        pass = $('#pass').val();
        primera_vez = $('#primera_vez').val();
        if ((primera_vez=='1')&&(pass=='')){
            $('#error').text('Debe ingresar una contraseña válida');
        }else{
            $('#formulario').submit();
        }
    })
</script>
</body>
</html>