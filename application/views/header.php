<!DOCTYPE html>
<html lang="es-ES" >
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
		<link type="text/css" rel="stylesheet" href="<?php  base_url() ?>public/css/material-icons.css" />
		<!-- importando materialize -->
		<link type="text/css" rel="stylesheet" href="<?php  base_url() ?>public/css/materialize.css" />
		<!-- estilo personal -->
		<link type="text/css" rel="stylesheet" href="<?php  base_url() ?>public/css/personal.css" />		
        <link rel="stylesheet" href="<?php  base_url() ?>public/css/odometer-theme-default.css" />

		<title>DSS</title>
		<link rel="icon" href="<?php  base_url() ?>public/img/dss-icon.png" />
	</head>

	<body>		
		<!-- header -->
		<header>
	      <nav class="top-nav">
	        <div class="container">
	          <div class="nav-wrapper"><a href="index.php" class="page-title">Sistema de Soporte a Decisiones</a></div>
	        </div>
	      </nav>
	      
	      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>	      
	      <ul class="side-nav fixed" id="mobile-demo">
	        <li><a class="center" href="index.php"><i class="material-icons md-dark md-48">equalizer</i></a></li>
	        <li class="search">
				<div class="search-wrapper card focus">
					<input id="search" type="search" placeholder="Buscar" >
					<i class="material-icons">search</i>
	            	<div class="search-results"></div>
	          	</div>
	        </li>
	        <li  id="tabprincipal" class="active menutab"><a href="#!"><i class="material-icons md-40 md-dark">home</i><span class="menu-title">Inicio</span></a></li>
	        <li id ="tabindicadores" class="menutab"><a href="indicadores.php"><i class="material-icons md-40 md-dark">insert_chart</i><span class="menu-title">Indicadores</span></a></li>
			<li id ="tabreportes" class="menutab"><a href="#!"><i class="material-icons md-40 md-dark">timelapse</i><span class="menu-title">Alarmas</span></a></li>
			<li id ="tabusuarios" class="menutab"><a href="#!"><i class="material-icons md-40 md-dark">account_box</i><span class="menu-title">Usuarios</span></a></li>				
			<li id ="tabajustes" class="menutab"><a href="#!"><i class="material-icons md-40 md-dark">settings</i><span class="menu-title">Ajustes</span></a></li>
			<li id ="tabayuda" class="menutab"><a href="#!"><i class="material-icons md-40 md-dark">help_outline</i><span class="menu-title">Ayuda</span></a></li>
            <!--
			<li id="hidemenu"><i class="material-icons md-48 md-dark">keyboard_arrow_left</i></li>
			<li id="showmenu"><i class="material-icons md-48 md-dark">keyboard_arrow_right</i></li>
            -->
	      </ul>	   

    	</header>
		<!-- /header -->
