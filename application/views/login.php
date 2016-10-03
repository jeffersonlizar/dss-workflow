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
        <form method="POST" action="<?php echo base_url().'usuarios/iniciar' ?>" class="col s12 white">
            <h3>Iniciar Sesión</h3>
            <div class="row">
                <div class="input-field col s12">
                    <input name="user" type="text" class="validate">
                    <label>Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="pass" type="password" class="validate">
                    <label>Contraseña</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <span class="error"><?php echo $error_login ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <input type="submit" class="btn itami" value="Ingresar">
                </div>
            </div>            
        </form>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery-2.1.1.min.js"></script>
<!-- materialize -->
<script type="text/javascript" src="<?php echo base_url() ?>public/js/materialize.min.js" ></script>
</body>
</html>