<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data=$this->Database->cargar_preferencias();
		switch ($data[0]['actividad']){
			case '1': //dia actual
				$actividad = $this->_actividadDelDia();
				break;
			case '2': //dia anterior
				$actividad = $this->_actividadDiaAnterior();
				break;
			case '3': //dia comparativo
				$actividad = $this->_actividadComparacionDias();
				break;
			case '4': //Mes
				$actividad = $this->_actividadDelMes();
				break;
			case '5': //Mes
				$actividad = $this->_actividadComparacionMeses();
				break;
			case '6': //Mes
				$actividad = $this->_actividadDelAno();
				break;
			case '7': //Mes
				$actividad = $this->_actividadComparacionAnos();
				break;
		}
		switch ($data[0]['categoria']){
			case '1': //x dia
				$categorias = $this->_categoriasDelDia();
				break;
			case '2': //x mes
				$categorias = $this->_categoriasDelMes();
				break;
			case '3': //dia comparativo
				$categorias = $this->_categoriasDelAno();
				break;
		}
		switch ($data[0]['productividad']){
			case '1': //x dia
				$productividad = $this->_productividadDelDia();
				break;
			case '2': //x mes
				$productividad = $this->_categoriasDelMes();
				break;
			case '3': //dia comparativo
				$productividad = $this->_categoriasDelAno();
				break;
		}


		$this->load->view('header','', FALSE);	
		$this->load->view('home','', FALSE);	
		$this->load->view('footerbegin','', FALSE);	
		$this->load->view('actividad',$actividad, FALSE);	
		$this->load->view('categoria',$categorias, FALSE);	
		$this->load->view('productividad','', FALSE);	
		$this->load->view('footerend','', FALSE);	
	}

	//calcula la actividad realizada en el dia anterior al actual
	private function _actividadDiaAnterior(){
		//$today = date('Y-m-d 00:00:00');
		$today = '2016-09-15 00:00:00';
		$yesterday = $this->_diaAnterior($today);								
		$actividad = $this->_actividadDia($yesterday);				
		$dia = explode(" ",$yesterday);
		$dia = date_create($dia[0]);
		$dia = date_format($dia,"d-m-Y");
		$titulo = "Actividad del Día Anterior";
		$subtitulo = "Actividades del día ".$dia;
		$intervalo = 1 * 3600 * 1000;
		$fecha_inicio = preg_split("/[\s:-]+/",$yesterday);
		$fecha_inicio[1]=$fecha_inicio[1]-1;
		$fecha_inicio = rtrim(implode(',', $fecha_inicio), ','); //convierte arreglo a string separado por comas		
		$actividad = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $dia,
			'datos_principal' 			=> $actividad,
			'datos_secundario_nombre' 	=> '',
			'datos_secundario' 			=> null,
			'type' 						=> null,
			'intervalo' 				=> $intervalo,
			'fecha_inicio' 				=> $fecha_inicio );
		return $actividad;
	}

	//calcula la actividad realizada en el dia especifico
	private function _actividadDelDia(){
		//$today = date('Y-m-d 00:00:00');
		$today = '2016-09-15 00:00:00';		
		$actividad = $this->_actividadDia($today);				
		$dia = explode(" ",$today);
		$dia = date_create($dia[0]);
		$dia = date_format($dia,"d-m-Y");
		$titulo = "Actividad del Día";
		$subtitulo = "Actividades del día ".$dia;
		$intervalo = 1 * 3600 * 1000;
		$fecha_inicio = preg_split("/[\s:-]+/",$today);
		$fecha_inicio[1]=$fecha_inicio[1]-1;
		$fecha_inicio = rtrim(implode(',', $fecha_inicio), ','); //convierte arreglo a string separado por comas		
		$actividad = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $dia,
			'datos_principal' 			=> $actividad,
			'datos_secundario_nombre' 	=> '',
			'datos_secundario' 			=> null,
			'type' 						=> null,
			'intervalo' 				=> $intervalo,
			'fecha_inicio' 				=> $fecha_inicio );
		return $actividad;
	}

	//comparativa de dias en el grafico de actividades
	private function _actividadComparacionDias($dia1 = '2016-09-15 00:00:00',$dia2 = '2016-09-14 00:00:00'){
		$actividadDia1 = $this->_actividadDia($dia1);
		$actividadDia2 = $this->_actividadDia($dia2);
		$dia1 = explode(" ",$dia1);
		$dia2 = explode(" ",$dia2);
		$dia1 = date_create($dia1[0]);
		$dia2 = date_create($dia2[0]);
		$dia1 = date_format($dia1,"d-m-Y");
		$dia2 = date_format($dia2,"d-m-Y");
		$titulo = "Comparativa de Actividades";
		$subtitulo = "Actividades del día ".$dia1." y del día ".$dia2;
		$intervalo = 1 * 3600 * 1000;
		$actividad = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $dia1,
			'datos_principal' 			=> $actividadDia1,
			'datos_secundario_nombre' 	=> $dia2,
			'datos_secundario' 			=> $actividadDia2,
			'type'						=> 'horas',
			'intervalo' 					=> $intervalo,
			'fecha_inicio' 				=> null );
		return $actividad;
	}

	//calcula la actividad en el dia dado
	private function _actividadDia($dia){		
		$data = $this->Database->actividadDia($dia);
		$datos = rtrim(implode(',', $data), ',');
		return $datos;
	}

	//calcula el dia anterior al pasado
	private function _diaAnterior($dia){
		strtotime($dia);
		$fecha_nueva = strtotime('-24 hour',strtotime($dia));
		$fecha_nueva = date('Y-m-d H:i:s' ,$fecha_nueva);
		return $fecha_nueva;
	}


	private function _actividadDelMes($mes = '2016-09-01 00:00:00'){
		/*
		$mes = explode(" ",$mes);
		$mes = date_create($mes[0]);
		$mes = date_format($mes,"Y-m-d");
		*/
		$actividad = $this->_actividadMes($mes);
		$nombreMes = $this->_nombreMes($mes);
		$titulo = "Comparativa de Actividades";
		$subtitulo = "Actividades del mes: ".$nombreMes;
		$intervalo = 24 * 3600 * 1000; //24 hrs de intervalo
		$fecha_inicio = preg_split("/[\s:-]+/",$mes);
		$fecha_inicio[1]=$fecha_inicio[1]-1;
		$fecha_inicio = rtrim(implode(',', $fecha_inicio), ','); //convierte arreglo a string separado por comas		
		$actividad = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $nombreMes,
			'datos_principal' 			=> $actividad,
			'datos_secundario_nombre' 	=> '',
			'datos_secundario' 			=> null,
			'type'						=> null,
			'intervalo' 				=> $intervalo,
			'fecha_inicio' 				=> $fecha_inicio );
		return $actividad;

	}


	private function _actividadComparacionMeses($mes1 = '2016-09-01 00:00:00', $mes2 = '2016-08-01 00:00:00'){
		/*
		$mes = explode(" ",$mes);
		$mes = date_create($mes[0]);
		$mes = date_format($mes,"Y-m-d");
		*/
		$actividadMes1 = $this->_actividadMes($mes1);
		$actividadMes2 = $this->_actividadMes($mes2);
		$nombreMes1 = $this->_nombreMes($mes1);
		$nombreMes2 = $this->_nombreMes($mes2);
		$titulo = "Comparativa de Actividades";
		$subtitulo = "Actividades del mes: ".$nombreMes1." y del mes: ".$nombreMes2;
		$actividad = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $nombreMes1,
			'datos_principal' 			=> $actividadMes1,
			'datos_secundario_nombre' 	=> $nombreMes2,
			'datos_secundario' 			=> $actividadMes2,
			'type'						=> 'dias',
			'intervalo' 				=> '',
			'fecha_inicio' 				=> null );
		return $actividad;

	}

	private function _actividadMes($mes){
		$data = $this->Database->actividadMes($mes);
		$datos = rtrim(implode(',', $data), ',');
		return $datos;
	}

	private function _actividadDelAno($ano = '2016-01-01 00:00:00'){
		
		$nombreAno = explode("-",$ano);
		$nombreAno = $nombreAno[0];		
		$actividad = $this->_actividadAno($ano);		
		$titulo = "Comparativa de Actividades";
		$subtitulo = "Actividades del año: ".$nombreAno;
		$actividad = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $nombreAno,
			'datos_principal' 			=> $actividad,
			'datos_secundario_nombre' 	=> '',
			'datos_secundario' 			=> null,
			'type'						=> 'meses',
			'intervalo' 				=> '',
			'fecha_inicio' 				=> null );
		return $actividad;
	}

	private function _actividadComparacionAnos($ano1 = '2016-01-01 00:00:00',$ano2 = '2016-01-01 00:00:00'){
		
		$nombreAno1 = explode("-",$ano1);
		$nombreAno1 = $nombreAno1[0];		
		$nombreAno2 = explode("-",$ano2);
		$nombreAno2 = $nombreAno2[0];		
		$actividad1 = $this->_actividadAno($ano1);		
		$actividad2 = $this->_actividadAno($ano2);		
		$titulo = "Comparativa de Actividades";
		$subtitulo = "Actividades del año: ".$nombreAno1." y del año: ".$nombreAno2;
		$actividad = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $nombreAno1,
			'datos_principal' 			=> $actividad1,
			'datos_secundario_nombre' 	=> $nombreAno2,
			'datos_secundario' 			=> $actividad2,
			'type'						=> 'meses',
			'intervalo' 				=> '',
			'fecha_inicio' 				=> null );
		return $actividad;
	}

	private function _actividadAno($ano){
		$data = $this->Database->actividadAno($ano);
		$datos = rtrim(implode(',', $data), ',');
		return $datos;
	}

	private function _nombreMes($fecha){
		$fecha = explode(" ",$fecha);
		$fecha = explode("-",$fecha[0]);
		$mes = $fecha[1];
		switch ($mes){
			case '01':
				$nombreMes = 'Enero';
			break;
			case '02':
				$nombreMes = 'Febrero';
			break;
			case '03':
				$nombreMes = 'Marzo';
			break;
			case '04':
				$nombreMes = 'Abril';
			break;
			case '05':
				$nombreMes = 'Mayo';
			break;
			case '06':
				$nombreMes = 'Junio';
			break;
			case '07':
				$nombreMes = 'Julio';
			break;
			case '08':
				$nombreMes = 'Agosto';
			break;
			case '09':
				$nombreMes = 'Septiembre';
			break;
			case '10':
				$nombreMes = 'Octubre';
			break;
			case '11':
				$nombreMes = 'Noviembre';
			break;
			case '12':
				$nombreMes = 'Diciembre';
			break;
		}
		return $nombreMes;
	}

	//metodo para llamar al calculo de las categorias relizadas en un dia 
	private function _categoriasDelDia($dia = '2016-09-02 00:00:00'){
		$categorias = $this->_categoriasDia($dia);
		$dia = explode(' ',$dia);
		$dia = date_create($dia[0]);
		$dia = date_format($dia,"d-m-Y");
		$titulo = "Flujos de Trabajo por categoría";
		$subtitulo = "Día: ".$dia;		
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'categorias' 				=> $categorias);
		return $data;
	}
	//calcula el porcentaje de las categorias realizadas en un dia
	private function _categoriasDia($dia){
		$datos = array();
		$data = $this->Database->categoriasDia($dia);
		for($i=0;$i<count($data);$i++){
			$datos[$i] = "{ name: '".$data[$i]['nombre']." (".$data[$i]['cant'].")', y:".$data[$i]['porcentaje']."}";
			if (($i+1)!=count($data)){
				$datos[$i] = $datos[0].',';
			}			
		}
		return $datos;
	}

	//metodo para llamar al calculo de las categorias relizadas en un mes
	private function _categoriasDelMes($mes = '2016-09-01 00:00:00'){
		$categorias = $this->_categoriasMes($mes);
		$titulo = "Flujos de Trabajo por categoría";
		$subtitulo = "Mes: ".$this->_nombreMes($mes);
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'categorias' 				=> $categorias);
		return $data;
	}

	//calcula el porcentaje de las categorias realizadas en un mes
	private function _categoriasMes($mes){
		$datos = array();
		$data = $this->Database->categoriasMes($mes);
		for($i=0;$i<count($data);$i++){
			$datos[$i] = "{ name: '".$data[$i]['nombre']." (".$data[$i]['cant'].")', y:".$data[$i]['porcentaje']."}";
			if (($i+1)!=count($data)){
				$datos[$i] = $datos[0].',';
			}			
		}
		return $datos;
	}

	//metodo para llamar al calculo de las categorias relizadas en un año
	private function _categoriasDelAno($ano = '2016-01-01 00:00:00'){
		$categorias = $this->_categoriasAno($ano);
		$ano = explode("-", $ano);
		$titulo = "Flujos de Trabajo por categoría";
		$subtitulo = "Año: ".$ano[0];
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'categorias' 				=> $categorias);
		return $data;
	}
	//calcula el porcentaje de las categorias realizadas en un año
	private function _categoriasAno($ano){
		$datos = array();
		$data = $this->Database->categoriasAno($ano);
		for($i=0;$i<count($data);$i++){
			$datos[$i] = "{ name: '".$data[$i]['nombre']." (".$data[$i]['cant'].")', y:".$data[$i]['porcentaje']."}";
			if (($i+1)!=count($data)){
				$datos[$i] = $datos[0].',';
			}			
		}
		return $datos;
	}

	//metodo para llamar al calculo de las categorias relizadas en un año
	private function _productividadDelDia($dia = '2016-08-05 00:00:00'){
		$this->_productividadDia($dia);
		/*
		$ano = explode("-", $ano);
		$titulo = "Flujos de Trabajo por categoría";
		$subtitulo = "Año: ".$ano[0];
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'categorias' 				=> $categorias);
		return $data;
		*/
	}

	//calcula el porcentaje de la productividad en un dia
	private function _productividadDia($dia){
		$datos = array();
		$data = $this->Database->productividadDia($dia);
		/*
		for($i=0;$i<count($data);$i++){
			$datos[$i] = "{ name: '".$data[$i]['nombre']." (".$data[$i]['cant'].")', y:".$data[$i]['porcentaje']."}";
			if (($i+1)!=count($data)){
				$datos[$i] = $datos[0].',';
			}			
		}*/
		return $datos;
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
