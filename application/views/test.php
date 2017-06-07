<?php 
function ubicacion(){
    $enlace='';
    $url=$_SERVER['PHP_SELF'];
    $url2=explode('/', $url);
    $cant= count($url2);
    if (($cant==2)||($cant==3))
        return 'home';
    else if($cant>3)
        for($i=2;$i<$cant;$i++){
            if($i==2)
                $enlace .=$url2[$i];
            else    
                $enlace .='/'.$url2[$i];
        }
        return $enlace;
}
?>
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
	          <div class="nav-wrapper">
	          	<a href="index.php" class="page-title">Sistema de Soporte a Decisiones</a>
		       	<a href="<?php echo base_url().'usuarios/logout' ?>" class="page-title">Salir del Sistema</a>
		       	<span>Usuario: <?php echo $session['user'] ?></span>
		       	<span>Fecha: <span id ="fecha"></span></span>
	          </div>
	      </nav>
	      
	      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>	      
	      <ul class="side-nav fixed" id="mobile-demo">
	        <li><a class="center" href="<?php echo base_url() ?>"><i class="material-icons md-dark md-48">equalizer</i></a></li>
	        
	        <li class="<?php if (ubicacion()=="home") echo 'active ' ?>menutab"><a href="<?php echo base_url() ?>"><i class="material-icons md-40 md-dark">home</i><span class="menu-title">Inicio</span></a></li>
	        
	        <?php if(isset($session)):
	        	if ($session['tipo']=='1'): ?>
	        <li class="<?php if (strpos(ubicacion(),"indicadores")!=false) echo 'active ' ?>menutab"><a class="dropdown-button" data-activates="dropdown1" href="<?php echo base_url().'indicadores' ?>"><i class="material-icons md-40 md-dark">insert_chart</i><span class="menu-title">Indicadores</span></a></li>
	        <ul id="dropdown1" class="dropdown-content">
			  <li><a href="<?php echo base_url().'indicadores/actividad' ?>">Actividad</a></li>
			  <li><a href="<?php echo base_url().'indicadores/categoria' ?>">Categoria</a></li>
			  <li><a href="<?php echo base_url().'indicadores/indicadores' ?>">Indicadores</a></li>
			  <li><a href="<?php echo base_url().'indicadores/crecimiento' ?>">Crecimiento</a></li>
			  <li><a href="<?php echo base_url().'indicadores/tiempo-promedio' ?>">Tiempo Promedio</a></li>
			  <li><a href="<?php echo base_url().'indicadores/actividad-usuario' ?>">Actividad Usuario</a></li>
			  <li><a href="<?php echo base_url().'indicadores/resumen' ?>">Resumen</a></li>
			  <li><a href="<?php echo base_url().'indicadores/duracion-transiciones' ?>">Duración Transición</a></li>
			  <li><a href="<?php echo base_url().'indicadores/duracion-flujo' ?>">Duración Flujo de trabajo</a></li>
			  <li><a href="<?php echo base_url().'indicadores/ultimos' ?>">Ultimas</a></li>
			</ul>
	        <?php endif; endif; ?>
	        <?php if(isset($session)):
	        	if ($session['tipo']=='1'): ?>
			<li class="<?php if (strpos(ubicacion(),"alarmas")!=false) echo 'active ' ?>menutab"><a href="<?php echo base_url().'alarmas' ?>"><i class="material-icons md-40 md-dark">network_check</i><span class="menu-title">Alarmas</span></a></li>
				<?php endif; endif; ?>
			<?php if(isset($session)):
	        	if ($session['tipo']=='1'): ?>
			<li class="<?php if (strpos(ubicacion(),"usuarios")!=false) echo 'active ' ?>menutab"><a href="<?php echo base_url().'usuarios' ?>"><i class="material-icons md-40 md-dark">account_box</i><span class="menu-title">Usuarios</span></a></li>				
				<?php endif; endif; ?>
			<?php if(isset($session)):
	        	if ($session['tipo']=='1'): ?>
			<li class="<?php if (strpos(ubicacion(),"reportes")!=false) echo 'active ' ?>menutab"><a href="<?php echo base_url().'reportes' ?>"><i class="material-icons md-40 md-dark">settings</i><span class="menu-title">Reportes</span></a></li>
				<?php endif; endif; ?>
			<li class="<?php if (strpos(ubicacion(),"ayuda")!=false) echo 'active ' ?>menutab"><a href="<?php echo base_url().'ayuda' ?>"><i class="material-icons md-40 md-dark">help_outline</i><span class="menu-title">Ayuda</span></a></li>
	      </ul>	   

    	</header>
		<!-- /header -->
