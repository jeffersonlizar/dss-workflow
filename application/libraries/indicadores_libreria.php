<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indicadores_libreria
{
	protected $ci;
	var $globales = array();

	public function __construct()
	{
        $this->CI =& get_instance();
        $this->CI->load->model('database', '', true); 
        date_default_timezone_set('America/La_Paz');
		$this->globales['today'] = date('Y-m-d 00:00:00');   
		$this->globales['yesterday'] = $this->_diaAnterior($this->globales['today']);
		$d = new DateTime('first day of this month');
    	$this->globales['mes_actual'] = $d->format('Y-m-d 00:00:00');
    	$this->globales['mes_actual_primer_dia'] = $d->format('Y-m-d 00:00:00');
    	$d = new DateTime('last day of this month');
    	$this->globales['mes_actual_ultimo_dia'] = $d->format('Y-m-d 00:00:00');
    	$d = new DateTime('first day of last month');
    	$this->globales['mes_anterior_primer_dia'] = $d->format('Y-m-d 00:00:00');
    	$d = new DateTime('last day of last month');
    	$this->globales['mes_anterior_ultimo_dia'] = $d->format('Y-m-d 00:00:00');
    	$this->globales['ano_actual'] = date('Y-m-d 00:00:00',strtotime(date('Y-01-01')));
    	$this->globales['ano_actual_primer_dia'] = date('Y-m-d 00:00:00',strtotime(date('Y-01-01')));
    	$this->globales['ano_actual_ultimo_dia'] = date('Y-m-d 00:00:00',strtotime(date('Y-12-31')));
    	$this->globales['ano_anterior_primer_dia'] = strtotime('-1 year',strtotime($this->globales['ano_actual_primer_dia']));
		$this->globales['ano_anterior_primer_dia'] = date('Y-m-d H:i:s' ,$this->globales['ano_anterior_primer_dia']);
		$this->globales['ano_anterior_ultimo_dia'] = strtotime('-1 year',strtotime($this->globales['ano_actual_ultimo_dia']));
		$this->globales['ano_anterior_ultimo_dia'] = date('Y-m-d H:i:s' ,$this->globales['ano_anterior_ultimo_dia']);
	}
	public function indicador_actividad(){
		$indicador_actividad = $this->CI->database->cargar_indicador_actividad();
		switch ($indicador_actividad['opcion']){
			case '1': //dia actual				
				$actividad = $this->_actividadDelDia($this->globales['today']);
				break;
			case '2': //dia anterior				
				$actividad = $this->_actividadDelDia($this->globales['yesterday']);
				break;
			case '3': //dia
				$dia = $indicador_actividad['dia'];
				$actividad = $this->_actividadDelDia($dia);
				break;	
			case '4': //dia comparativo
				$dia1 = $indicador_actividad['dia_comparativo1'];
				$dia2 = $indicador_actividad['dia_comparativo2'];
				$actividad = $this->_actividadComparacionDias($dia1,$dia2);
				break;
			case '5': //Mes Actual
				$actividad = $this->_actividadDelMes($this->globales['mes_actual']);
				break;
			case '6': //Mes
				$mes = $indicador_actividad['mes'];
				$actividad = $this->_actividadDelMes($mes);
				break;
			case '7': //Mes comparativo
				$mes1 = $indicador_actividad['mes_comparativo1'];
				$mes2 = $indicador_actividad['mes_comparativo2'];
				$actividad = $this->_actividadComparacionMeses($mes1,$mes2);
				break;
			case '8': //Ano Actual
				$actividad = $this->_actividadDelAno($this->globales['ano_actual']);
				break;
			case '9': //Ano
				$ano = $indicador_actividad['ano'];
				$actividad = $this->_actividadDelAno($ano);
				break;
			case '10': //Ano Comparativo
				$ano1 = $indicador_actividad['ano_comparativo1'];
				$ano2 = $indicador_actividad['ano_comparativo2'];
				$actividad = $this->_actividadComparacionAnos($ano1,$ano2);
				break;
		}
		return $actividad;
	}

	public function indicador_categoria(){
		$indicador_categoria = $this->CI->database->cargar_indicador_categoria();
		switch ($indicador_categoria['opcion']){
			case '1': //dia actual
				$categorias = $this->_categoriasDelDia($this->globales['today']);
				break;
			case '2': //dia anterior
				$categorias = $this->_categoriasDelDia($this->globales['yesterday']);
				break;
			case '3': //dia
				$dia = $indicador_categoria['dia'];
				$categorias = $this->_categoriasDelDia($dia);
				break;
			case '4': //mes actual				
				$categorias = $this->_categoriasDelMes($this->globales['mes_actual']);
				break;
			case '5': //mes
				$mes = $indicador_categoria['mes'];
				$categorias = $this->_categoriasDelMes($mes);
				break;
			case '6': //ano actual
				$categorias = $this->_categoriasDelAno($this->globales['ano_actual']);
				break;
			case '7': //ano
				$ano = $indicador_categoria['ano'];
				$categorias = $this->_categoriasDelAno($ano);
				break;
			case '8': //periodo
				$fecha1 = $indicador_categoria['periodo_inicio'];
				$fecha2 = $indicador_categoria['periodo_fin'];
				$categorias = $this->_categoriasDelPeriodo($fecha1,$fecha2);
				break;
		}
		return $categorias;
	}

	public function indicador_indicadores(){
		$indicador_indicadores = $this->CI->database->cargar_indicador_indicadores();
		switch ($indicador_indicadores['opcion']){
			case '1': //dia actual
				$indicadores = $this->_indicadoresDelDia($this->globales['today'],$this->globales['today']);
				break;
			case '2': //dia anterior
				$indicadores = $this->_indicadoresDelDia($this->globales['yesterday'],$this->globales['yesterday']);
				break;
			case '3': //dia
				$dia = $indicador_indicadores['dia'];
				$indicadores = $this->_indicadoresDelDia($dia,$dia);
				break;
			case '4': //mes actual
				$indicadores = $this->_indicadoresDelMes($this->globales['mes_actual']);
				break;
			case '5': //mes
				$mes = $indicador_indicadores['mes'];
				$indicadores = $this->_indicadoresDelMes($mes);
				break;
			case '6': //ano actual
				$indicadores = $this->_indicadoresDelAno($this->globales['ano_actual']);
				break; 
			case '7': // ano
				$ano = $indicador_indicadores['ano'];
				$indicadores = $this->_indicadoresDelAno($ano);
				break; 
			case '8': // Periodo
				$fecha1 = $indicador_indicadores['periodo_inicio'];
				$fecha2 = $indicador_indicadores['periodo_fin'];
				$indicadores = $this->_indicadoresDelPeriodo($fecha1,$fecha2);
				break; 
		}
		return $indicadores;
	}

	public function indicador_crecimiento(){
		$indicador_crecimiento = $this->CI->database->cargar_indicador_crecimiento();
		switch ($indicador_crecimiento['opcion']){
			case '11': //instancias dia actual con respecto al dia anterior
				$crecimiento = $this->_crecimientoDelDia(1,$this->globales['yesterday'],$this->globales['today']); //primero el mes base y luego el que se quiere calcular
				break;
			case '12': //instancias mes actual con respecto al mes anterior				
				$crecimiento = $this->_crecimientoDelMes(1,$this->globales['mes_anterior_primer_dia'],$this->globales['mes_anterior_ultimo_dia'],$this->globales['mes_actual_primer_dia'],$this->globales['mes_actual_ultimo_dia']);
				break;
			case '13': //instancias ano actual con respecto al ano anterior
				$crecimiento = $this->_crecimientoDelAno(1,$this->globales['ano_anterior_primer_dia'],$this->globales['ano_anterior_ultimo_dia'],$this->globales['ano_actual_primer_dia'],$this->globales['ano_actual_ultimo_dia']);
				break;
			case '14': //instancias 2 periodos de tiempo
				$fecha1 = $indicador_crecimiento['periodo1'];
				$fecha2 = $indicador_crecimiento['periodo2'];
				$fecha3 = $indicador_crecimiento['periodo3'];
				$fecha4 = $indicador_crecimiento['periodo4'];
				$crecimiento = $this->_crecimientoDelPeriodo(1,$fecha1,$fecha2,$fecha3,$fecha4);
				break;
			case '21': //instancias dia actual con respecto al dia anterior
				$crecimiento = $this->_crecimientoDelDia(2,$this->globales['yesterday'],$this->globales['today']); //primero el mes base y luego el que se quiere calcular
				break;
			case '22': //instancias mes actual con respecto al mes anterior				
				$crecimiento = $this->_crecimientoDelMes(2,$this->globales['mes_anterior_primer_dia'],$this->globales['mes_anterior_ultimo_dia'],$this->globales['mes_actual_primer_dia'],$this->globales['mes_actual_ultimo_dia']);
				break;
			case '23': //instancias ano actual con respecto al ano anterior
				$crecimiento = $this->_crecimientoDelAno(2,$this->globales['ano_anterior_primer_dia'],$this->globales['ano_anterior_ultimo_dia'],$this->globales['ano_actual_primer_dia'],$this->globales['ano_actual_ultimo_dia']);
				break;
			case '24': //instancias 2 periodos de tiempo
				$fecha1 = $indicador_crecimiento['periodo1'];
				$fecha2 = $indicador_crecimiento['periodo2'];
				$fecha3 = $indicador_crecimiento['periodo3'];
				$fecha4 = $indicador_crecimiento['periodo4'];
				$crecimiento = $this->_crecimientoDelPeriodo(2,$fecha1,$fecha2,$fecha3,$fecha4);
				break;
		}
		return $crecimiento;
	}
	
	public function indicador_tiempo_promedio(){
		$indicador_tiempo_promedio = $this->CI->database->cargar_indicador_tiempo_promedio();
		switch ($indicador_tiempo_promedio['opcion']){
			case '11': //instancias en el mes actual
				$tiempo_promedio = $this->_tiempoPromedioDelMes(1,$this->globales['mes_actual_primer_dia'],$this->globales['mes_actual_ultimo_dia']);
				break;
			case '12': //instancias en el mes especifico			
				$fecha1 = $indicador_tiempo_promedio['mes'];
				$fecha2 = strtotime('+1 month',strtotime($fecha1));  //datos de prueba
				$fecha2 = date('Y-m-d H:i:s' ,$fecha2);  //datos de prueba
				$tiempo_promedio = $this->_tiempoPromedioDelMes(1,$fecha1,$fecha2);
				break;
			case '13': //instancias en el ano actual
				$tiempo_promedio = $this->_tiempoPromedioDelAno(1,$this->globales['ano_actual_primer_dia'],$this->globales['ano_actual_ultimo_dia']);
				break;
			case '14': //instancias en el ano especifico
				$fecha1 = $indicador_tiempo_promedio['ano'];
				$fecha2 = strtotime('+12 month',strtotime($fecha1));
				$fecha2 = date('Y-m-d H:i:s' ,$fecha2);
				$tiempo_promedio = $this->_tiempoPromedioDelAno(1,$fecha1,$fecha2);
				break;
			case '15': //instancias en el periodo
				$fecha1 = $indicador_tiempo_promedio['periodo_inicio'];
				$fecha2 = $indicador_tiempo_promedio['periodo_fin'];
				$tiempo_promedio = $this->_tiempoPromedioDelPeriodo(1,$fecha1,$fecha2); 
				break;
			case '21': //instancias en el mes actual
				$tiempo_promedio = $this->_tiempoPromedioDelMes(2,$this->globales['mes_actual_primer_dia'],$this->globales['mes_actual_ultimo_dia']);
				break;
			case '22': //instancias en el mes especifico			
				$fecha1 = $indicador_tiempo_promedio['mes'];
				$fecha2 = strtotime('+1 month',strtotime($fecha1));  //datos de prueba
				$fecha2 = date('Y-m-d H:i:s' ,$fecha2);  //datos de prueba
				$tiempo_promedio = $this->_tiempoPromedioDelMes(2,$fecha1,$fecha2);
				break;
			case '23': //instancias en el ano actual
				$tiempo_promedio = $this->_tiempoPromedioDelAno(2,$this->globales['ano_actual_primer_dia'],$this->globales['ano_actual_ultimo_dia']);
				break;
			case '24': //instancias en el ano especifico
				$fecha1 = $indicador_tiempo_promedio['ano'];
				$fecha2 = strtotime('+12 month',strtotime($fecha1));
				$fecha2 = date('Y-m-d H:i:s' ,$fecha2);
				$tiempo_promedio = $this->_tiempoPromedioDelAno(2,$fecha1,$fecha2);
				break;
			case '25': //instancias en el periodo
				$fecha1 = $indicador_tiempo_promedio['periodo_inicio'];
				$fecha2 = $indicador_tiempo_promedio['periodo_fin'];
				$tiempo_promedio = $this->_tiempoPromedioDelPeriodo(2,$fecha1,$fecha2); 
				break;
		}
		return $tiempo_promedio;
	}

	public function indicador_actividad_usuario(){
		$indicador_actividad_usuario = $this->CI->database->cargar_indicador_actividad_usuario();
		switch ($indicador_actividad_usuario['opcion']){
			case '11': //instancias en el dia actual
				$usuario = $indicador_actividad_usuario['usuario1'];
				$actividad_user = $this->_actividadUsuarioDelDia(1,$usuario,$this->globales['today']);
				break;
			case '12': //instancias dia anterior				
				$usuario = $indicador_actividad_usuario['usuario1'];
				$actividad_user = $this->_actividadUsuarioDelDia(1,$usuario,$this->globales['yesterday']);
				break;
			case '13': //instancias dia 
				$dia = $indicador_actividad_usuario['dia'];
				$usuario = $indicador_actividad_usuario['usuario1'];
				$actividad_user = $this->_actividadUsuarioDelDia(1,$usuario,$dia);
				break;
			case '14': //instancias dia comparativo usuario
				$dia = $indicador_actividad_usuario['dia'];
				$usuario1 = $indicador_actividad_usuario['usuario1'];
				$usuario2 = $indicador_actividad_usuario['usuario2'];
				$actividad_user = $this->_actividadUsuarioDelDiaComparativo(1,$usuario1,$usuario2,$dia);
				break;
			case '15': //instancias dia grupo de usuarios
				$dia = $indicador_actividad_usuario['dia'];
				$tipo_usuario = $indicador_actividad_usuario['tipo_usuario'];
				$actividad_user = $this->_actividadUsuarioDelDiaGrupo(1,$tipo_usuario,$dia);
				break;
			case '16': //instancias dia todos los usuarios
				$dia = $indicador_actividad_usuario['dia'];
				$actividad_user = $this->_actividadUsuarioDelDiaTodos(1,$dia);
				break;
			case '17': //instancias en el mes actual
				$usuario = $indicador_actividad_usuario['usuario1'];
				$mes = $this->globales['mes_actual_primer_dia'];
				$actividad_user = $this->_actividadUsuarioDelMes(1,$usuario,$mes);
				break;
			case '18': //instancias mes 				
				$usuario = $indicador_actividad_usuario['usuario1'];
				$mes = $indicador_actividad_usuario['mes'];
				$actividad_user = $this->_actividadUsuarioDelMes(1,$usuario,$mes);
				break;
			case '19': //instancias mes comparativo usuario
				$mes = $indicador_actividad_usuario['mes'];
				$usuario1 = $indicador_actividad_usuario['usuario1'];
				$usuario2 = $indicador_actividad_usuario['usuario2'];
				$actividad_user = $this->_actividadUsuarioDelMesComparativo(1,$usuario1,$usuario2,$mes);
				break;
			case '110': //instancias mes grupo de usuarios
				$mes = $indicador_actividad_usuario['mes'];
				$tipo_usuario = $indicador_actividad_usuario['tipo_usuario'];
				$actividad_user = $this->_actividadUsuarioDelMesGrupo(1,$tipo_usuario,$mes);
				break;
			case '111': //instancias mes todos los usuarios
				$mes = $indicador_actividad_usuario['mes'];
				$actividad_user = $this->_actividadUsuarioDelMesTodos(1,$mes);
				break;
			case '112': //instancias en el año actual
				$usuario = $indicador_actividad_usuario['usuario1'];
				$ano = $this->globales['ano_actual_primer_dia'];
				$actividad_user = $this->_actividadUsuarioDelAno(1,$usuario,$ano);
				break;
			case '113': //instancias en el año
				$usuario = $indicador_actividad_usuario['usuario1'];
				$ano = $indicador_actividad_usuario['ano'];
				$actividad_user = $this->_actividadUsuarioDelAno(1,$usuario,$ano);
				break;
			case '114': //instancias en el año comparativo
				$usuario1 = $indicador_actividad_usuario['usuario1'];
				$usuario2 = $indicador_actividad_usuario['usuario2'];
				$ano = $indicador_actividad_usuario['ano'];
				$actividad_user = $this->_actividadUsuarioDelAnoComparativo(1,$usuario1,$usuario2,$ano);
				break;
			case '115': //instancias en el año grupo de usuario
				$tipo_usuario = $indicador_actividad_usuario['tipo_usuario'];
				$ano = $indicador_actividad_usuario['ano'];
				$actividad_user = $this->_actividadUsuarioDelAnoGrupo(1,$tipo_usuario,$ano);
				break;
			case '116': //instancias en el año todos los usuarios
				$ano = $indicador_actividad_usuario['ano'];
				$actividad_user = $this->_actividadUsuarioDelAnoTodos(1,$ano);
				break;
			case '21': //transiciones en el dia actual
				$usuario = $indicador_actividad_usuario['usuario1'];
				$actividad_user = $this->_actividadUsuarioDelDia(2,$usuario,$this->globales['today']);
				break;
			case '22': //transiciones dia anterior				
				$usuario = $indicador_actividad_usuario['usuario1'];
				$actividad_user = $this->_actividadUsuarioDelDia(2,$usuario,$this->globales['yesterday']);
				break;
			case '23': //transiciones dia 
				$dia = $indicador_actividad_usuario['dia'];
				$usuario = $indicador_actividad_usuario['usuario1'];
				$actividad_user = $this->_actividadUsuarioDelDia(2,$usuario,$dia);
				break;
			case '24': //transiciones dia comparativo usuario
				$dia = $indicador_actividad_usuario['dia'];
				$usuario1 = $indicador_actividad_usuario['usuario1'];
				$usuario2 = $indicador_actividad_usuario['usuario2'];
				$actividad_user = $this->_actividadUsuarioDelDiaComparativo(2,$usuario1,$usuario2,$dia);
				break;
			case '25': //transiciones dia grupo de usuarios
				$dia = $indicador_actividad_usuario['dia'];
				$tipo_usuario = $indicador_actividad_usuario['tipo_usuario'];
				$actividad_user = $this->_actividadUsuarioDelDiaGrupo(2,$tipo_usuario,$dia);
				break;
			case '26': //transiciones dia todos los usuarios
				$dia = $indicador_actividad_usuario['dia'];
				$actividad_user = $this->_actividadUsuarioDelDiaTodos(2,$dia);
				break;
			case '27': //transiciones en el mes actual
				$usuario = $indicador_actividad_usuario['usuario1'];
				$mes = $this->globales['mes_actual_primer_dia'];
				$actividad_user = $this->_actividadUsuarioDelMes(2,$usuario,$mes);
				break;
			case '28': //transiciones mes 				
				$usuario = $indicador_actividad_usuario['usuario1'];
				$mes = $indicador_actividad_usuario['mes'];
				$actividad_user = $this->_actividadUsuarioDelMes(2,$usuario,$mes);
				break;
			case '29': //transiciones mes comparativo usuario
				$mes = $indicador_actividad_usuario['mes'];
				$usuario1 = $indicador_actividad_usuario['usuario1'];
				$usuario2 = $indicador_actividad_usuario['usuario2'];
				$actividad_user = $this->_actividadUsuarioDelMesComparativo(2,$usuario1,$usuario2,$mes);
				break;
			case '210': //transiciones mes grupo de usuarios
				$mes = $indicador_actividad_usuario['mes'];
				$tipo_usuario = $indicador_actividad_usuario['tipo_usuario'];
				$actividad_user = $this->_actividadUsuarioDelMesGrupo(2,$tipo_usuario,$mes);
				break;
			case '211': //transiciones mes todos los usuarios
				$mes = $indicador_actividad_usuario['mes'];
				$actividad_user = $this->_actividadUsuarioDelMesTodos(2,$mes);
				break;
			case '212': //transiciones en el año actual
				$usuario = $indicador_actividad_usuario['usuario1'];
				$ano = $this->globales['ano_actual_primer_dia'];
				$actividad_user = $this->_actividadUsuarioDelAno(2,$usuario,$ano);
				break;
			case '213': //transiciones en el año
				$usuario = $indicador_actividad_usuario['usuario1'];
				$ano = $indicador_actividad_usuario['ano'];
				$actividad_user = $this->_actividadUsuarioDelAno(2,$usuario,$ano);
				break;
			case '214': //transiciones en el año comparativo
				$usuario1 = $indicador_actividad_usuario['usuario1'];
				$usuario2 = $indicador_actividad_usuario['usuario2'];
				$ano = $indicador_actividad_usuario['ano'];
				$actividad_user = $this->_actividadUsuarioDelAnoComparativo(2,$usuario1,$usuario2,$ano);
				break;
			case '215': //transiciones en el año grupo de usuario
				$tipo_usuario = $indicador_actividad_usuario['tipo_usuario'];
				$ano = $indicador_actividad_usuario['ano'];
				$actividad_user = $this->_actividadUsuarioDelAnoGrupo(2,$tipo_usuario,$ano);
				break;
			case '216': //transiciones en el año todos los usuarios
				$ano = $indicador_actividad_usuario['ano'];
				$actividad_user = $this->_actividadUsuarioDelAnoTodos(2,$ano);
				break;
		}
		return $actividad_user;
	}

	public function indicador_resumen(){
		$indicador_resumen = $this->CI->database->cargar_indicador_resumen();
		switch ($indicador_resumen['opcion']){
			case '1': //dia actual
				$resumen = $this->_resumenDelDia($this->globales['today']);
				break;
			case '2': //dia anterior
				$resumen = $this->_resumenDelDia($this->globales['yesterday']);
				break;
			case '3': //dia 
				$dia = $indicador_resumen['dia'];
				$resumen = $this->_resumenDelDia($dia);
				break;
			case '4': //mes actual 
				$resumen = $this->_resumenDelMes($this->globales['mes_actual_primer_dia'],$this->globales['mes_actual_ultimo_dia']);
				break;
			case '5': //mes 
				$mes = $indicador_resumen['mes'];
				$ultimo_dia = $this->_mesUltimoDia($mes);
				$resumen = $this->_resumenDelMes($mes,$ultimo_dia);
				break;
			case '6': //año actual
				$resumen = $this->_resumenDelAno($this->globales['ano_actual_primer_dia'],$this->globales['ano_actual_ultimo_dia']);
				break;
			case '7': //año
				$ano = $indicador_resumen['ano'];
				$ano_ultimo_dia = $this->_anoUltimoDia($ano);
				$resumen = $this->_resumenDelAno($ano,$ano_ultimo_dia);
				break;
			case '8': //periodo
				$fecha_inicial = $indicador_resumen['periodo_inicio'];
				$fecha_final= $indicador_resumen['periodo_fin'];
				$resumen = $this->_resumenDelPeriodo($fecha_inicial,$fecha_final);
				break;
		}
		return $resumen;
	}

	public function indicador_duracion_transicion(){
		$indicador_duracion_transicion = $this->CI->database->cargar_indicador_duracion_transicion();
		switch ($indicador_duracion_transicion['opcion']){
			case '1': //dia actual				
				$transicion = $indicador_duracion_transicion['transicion']; 
				$tipo_usuario = $indicador_duracion_transicion['tipo_usuario']; 
				$usuario = $indicador_duracion_transicion['usuario'];
				if ($usuario!='all')
					$duracion_transicion = $this->_duracionTransicionUsuarioDia($usuario,$transicion,$tipo_usuario,$this->globales['today']);
				else{
					$duracion_transicion = $this->_duracionTransicionTodosDia($usuario,$transicion,$tipo_usuario,$this->globales['today']);
				}
				break;
			case '2': //dia anterior
				$transicion = $indicador_duracion_transicion['transicion']; 
				$tipo_usuario = $indicador_duracion_transicion['tipo_usuario']; 
				$usuario = $indicador_duracion_transicion['usuario'];
				if ($usuario!='all')
					$duracion_transicion = $this->_duracionTransicionUsuarioDia($usuario,$transicion,$tipo_usuario,$this->globales['yesterday']);
				else{
					$duracion_transicion = $this->_duracionTransicionTodosDia($usuario,$transicion,$tipo_usuario,$this->globales['yesterday']);
				}
				break;
			case '3': //dia 
				$dia = $indicador_duracion_transicion['dia']; 
				$transicion = $indicador_duracion_transicion['transicion']; 
				$tipo_usuario = $indicador_duracion_transicion['tipo_usuario']; 
				$usuario = $indicador_duracion_transicion['usuario'];
				if ($usuario!='all')
					$duracion_transicion = $this->_duracionTransicionUsuarioDia($usuario,$transicion,$tipo_usuario,$dia);
				else{
					$duracion_transicion = $this->_duracionTransicionTodosDia($usuario,$transicion,$tipo_usuario,$dia);
				}
				break;
			case '4': //mes actual 
				$transicion = $indicador_duracion_transicion['transicion']; 
				$tipo_usuario = $indicador_duracion_transicion['tipo_usuario']; 
				$usuario = $indicador_duracion_transicion['usuario'];
				if ($usuario!='all')
					$duracion_transicion = $this->_duracionTransicionUsuarioMes($usuario,$transicion,$tipo_usuario,$this->globales['mes_actual_primer_dia'],$this->globales['mes_actual_ultimo_dia']);
				else{
					$duracion_transicion = $this->_duracionTransicionTodosMes($usuario,$transicion,$tipo_usuario,$this->globales['mes_actual_primer_dia'],$this->globales['mes_actual_ultimo_dia']);
				}
				break;
			case '5': //mes 
				$fecha_inicial = $indicador_duracion_transicion['mes']; 
				$fecha_final = $this->_mesUltimoDia($fecha_inicial); 		
				$transicion = $indicador_duracion_transicion['transicion']; 
				$tipo_usuario = $indicador_duracion_transicion['tipo_usuario']; 
				$usuario = $indicador_duracion_transicion['usuario'];
				if ($usuario!='all')
					$duracion_transicion = $this->_duracionTransicionUsuarioMes($usuario,$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);
				else{
					$duracion_transicion = $this->_duracionTransicionTodosMes($usuario,$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);
				}
				break;
			case '6': //año actual
				$transicion = $indicador_duracion_transicion['transicion']; 
				$tipo_usuario = $indicador_duracion_transicion['tipo_usuario']; 
				$usuario = $indicador_duracion_transicion['usuario'];
				if ($usuario!='all')
					$duracion_transicion = $this->_duracionTransicionUsuarioAno($usuario,$transicion,$tipo_usuario,$this->globales['ano_actual_primer_dia'],$this->globales['ano_actual_ultimo_dia']);
				else{
					$duracion_transicion = $this->_duracionTransicionTodosAno($usuario,$transicion,$tipo_usuario,$this->globales['ano_actual_primer_dia'],$this->globales['ano_actual_ultimo_dia']);
				}
				break;
			case '7': //año
				$fecha_inicial = $indicador_duracion_transicion['ano']; 
				$fecha_final = $this->_anoUltimoDia($fecha_inicial);								
				$transicion = $indicador_duracion_transicion['transicion']; 
				$tipo_usuario = $indicador_duracion_transicion['tipo_usuario']; 
				$usuario = $indicador_duracion_transicion['usuario'];
				if ($usuario!='all')
					$duracion_transicion = $this->_duracionTransicionUsuarioAno($usuario,$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);
				else{
					$duracion_transicion = $this->_duracionTransicionTodosAno($usuario,$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);
				}
				break;
			case '8': //periodo
				$fecha_inicial = $indicador_duracion_transicion['periodo_inicio']; 
				$fecha_final = $indicador_duracion_transicion['periodo_fin']; 
				$transicion = $indicador_duracion_transicion['transicion']; 
				$tipo_usuario = $indicador_duracion_transicion['tipo_usuario']; 
				$usuario = $indicador_duracion_transicion['usuario'];
				if ($usuario!='all')
					$duracion_transicion = $this->_duracionTransicionUsuarioPeriodo($usuario,$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);
				else{
					$duracion_transicion = $this->_duracionTransicionTodosPeriodo($usuario,$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);
				}
				break;
		}
		return $duracion_transicion;
	}

	public function indicador_duracion_workflow(){
		$indicador_duracion_workflow = $this->CI->database->cargar_indicador_duracion_workflow();
		switch ($indicador_duracion_workflow['opcion']){
			case '1': //dia actual				
				$workflow = $indicador_duracion_workflow['workflow']; 
				$tipo_usuario = $indicador_duracion_workflow['tipo_usuario'];
				$usuario = $indicador_duracion_workflow['usuario'];
				if ($usuario!='all')
					$duracion_workflow = $this->_duracionWorkflowUsuarioDia($usuario,$workflow,$tipo_usuario,$this->globales['today']);
				else{
					$duracion_workflow = $this->_duracionWorkflowTodosDia($usuario,$workflow,$tipo_usuario,$this->globales['today']);
				}
				break;
			case '2': //dia anterior
				$workflow = $indicador_duracion_workflow['workflow']; 
				$tipo_usuario = $indicador_duracion_workflow['tipo_usuario'];
				$usuario = $indicador_duracion_workflow['usuario'];
				if ($usuario!='all')
					$duracion_workflow = $this->_duracionWorkflowUsuarioDia($usuario,$workflow,$tipo_usuario,$this->globales['yesterday']);
				else{
					$duracion_workflow = $this->_duracionWorkflowTodosDia($usuario,$workflow,$tipo_usuario,$this->globales['yesterday']);
				}
				break;
			case '3': //dia 
				$dia = $indicador_duracion_workflow['dia']; 
				$workflow = $indicador_duracion_workflow['workflow']; 
				$tipo_usuario = $indicador_duracion_workflow['tipo_usuario'];
				$usuario = $indicador_duracion_workflow['usuario'];
				if ($usuario!='all')
					$duracion_workflow = $this->_duracionWorkflowUsuarioDia($usuario,$workflow,$tipo_usuario,$dia);
				else{
					$duracion_workflow = $this->_duracionWorkflowTodosDia($usuario,$workflow,$tipo_usuario,$dia);
				}
				break;
			case '4': //mes actual 
				$workflow = $indicador_duracion_workflow['workflow']; 
				$tipo_usuario = $indicador_duracion_workflow['tipo_usuario'];
				$usuario = $indicador_duracion_workflow['usuario'];
				if ($usuario!='all')
					$duracion_workflow = $this->_duracionWorkflowUsuarioMes($usuario,$workflow,$tipo_usuario,$this->globales['mes_actual_primer_dia'],$this->globales['mes_actual_ultimo_dia']);
				else{
					$duracion_workflow = $this->_duracionWorkflowTodosMes($usuario,$workflow,$tipo_usuario,$this->globales['mes_actual_primer_dia'],$this->globales['mes_actual_ultimo_dia']);
				}
				break;
			case '5': //mes 
				$fecha_inicial = $indicador_duracion_workflow['mes']; 
				$fecha_final = $this->_mesUltimoDia($fecha_inicial); 		
				$workflow = $indicador_duracion_workflow['workflow']; 
				$tipo_usuario = $indicador_duracion_workflow['tipo_usuario'];
				$usuario = $indicador_duracion_workflow['usuario'];
				if ($usuario!='all')
					$duracion_workflow = $this->_duracionWorkflowUsuarioMes($usuario,$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);
				else{
					$duracion_workflow = $this->_duracionWorkflowTodosMes($usuario,$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);
				}
				break;
			case '6': //año actual
				$workflow = $indicador_duracion_workflow['workflow']; 
				$tipo_usuario = $indicador_duracion_workflow['tipo_usuario'];
				$usuario = $indicador_duracion_workflow['usuario'];
				if ($usuario!='all')
					$duracion_workflow = $this->_duracionWorkflowUsuarioAno($usuario,$workflow,$tipo_usuario,$this->globales['ano_actual_primer_dia'],$this->globales['ano_actual_ultimo_dia']);
				else{
					$duracion_workflow = $this->_duracionWorkflowTodosAno($usuario,$workflow,$tipo_usuario,$this->globales['ano_actual_primer_dia'],$this->globales['ano_actual_ultimo_dia']);
				}
				break;
			case '7': //año
				$fecha_inicial = $indicador_duracion_workflow['ano']; 
				$fecha_final = $this->_anoUltimoDia($fecha_inicial);								
				$workflow = $indicador_duracion_workflow['workflow']; 
				$tipo_usuario = $indicador_duracion_workflow['tipo_usuario'];
				$usuario = $indicador_duracion_workflow['usuario'];
				if ($usuario!='all')
					$duracion_workflow = $this->_duracionWorkflowUsuarioAno($usuario,$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);
				else{
					$duracion_workflow = $this->_duracionWorkflowTodosAno($usuario,$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);
				}
				break;
			case '8': //periodo
				$fecha_inicial = $indicador_duracion_workflow['periodo_inicio']; 
				$fecha_final = $indicador_duracion_workflow['periodo_fin']; 
				$workflow = $indicador_duracion_workflow['workflow']; 
				$tipo_usuario = $indicador_duracion_workflow['tipo_usuario'];
				$usuario = $indicador_duracion_workflow['usuario'];
				if ($usuario!='all')
					$duracion_workflow = $this->_duracionWorkflowUsuarioPeriodo($usuario,$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);
				else{
					$duracion_workflow = $this->_duracionWorkflowTodosPeriodo($usuario,$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);
				}
				break;
		}
		return $duracion_workflow;
	}

	public function indicador_ultimas(){

		$indicador_ultimas = $this->CI->database->cargar_indicador_ultimas();
		$ultimas_instancias = $indicador_ultimas['ultimas_instancias'];
		$data['ultimas_instancias'] = $ultimas_instancias;
		$ultimas_transiciones = $indicador_ultimas['ultimas_transiciones'];
		$data['ultimas_transiciones'] = $ultimas_transiciones;
		$ultimas_instancias_transiciones = $this->_ultimas($this->globales['today'],$ultimas_instancias,$ultimas_transiciones);
		$data['ultimas_instancias_transiciones'] = $ultimas_instancias_transiciones;
		return $data;
	}


	//calcula el ultimo dia del mes
	private function _anoUltimoDia($fecha_inicial){
		$ano = explode("-",$fecha_inicial);
		$fecha_nueva = $ano[0].'-12-31';	
		return $fecha_nueva;
	}

	//calcula el ultimo dia del año
	private function _mesUltimoDia($fecha_inicial){
		$fecha_final = strtotime ('+1 month',strtotime($fecha_inicial));
		$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
		$fecha_nueva = strtotime('-1 day',strtotime($fecha_final));
		$fecha_nueva = date('Y-m-d H:i:s' ,$fecha_nueva);
		return $fecha_nueva;
	}

	//calcula la actividad realizada en el dia especifico
	private function _actividadDelDia($dia){
		$actividad = $this->_actividadDia($dia);	
		$arr = explode(",", $actividad);
		$cant = $arr[0];
		unset($arr[0]);
		$actividad = rtrim(implode(',', $arr), ',');
		$dia = explode(" ",$dia);
		$dia = date_create($dia[0]);
		$dia = date_format($dia,"d-m-Y");
		$titulo = "Actividad";
		$subtitulo = "Actividades del día ".$dia;
		$intervalo = 1 * 3600 * 1000;
		$fecha_inicio = preg_split("/[\s:-]+/",$dia);
		$fecha_inicio[1]=$fecha_inicio[1]-1;
		$fecha_inicio = rtrim(implode(',', $fecha_inicio), ','); //convierte arreglo a string separado por comas		
		$serie = $dia." (".$cant.")";
		$actividad = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $serie,
			'datos_principal' 			=> $actividad,
			'datos_secundario_nombre' 	=> '',
			'datos_secundario' 			=> null,
			'type' 						=> null,
			'intervalo' 				=> $intervalo,
			'fecha_inicio' 				=> $fecha_inicio );
		return $actividad;
	}

	//comparativa de dias en el grafico de actividades
	private function _actividadComparacionDias($dia1,$dia2){
		$actividadDia1 = $this->_actividadDia($dia1);
		$actividadDia2 = $this->_actividadDia($dia2);
		$arr = explode(",", $actividadDia1);
		$cant1 = $arr[0];
		unset($arr[0]);
		$actividadDia1 = rtrim(implode(',', $arr), ',');
		$arr = explode(",", $actividadDia2);
		$cant2 = $arr[0];
		unset($arr[0]);
		$actividadDia2 = rtrim(implode(',', $arr), ',');
		$dia1 = explode(" ",$dia1);
		$dia2 = explode(" ",$dia2);
		$dia1 = date_create($dia1[0]);
		$dia2 = date_create($dia2[0]);
		$dia1 = date_format($dia1,"d-m-Y");
		$dia2 = date_format($dia2,"d-m-Y");
		$titulo = "Actividad";
		$subtitulo = "Actividades del día ".$dia1." y del día ".$dia2;
		$intervalo = 1 * 3600 * 1000;
		$serie1 = $dia1." (".$cant1.")";
		$serie2 = $dia2." (".$cant2.")";
		$actividad = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $serie1,
			'datos_principal' 			=> $actividadDia1,
			'datos_secundario_nombre' 	=> $serie2,
			'datos_secundario' 			=> $actividadDia2,
			'type'						=> 'horas',
			'intervalo' 					=> $intervalo,
			'fecha_inicio' 				=> null );
		return $actividad;
	}

	//calcula la actividad en el dia dado
	private function _actividadDia($dia){		
		$data = $this->CI->database->actividadDia($dia);
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

	//calcula la actividad realizada en el mes especifico
	private function _actividadDelMes($mes){
		$actividad = $this->_actividadMes($mes);
		$nombreMes = $this->_nombreMes($mes);
		$arr = explode(",", $actividad);
		$cant = $arr[0];
		unset($arr[0]);
		$actividad = rtrim(implode(',', $arr), ',');
		$titulo = "Actividad";
		$subtitulo = "Actividades del mes: ".$nombreMes;
		$intervalo = 24 * 3600 * 1000; //24 hrs de intervalo
		$fecha_inicio = preg_split("/[\s:-]+/",$mes);
		$fecha_inicio[1]=$fecha_inicio[1]-1;
		$fecha_inicio = rtrim(implode(',', $fecha_inicio), ','); //convierte arreglo a string separado por comas		
		$serie = $nombreMes." (".$cant.")";
		$actividad = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $serie,
			'datos_principal' 			=> $actividad,
			'datos_secundario_nombre' 	=> '',
			'datos_secundario' 			=> null,
			'type'						=> null,
			'intervalo' 				=> $intervalo,
			'fecha_inicio' 				=> $fecha_inicio );
		return $actividad;

	}

	//compara la actividad realizada en los meses dados
	private function _actividadComparacionMeses($mes1,$mes2){
		$actividadMes1 = $this->_actividadMes($mes1);
		$actividadMes2 = $this->_actividadMes($mes2);
		$arr = explode(",", $actividadMes1);
		$cant1 = $arr[0];
		unset($arr[0]);
		$actividadMes1 = rtrim(implode(',', $arr), ',');
		$arr = explode(",", $actividadMes2);
		$cant2 = $arr[0];
		unset($arr[0]);
		$actividadMes2 = rtrim(implode(',', $arr), ',');
		$ano1 = explode('-', $mes1);
		$ano1 = $ano1[0];
		$ano2 = explode('-', $mes2);
		$ano2 = $ano2[0];
		$nombreMes1 = $this->_nombreMes($mes1);
		$nombreMes2 = $this->_nombreMes($mes2);
		$titulo = "Actividad";
		$subtitulo = "Actividades del mes: ".$nombreMes1."-".$ano1." y del mes: ".$nombreMes2."-".$ano2;
		$serie1 = $nombreMes1."-".$ano1." (".$cant1.")";
		$serie2 = $nombreMes2."-".$ano2." (".$cant2.")";
		$actividad = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $serie1,
			'datos_principal' 			=> $actividadMes1,
			'datos_secundario_nombre' 	=> $serie2,
			'datos_secundario' 			=> $actividadMes2,
			'type'						=> 'dias',
			'intervalo' 				=> '',
			'fecha_inicio' 				=> null );
		return $actividad;

	}

	private function _actividadMes($mes){
		$data = $this->CI->database->actividadMes($mes);
		$datos = rtrim(implode(',', $data), ',');
		return $datos;
	}

	private function _actividadDelAno($ano){
		$nombreAno = explode("-",$ano);
		$nombreAno = $nombreAno[0];		
		$actividad = $this->_actividadAno($ano);		
		$arr = explode(",", $actividad);
		$cant = $arr[0];
		unset($arr[0]);
		$actividad = rtrim(implode(',', $arr), ',');
		$titulo = "Actividad";
		$subtitulo = "Actividades del año: ".$nombreAno;
		$serie = $nombreAno." (".$cant.")";
		$actividad = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $serie,
			'datos_principal' 			=> $actividad,
			'datos_secundario_nombre' 	=> '',
			'datos_secundario' 			=> null,
			'type'						=> 'meses',
			'intervalo' 				=> '',
			'fecha_inicio' 				=> null );
		return $actividad;
	}

	private function _actividadComparacionAnos($ano1,$ano2){
		
		$nombreAno1 = explode("-",$ano1);
		$nombreAno1 = $nombreAno1[0];		
		$nombreAno2 = explode("-",$ano2);
		$nombreAno2 = $nombreAno2[0];		
		$actividad1 = $this->_actividadAno($ano1);		
		$actividad2 = $this->_actividadAno($ano2);	
		$arr = explode(",", $actividad1);
		$cant1 = $arr[0];
		unset($arr[0]);
		$actividad1 = rtrim(implode(',', $arr), ',');
		$arr = explode(",", $actividad2);
		$cant2 = $arr[0];
		unset($arr[0]);
		$actividad2 = rtrim(implode(',', $arr), ',');	
		$titulo = "Actividad";
		$subtitulo = "Actividades del año: ".$nombreAno1." y del año: ".$nombreAno2;
		$serie1 = $nombreAno1." (".$cant1.")";
		$serie2 = $nombreAno2." (".$cant2.")";
		$actividad = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $serie1,
			'datos_principal' 			=> $actividad1,
			'datos_secundario_nombre' 	=> $serie2,
			'datos_secundario' 			=> $actividad2,
			'type'						=> 'meses',
			'intervalo' 				=> '',
			'fecha_inicio' 				=> null );
		return $actividad;
	}

	private function _actividadAno($ano){
		$data = $this->CI->database->actividadAno($ano);
		$datos = rtrim(implode(',', $data), ',');
		return $datos;
	}

	private function _nombreMes($fecha){
		$fecha = explode(" ",$fecha);
		$fecha = explode("-",$fecha[0]);
		$nombreMes;	
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
	private function _categoriasDelDia($dia){
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

	//metodo para llamar al calculo de las categorias relizadas el dia anterior 
	private function _categoriasDelDiaAnterior(){
		$categorias = $this->_categoriasDia($this->globales['yesterday']);
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
		$data = $this->CI->database->categoriasDia($dia);
		for($i=0;$i<count($data);$i++){
			$datos[$i] = "{ name: '".$data[$i]['nombre']." (".$data[$i]['cant'].")', y:".$data[$i]['porcentaje']."}";
			if (($i+1)!=count($data)){
				$datos[$i] = $datos[0].',';
			}			
		}
		return $datos;
	}

	//metodo para llamar al calculo de las categorias relizadas en un mes
	private function _categoriasDelMes($mes){
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
		$data = $this->CI->database->categoriasMes($mes);
		for($i=0;$i<count($data);$i++){
			$datos[$i] = "{ name: '".$data[$i]['nombre']." (".$data[$i]['cant'].")', y:".$data[$i]['porcentaje']."}";
			if (($i+1)!=count($data)){
				$datos[$i] = $datos[0].',';
			}			
		}
		return $datos;
	}

	//metodo para llamar al calculo de las categorias relizadas en un año
	private function _categoriasDelAno($ano){
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
		$data = $this->CI->database->categoriasAno($ano);
		for($i=0;$i<count($data);$i++){
			$datos[$i] = "{ name: '".$data[$i]['nombre']." (".$data[$i]['cant'].")', y:".$data[$i]['porcentaje']."}";
			if (($i+1)!=count($data)){
				$datos[$i] = $datos[0].',';
			}			
		}
		return $datos;
	}

	//metodo para llamar al calculo de las categorias relizadas en un periodo
	private function _categoriasDelPeriodo($fecha1,$fecha2){
		$categorias = $this->_categoriasPeriodo($fecha1,$fecha2);
		$fecha1 = explode(" ",$fecha1);
		$fecha2 = explode(" ",$fecha2);
		$fecha1 = date_create($fecha1[0]);
		$fecha2 = date_create($fecha2[0]);
		$fecha1 = date_format($fecha1,"d-m-Y");
		$fecha2 = date_format($fecha2,"d-m-Y");
		//$ano = explode("-", $ano);
		$titulo = "Flujos de Trabajo por categoría";
		$subtitulo = "Para el periodo del ".$fecha1." Al ".$fecha2;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'categorias' 				=> $categorias);
		return $data;
	}
	//calcula el porcentaje de las categorias realizadas en un periodo
	private function _categoriasPeriodo($fecha1,$fecha2){
		$datos = array();
		$data = $this->CI->database->categoriasPeriodo($fecha1,$fecha2);
		for($i=0;$i<count($data);$i++){
			$datos[$i] = "{ name: '".$data[$i]['nombre']." (".$data[$i]['cant'].")', y:".$data[$i]['porcentaje']."}";
			if (($i+1)!=count($data)){
				$datos[$i] = $datos[0].',';
			}			
		}
		return $datos;
	}

	//metodo para llamar al calculo de los indicadores en un dia 
	private function _indicadoresDelDia($fecha1,$fecha2){
		$rendimiento = $this->_rendimiento($fecha1,$fecha2);	
		$eficacia = $this->_eficacia($fecha1,$fecha2);	
		$respuesta = $this->_respuesta($fecha1,$fecha2);	
		$fecha1 = explode(" ",$fecha1);
		$fecha1 = date_create($fecha1[0]);
		$fecha1 = date_format($fecha1,"d-m-Y");
		$fecha2 = explode(" ",$fecha2);
		$fecha2 = date_create($fecha2[0]);
		$fecha2 = date_format($fecha2,"d-m-Y");
		$titulo = "Indicadores";
		$subtitulo = "Del día ".$fecha1;		
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'rendimiento' 				=> $rendimiento,
			'eficacia' 					=> $eficacia,
			'respuesta' 				=> $respuesta);
		return $data;
	}

	//metodo para llamar al calculo de los indicadores en un mes
	private function _indicadoresDelMes($fecha_inicial){
		$fecha_final = strtotime ('+1 month',strtotime($fecha_inicial));	
		$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
		$rendimiento = $this->_rendimiento($fecha_inicial,$fecha_final);	
		$eficacia = $this->_eficacia($fecha_inicial,$fecha_final);	
		$respuesta = $this->_respuesta($fecha_inicial,$fecha_final);	
		$nombreMes = $this->_nombreMes($fecha_inicial);
		$titulo = "Indicadores";
		$subtitulo = "Del mes ".$nombreMes;		
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'rendimiento' 				=> $rendimiento,
			'eficacia' 					=> $eficacia,
			'respuesta' 				=> $respuesta);
		return $data;
	}

	//metodo para llamar al calculo de los indicadores en un ano
	private function _indicadoresDelAno($fecha_inicial){
		$fecha_final = strtotime ('+12 month',strtotime($fecha_inicial));	
		$fecha_final = date('Y-m-d H:i:s' ,$fecha_final);
		$rendimiento = $this->_rendimiento($fecha_inicial,$fecha_final);	
		$eficacia = $this->_eficacia($fecha_inicial,$fecha_final);	
		$respuesta = $this->_respuesta($fecha_inicial,$fecha_final);	
		$nombreAno = explode("-",$fecha_inicial);
		$nombreAno = $nombreAno[0];		
		$titulo = "Indicadores";
		$subtitulo = "Del año ".$nombreAno;		
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'rendimiento' 				=> $rendimiento,
			'eficacia' 					=> $eficacia,
			'respuesta' 				=> $respuesta);
		return $data;
	}

	//metodo para llamar al calculo de los indicadores en un periodo
	private function _indicadoresDelPeriodo($fecha_inicial,$fecha_final){
		$rendimiento = $this->_rendimiento($fecha_inicial,$fecha_final);	
		$eficacia = $this->_eficacia($fecha_inicial,$fecha_final);	
		$respuesta = $this->_respuesta($fecha_inicial,$fecha_final);	
		$fecha_inicial = explode(" ",$fecha_inicial);
		$fecha_final = explode(" ",$fecha_final);
		$fecha_inicial = date_create($fecha_inicial[0]);
		$fecha_final = date_create($fecha_final[0]);
		$fecha_inicial = date_format($fecha_inicial,"d-m-Y");
		$fecha_final = date_format($fecha_final,"d-m-Y");
		$titulo = "Indicadores";
		$subtitulo = "Para el periodo del ".$fecha_inicial." Al ".$fecha_final;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'rendimiento' 				=> $rendimiento,
			'eficacia' 					=> $eficacia,
			'respuesta' 				=> $respuesta);
		return $data;
	}

	//calcula el porcentaje del rendimiento en un periodo
	private function _rendimiento($fecha1,$fecha2){
		$datos = array();
		$data = $this->CI->database->rendimiento($fecha1,$fecha2);
		if ($data['cant_total_procesos']!=0)
			$datos = round((($data['cant_total_realizados']+$data['cant_total_instancias'])*100)/$data['cant_total_procesos']);
		else
			$datos = 0;
		return $datos;
	}

	//calcula el porcentaje de la eficacia en un periodo
	private function _eficacia($fecha1,$fecha2){
		$datos = array();
		$data = $this->CI->database->eficacia($fecha1,$fecha2);	
		if ($data['cant_total_procesos']!=0)	
			$datos = round(($data['cant_total_sinproblemas']*100)/$data['cant_total_procesos']);
		else
			$datos = 0;
		return $datos;
	}

	//calcula el porcentaje de la respuesta en un periodo
	private function _respuesta($fecha1,$fecha2){
		$datos = array();
		$data = $this->CI->database->respuesta($fecha1,$fecha2);				
		if ($data['cant_total_instancias']!=0)	
			$datos = round(($data['cant_total_finalizas']*100)/$data['cant_total_instancias']);
		else
			$datos = 0;
		return $datos;
	}

	//calcula el crecimiento comparando los dias
	private function _crecimientoDelDia($tipo,$dia1,$dia2){
		$tipo_msj='';
		$crecimiento = $this->_crecimiento($tipo,$dia1,$dia1,$dia2,$dia2);	
		$dia1 = explode(' ',$dia1);
		$dia1 = date_create($dia1[0]);
		$dia1 = date_format($dia1,"d-m-Y");
		$dia2 = explode(' ',$dia2);
		$dia2 = date_create($dia2[0]);
		$dia2 = date_format($dia2,"d-m-Y");
		if ($tipo==1){
			$tipo_msj = 'De Flujos de trabajo';
		}
		else{
			$tipo_msj = 'De Transiciones';	
		}
		$titulo = "Crecimiento";
		$subtitulo = $tipo_msj." del ".$dia2." respecto al ".$dia1;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'crecimiento' 				=> $crecimiento);
		return $data;
	}

	//calcula el crecimiento comparando los meses
	private function _crecimientoDelMes($tipo,$fecha1,$fecha2,$fecha3,$fecha4){
		$tipo_msj='';
		$crecimiento = $this->_crecimiento($tipo,$fecha1,$fecha2,$fecha3,$fecha4);	
		$mes1 = $this->_nombreMes($fecha1);
		$mes2 = $this->_nombreMes($fecha3);
		if ($tipo==1){
			$tipo_msj = 'De Flujos de trabajo';
		}
		else{
			$tipo_msj = 'De Transiciones';	
		}
		$titulo = "Crecimiento";
		$subtitulo = $tipo_msj." del mes ".$mes2." respecto al mes ".$mes1;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'crecimiento' 				=> $crecimiento);
		return $data;
	}

	//calcula el crecimiento comparando los años
	private function _crecimientoDelAno($tipo,$fecha1,$fecha2,$fecha3,$fecha4){
		$tipo_msj='';
		$crecimiento = $this->_crecimiento($tipo,$fecha1,$fecha2,$fecha3,$fecha4);	
		$ano1 = explode('-', $fecha1);
		$ano2 = explode('-', $fecha3);
		if ($tipo==1){
			$tipo_msj = 'De Flujos de trabajo';
		}
		else{
			$tipo_msj = 'De Transiciones';	
		}
		$titulo = "Crecimiento";
		$subtitulo = $tipo_msj." del año ".$ano2[0]." respecto al año ".$ano1[0];
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'crecimiento' 				=> $crecimiento);
		return $data;
	}

	//calcula el crecimiento comparando los periodos
	private function _crecimientoDelPeriodo($tipo,$fecha1,$fecha2,$fecha3,$fecha4){
		$tipo_msj='';
		$crecimiento = $this->_crecimiento($tipo,$fecha1,$fecha2,$fecha3,$fecha4);	
		$fecha1 = explode(" ",$fecha1);
		$fecha2 = explode(" ",$fecha2);
		$fecha1 = date_create($fecha1[0]);
		$fecha2 = date_create($fecha2[0]);
		$fecha1 = date_format($fecha1,"d/m/Y");
		$fecha2 = date_format($fecha2,"d/m/Y");
		$fecha3 = explode(" ",$fecha3);
		$fecha4 = explode(" ",$fecha4);
		$fecha3 = date_create($fecha3[0]);
		$fecha4 = date_create($fecha4[0]);
		$fecha3 = date_format($fecha3,"d/m/Y");
		$fecha4 = date_format($fecha4,"d/m/Y");
		if ($tipo==1){
			$tipo_msj = 'De Flujos de trabajo';
		}
		else{
			$tipo_msj = 'De Transiciones';
		}
		$titulo = "Crecimiento";
		$subtitulo = $tipo_msj." del periodo ".$fecha3." - ".$fecha4." respecto al periodo ".$fecha1." - ".$fecha2;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'crecimiento' 				=> $crecimiento);
		return $data;
	}

	//calcula el porcentaje del crecimiento en un periodo
	private function _crecimiento($tipo,$fecha1,$fecha2,$fecha3,$fecha4){
		$datos = 0;
		$data = $this->CI->database->crecimiento($tipo,$fecha1,$fecha2,$fecha3,$fecha4);				
		if ($data['cant_total_1']>0){
			$porcentaje = round(($data['cant_total_2']*100)/$data['cant_total_1']);
			if ($data['cant_total_1']>$data['cant_total_2']){
				$datos = 100-$porcentaje;
				$datos = $datos*(-1); 				
			}else{
				$datos = $porcentaje-100;
			}
		}
		else if (($data['cant_total_1']==0)&&($data['cant_total_2']>0)){
			$datos = $data['cant_total_2']*100;
		}
		return $datos;
	}

	//calcula el tiempo promedio en el mes
	private function _tiempoPromedioDelMes($tipo,$fecha1,$fecha2){
		$tipo_msj='';
		$promedio = $this->_tiempoPromedio($tipo,$fecha1,$fecha2);	
		$nombreMes = $this->_nombreMes($fecha1);
		if ($tipo==1){
			$tipo_msj = 'De Flujos de trabajo';
		}
		else{
			$tipo_msj = 'De Transiciones';
		}
		$titulo = "Tiempo Promedio";
		$subtitulo = $tipo_msj." del mes ".$nombreMes;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'dias' 						=> $promedio['dias'],
			'horas' 					=> $promedio['horas'],
			'minutos' 					=> $promedio['minutos'],
			'segundos' 					=> $promedio['segundos']);
		return $data;
	}

	//calcula el tiempo promedio en el ano
	private function _tiempoPromedioDelAno($tipo,$fecha1,$fecha2){
		$tipo_msj='';
		$promedio = $this->_tiempoPromedio($tipo,$fecha1,$fecha2);	
		$ano = explode("-", $fecha1);
		if ($tipo==1){
			$tipo_msj = 'De Flujos de trabajo';
		}
		else{
			$tipo_msj = 'De Transiciones';
		}
		$titulo = "Tiempo Promedio";
		$subtitulo = $tipo_msj." del año ".$ano[0];
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'dias' 						=> $promedio['dias'],
			'horas' 					=> $promedio['horas'],
			'minutos' 					=> $promedio['minutos'],
			'segundos' 					=> $promedio['segundos']);
		return $data;
	}

	//calcula el tiempo promedio en el periodo
	private function _tiempoPromedioDelPeriodo($tipo,$fecha1,$fecha2){
		$tipo_msj='';
		$promedio = $this->_tiempoPromedio($tipo,$fecha1,$fecha2);	
		$fecha1 = explode(" ",$fecha1);
		$fecha2 = explode(" ",$fecha2);
		$fecha1 = date_create($fecha1[0]);
		$fecha2 = date_create($fecha2[0]);
		$fecha1 = date_format($fecha1,"d-m-Y");
		$fecha2 = date_format($fecha2,"d-m-Y");
		if ($tipo==1){
			$tipo_msj = 'De Flujos de trabajo';
		}
		else{
			$tipo_msj = 'De Transiciones';
		}
		$titulo = "Tiempo Promedio";
		$subtitulo = $tipo_msj." en el periodo del ".$fecha1." al ".$fecha2;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'dias' 						=> $promedio['dias'],
			'horas' 					=> $promedio['horas'],
			'minutos' 					=> $promedio['minutos'],
			'segundos' 					=> $promedio['segundos']);
		return $data;
	}


	//calcula el porcentaje del crecimiento en un periodo
	private function _tiempoPromedio($tipo,$fecha1,$fecha2){
		$datos = array();
		$data = $this->CI->database->tiempoPromedio($tipo,$fecha1,$fecha2);	
		$data = explode(',',$data);
		$datos['dias'] = $data[0];
		$datos['horas'] = $data[1];
		$datos['minutos'] = $data[2];
		$datos['segundos'] = $data[3];
		return $datos;
	}

	//calcula actividad de un usuario en dia especifico
	private function _actividadUsuarioDelDia($tipo,$usuario,$dia){
		$tipo_msj = '';
		$actividad = $this->_actividadUsuarioDia($tipo,$usuario,$dia);	
		$arr = explode(",", $actividad);
		$cant = $arr[0];
		unset($arr[0]);
		$actividad = rtrim(implode(',', $arr), ',');
		$dia = explode(" ",$dia);
		$dia = date_create($dia[0]);
		$dia = date_format($dia,"d-m-Y");
		$titulo = "Actividad de Usuarios";
		if ($tipo==1){
			$tipo_msj = 'Flujos de trabajo';			
		}
		else{
			$tipo_msj = 'Transiciones';
		}
		$subtitulo = $tipo_msj." del día ".$dia." del usuario ".$usuario;
		$serie = $usuario." (".$cant.")";
		$leyenda = "Número de ".$tipo_msj;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $serie,
			'datos_principal' 			=> $actividad,
			'datos_secundario_nombre' 	=> '',
			'datos_secundario' 			=> null,
			'actividades'				=> null,
			'actividades_nombre'		=> null,
			'leyenda' 					=> $leyenda,
			'type' 						=> 'horas');
		return $data;
	}

	//calcula actividad de 2 usuarios en dia especifico
	private function _actividadUsuarioDelDiaComparativo($tipo,$usuario1,$usuario2,$dia){
		$tipo_msj = '';
		$actividad1 = $this->_actividadUsuarioDia($tipo,$usuario1,$dia);	
		$actividad2 = $this->_actividadUsuarioDia($tipo,$usuario2,$dia);	
		$arr = explode(",", $actividad1);
		$cant1 = $arr[0];
		unset($arr[0]);
		$actividad1 = rtrim(implode(',', $arr), ',');
		$arr = explode(",", $actividad2);
		$cant2 = $arr[0];
		unset($arr[0]);
		$actividad2 = rtrim(implode(',', $arr), ',');
		$dia = explode(" ",$dia);
		$dia = date_create($dia[0]);
		$dia = date_format($dia,"d-m-Y");
		$titulo = "Actividad de Usuarios";
		if ($tipo==1){
			$tipo_msj = 'Flujos de trabajo';			
		}
		else{
			$tipo_msj = 'Transiciones';
		}
		$subtitulo = $tipo_msj." del día ".$dia." del usuario ".$usuario1." y el usuario ".$usuario2;
		$serie1 = $usuario1." (".$cant1.")";
		$serie2 = $usuario2." (".$cant2.")";
		$leyenda = "Número de ".$tipo_msj;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $serie1,
			'datos_principal' 			=> $actividad1,
			'datos_secundario_nombre' 	=> $serie2,
			'datos_secundario' 			=> $actividad2,
			'actividades'				=> null,
			'actividades_nombre'		=> null,
			'leyenda' 					=> $leyenda,
			'type' 						=> 'horas');
		return $data;
	}

	//calcula actividad de tipo de usuario en dia especifico
	private function _actividadUsuarioDelDiaGrupo($tipo,$tipo_usuario,$dia){
		$actividad = array();
		$cant = array();
		$serie = array();
		$usuarios = $this->CI->database->usuariosTodos($tipo_usuario);
		for ($i=0; $i < count($usuarios); $i++) { 
			$actividad[$i] = $this->_actividadUsuarioDia($tipo,$usuarios[$i]['id_usuario'],$dia);	
			$arr = explode(",", $actividad[$i]);
			$cant[$i] = $arr[0];
			unset($arr[0]);
			$actividad[$i] = rtrim(implode(',', $arr), ',');
			$serie[$i] = $usuarios[$i]['id_usuario']." (".$cant[$i].")";
		}
		$tipo_msj = '';
		$nombre_tipo_usuario = $this->CI->database->nombreTipoUsuario($tipo_usuario);	
		$dia = explode(" ",$dia);
		$dia = date_create($dia[0]);
		$dia = date_format($dia,"d-m-Y");
		$titulo = "Actividad de Usuarios";
		if ($tipo==1){
			$tipo_msj = 'Flujos de trabajo';			
		}
		else{
			$tipo_msj = 'Transiciones';
		}
		$subtitulo = $tipo_msj." del día ".$dia." del tipo de usuario ".$nombre_tipo_usuario;
		$leyenda = "Número de ".$tipo_msj;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> null,
			'datos_principal' 			=> null,
			'datos_secundario_nombre' 	=> null,
			'datos_secundario' 			=> null,
			'actividades'				=> $actividad,
			'actividades_nombre'		=> $serie,
			'leyenda' 					=> $leyenda,
			'type' 						=> 'horas');
		return $data;
	}

	//calcula actividad de todos los usuarios en dia especifico
	private function _actividadUsuarioDelDiaTodos($tipo,$dia){
		$actividad = array();
		$cant = array();
		$serie = array();
		$usuarios = $this->CI->database->usuariosTodos();
		for ($i=0; $i < count($usuarios); $i++) { 
			$actividad[$i] = $this->_actividadUsuarioDia($tipo,$usuarios[$i]['id_usuario'],$dia);	
			$arr = explode(",", $actividad[$i]);
			$cant[$i] = $arr[0];
			unset($arr[0]);
			$actividad[$i] = rtrim(implode(',', $arr), ',');
			$serie[$i] = $usuarios[$i]['id_usuario']." (".$cant[$i].")";
		}
		$tipo_msj = '';
		$dia = explode(" ",$dia);
		$dia = date_create($dia[0]);
		$dia = date_format($dia,"d-m-Y");
		$titulo = "Actividad de Usuarios";
		if ($tipo==1){
			$tipo_msj = 'Flujos de trabajo';			
		}
		else{
			$tipo_msj = 'Transiciones';
		}
		$subtitulo = $tipo_msj." del día ".$dia." de todos los usuarios";
		$leyenda = "Número de ".$tipo_msj;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> null,
			'datos_principal' 			=> null,
			'datos_secundario_nombre' 	=> null,
			'datos_secundario' 			=> null,
			'actividades'				=> $actividad,
			'actividades_nombre'		=> $serie,
			'leyenda' 					=> $leyenda,
			'type' 						=> 'horas');
		return $data;
	}

	//calcula la actividad de un usuario en el mes
	private function _actividadUsuarioDia($tipo,$usuario,$dia){
		$data = $this->CI->database->actividadUsuarioDia($tipo,$usuario,$dia);	
		$datos = rtrim(implode(',', $data), ',');
		return $datos;
	}

	//calcula actividad de un usuario en mes especifico
	private function _actividadUsuarioDelMes($tipo,$usuario,$mes){
		$tipo_msj = '';
		$actividad = $this->_actividadUsuarioMes($tipo,$usuario,$mes);	
		$arr = explode(",", $actividad);
		$cant = $arr[0];
		unset($arr[0]);
		$actividad = rtrim(implode(',', $arr), ',');		
		$titulo = "Actividad de Usuarios";
		if ($tipo==1){
			$tipo_msj = 'Flujos de trabajo';			
		}
		else{
			$tipo_msj = 'Transiciones';
		}
		$nombreMes = $this->_nombreMes($mes);
		$subtitulo = $tipo_msj." del mes ".$nombreMes." del usuario ".$usuario;
		$serie = $usuario." (".$cant.")";
		$leyenda = "Número de ".$tipo_msj;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $serie,
			'datos_principal' 			=> $actividad,
			'datos_secundario_nombre' 	=> '',
			'datos_secundario' 			=> null,
			'actividades'				=> null,
			'actividades_nombre'		=> null,
			'leyenda' 					=> $leyenda,
			'type' 						=> 'dias');
		return $data;
	}

	//calcula actividad de 2 usuarios en mes especifico
	private function _actividadUsuarioDelMesComparativo($tipo,$usuario1,$usuario2,$mes){
		$tipo_msj = '';
		$actividad1 = $this->_actividadUsuarioMes($tipo,$usuario1,$mes);	
		$actividad2 = $this->_actividadUsuarioMes($tipo,$usuario2,$mes);	
		$arr = explode(",", $actividad1);
		$cant1 = $arr[0];
		unset($arr[0]);
		$actividad1 = rtrim(implode(',', $arr), ',');
		$arr = explode(",", $actividad2);
		$cant2 = $arr[0];
		unset($arr[0]);
		$actividad2 = rtrim(implode(',', $arr), ',');
		$titulo = "Actividad de Usuarios";
		if ($tipo==1){
			$tipo_msj = 'Flujos de trabajo';			
		}
		else{
			$tipo_msj = 'Transiciones';
		}
		$nombreMes = $this->_nombreMes($mes);
		$subtitulo = $tipo_msj." del mes ".$nombreMes." del usuario ".$usuario1." y el usuario ".$usuario2;
		$serie1 = $usuario1." (".$cant1.")";
		$serie2 = $usuario2." (".$cant2.")";
		$leyenda = "Número de ".$tipo_msj;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $serie1,
			'datos_principal' 			=> $actividad1,
			'datos_secundario_nombre' 	=> $serie2,
			'datos_secundario' 			=> $actividad2,
			'actividades'				=> null,
			'actividades_nombre'		=> null,
			'leyenda' 					=> $leyenda,
			'type' 						=> 'dias');
		return $data;
	}

	//calcula actividad de tipo de usuario en mes especifico
	private function _actividadUsuarioDelMesGrupo($tipo,$tipo_usuario,$mes){
		$actividad = array();
		$cant = array();
		$serie = array();
		$usuarios = $this->CI->database->usuariosTodos($tipo_usuario);
		for ($i=0; $i < count($usuarios); $i++) { 
			$actividad[$i] = $this->_actividadUsuarioMes($tipo,$usuarios[$i]['id_usuario'],$mes);	
			$arr = explode(",", $actividad[$i]);
			$cant[$i] = $arr[0];
			unset($arr[0]);
			$actividad[$i] = rtrim(implode(',', $arr), ',');
			$serie[$i] = $usuarios[$i]['id_usuario']." (".$cant[$i].")";
		}
		$tipo_msj = '';
		$nombre_tipo_usuario = $this->CI->database->nombreTipoUsuario($tipo_usuario);	
		$nombreMes = $this->_nombreMes($mes);
		$titulo = "Actividad de Usuarios";
		if ($tipo==1){
			$tipo_msj = 'Flujos de trabajo';			
		}
		else{
			$tipo_msj = 'Transiciones';
		}
		$subtitulo = $tipo_msj." del mes ".$nombreMes." del tipo de usuario ".$nombre_tipo_usuario;
		$leyenda = "Número de ".$tipo_msj;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> null,
			'datos_principal' 			=> null,
			'datos_secundario_nombre' 	=> null,
			'datos_secundario' 			=> null,
			'actividades'				=> $actividad,
			'actividades_nombre'		=> $serie,
			'leyenda' 					=> $leyenda,
			'type' 						=> 'dias');
		return $data;
	}

	//calcula actividad de todos los usuarios en mes especifico
	private function _actividadUsuarioDelMesTodos($tipo,$mes){
		$actividad = array();
		$cant = array();
		$serie = array();
		$usuarios = $this->CI->database->usuariosTodos();
		for ($i=0; $i < count($usuarios); $i++) { 
			$actividad[$i] = $this->_actividadUsuarioMes($tipo,$usuarios[$i]['id_usuario'],$mes);	
			$arr = explode(",", $actividad[$i]);
			$cant[$i] = $arr[0];
			unset($arr[0]);
			$actividad[$i] = rtrim(implode(',', $arr), ',');
			$serie[$i] = $usuarios[$i]['id_usuario']." (".$cant[$i].")";
		}
		$tipo_msj = '';
		$nombreMes = $this->_nombreMes($mes);
		$titulo = "Actividad de Usuarios";
		if ($tipo==1){
			$tipo_msj = 'Flujos de trabajo';			
		}
		else{
			$tipo_msj = 'Transiciones';
		}
		$subtitulo = $tipo_msj." del mes ".$nombreMes." de todos los usuarios";
		$leyenda = "Número de ".$tipo_msj;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> null,
			'datos_principal' 			=> null,
			'datos_secundario_nombre' 	=> null,
			'datos_secundario' 			=> null,
			'actividades'				=> $actividad,
			'actividades_nombre'		=> $serie,
			'leyenda' 					=> $leyenda,
			'type' 						=> 'dias');
		return $data;
	}

	//calcula la actividad de un usuario en el mes
	private function _actividadUsuarioMes($tipo,$usuario,$mes){
		$data = $this->CI->database->actividadUsuarioMes($tipo,$usuario,$mes);	
		$datos = rtrim(implode(',', $data), ',');
		return $datos;
	}

	//calcula actividad de un usuario en año especifico
	private function _actividadUsuarioDelAno($tipo,$usuario,$ano){
		$tipo_msj = '';
		$actividad = $this->_actividadUsuarioAno($tipo,$usuario,$ano);	
		$arr = explode(",", $actividad);
		$cant = $arr[0];
		unset($arr[0]);
		$actividad = rtrim(implode(',', $arr), ',');		
		$titulo = "Actividad de Usuarios";
		if ($tipo==1){
			$tipo_msj = 'Flujos de trabajo';			
		}
		else{
			$tipo_msj = 'Transiciones';
		}
		$nombreAno = explode("-",$ano);
		$nombreAno = $nombreAno[0];		
		$subtitulo = $tipo_msj." del año ".$nombreAno." del usuario ".$usuario;
		$serie = $usuario." (".$cant.")";
		$leyenda = "Número de ".$tipo_msj;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $serie,
			'datos_principal' 			=> $actividad,
			'datos_secundario_nombre' 	=> '',
			'datos_secundario' 			=> null,
			'actividades'				=> null,
			'actividades_nombre'		=> null,
			'leyenda' 					=> $leyenda,
			'type' 						=> 'meses');
		return $data;
	}

	//calcula actividad de 2 usuarios en mes especifico
	private function _actividadUsuarioDelAnoComparativo($tipo,$usuario1,$usuario2,$ano){
		$tipo_msj = '';
		$actividad1 = $this->_actividadUsuarioAno($tipo,$usuario1,$ano);	
		$actividad2 = $this->_actividadUsuarioAno($tipo,$usuario2,$ano);	
		$arr = explode(",", $actividad1);
		$cant1 = $arr[0];
		unset($arr[0]);
		$actividad1 = rtrim(implode(',', $arr), ',');
		$arr = explode(",", $actividad2);
		$cant2 = $arr[0];
		unset($arr[0]);
		$actividad2 = rtrim(implode(',', $arr), ',');
		$titulo = "Actividad de Usuarios";
		if ($tipo==1){
			$tipo_msj = 'Flujos de trabajo';			
		}
		else{
			$tipo_msj = 'Transiciones';
		}
		$nombreAno = explode("-",$ano);
		$nombreAno = $nombreAno[0];	
		$subtitulo = $tipo_msj." del año ".$nombreAno." del usuario ".$usuario1." y el usuario ".$usuario2;
		$serie1 = $usuario1." (".$cant1.")";
		$serie2 = $usuario2." (".$cant2.")";
		$leyenda = "Número de ".$tipo_msj;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> $serie1,
			'datos_principal' 			=> $actividad1,
			'datos_secundario_nombre' 	=> $serie2,
			'datos_secundario' 			=> $actividad2,
			'actividades'				=> null,
			'actividades_nombre'		=> null,
			'leyenda' 					=> $leyenda,
			'type' 						=> 'dias');
		return $data;
	}

	//calcula actividad de tipo de usuario en año especifico
	private function _actividadUsuarioDelAnoGrupo($tipo,$tipo_usuario,$ano){
		$actividad = array();
		$cant = array();
		$serie = array();
		$usuarios = $this->CI->database->usuariosTodos($tipo_usuario);
		for ($i=0; $i < count($usuarios); $i++) { 
			$actividad[$i] = $this->_actividadUsuarioAno($tipo,$usuarios[$i]['id_usuario'],$ano);	
			$arr = explode(",", $actividad[$i]);
			$cant[$i] = $arr[0];
			unset($arr[0]);
			$actividad[$i] = rtrim(implode(',', $arr), ',');
			$serie[$i] = $usuarios[$i]['id_usuario']." (".$cant[$i].")";
		}
		$tipo_msj = '';
		$nombre_tipo_usuario = $this->CI->database->nombreTipoUsuario($tipo_usuario);	
		$nombreAno = explode("-",$ano);
		$nombreAno = $nombreAno[0];	
		$titulo = "Actividad de Usuarios";
		if ($tipo==1){
			$tipo_msj = 'Flujos de trabajo';			
		}
		else{
			$tipo_msj = 'Transiciones';
		}
		$subtitulo = $tipo_msj." del año ".$nombreAno." del tipo de usuario ".$nombre_tipo_usuario;
		$leyenda = "Número de ".$tipo_msj;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> null,
			'datos_principal' 			=> null,
			'datos_secundario_nombre' 	=> null,
			'datos_secundario' 			=> null,
			'actividades'				=> $actividad,
			'actividades_nombre'		=> $serie,
			'leyenda' 					=> $leyenda,
			'type' 						=> 'dias');
		return $data;
	}

	//calcula actividad de todos los usuarios en año especifico
	private function _actividadUsuarioDelAnoTodos($tipo,$ano){
		$actividad = array();
		$cant = array();
		$serie = array();
		$usuarios = $this->CI->database->usuariosTodos();
		for ($i=0; $i < count($usuarios); $i++) { 
			$actividad[$i] = $this->_actividadUsuarioAno($tipo,$usuarios[$i]['id_usuario'],$ano);	
			$arr = explode(",", $actividad[$i]);
			$cant[$i] = $arr[0];
			unset($arr[0]);
			$actividad[$i] = rtrim(implode(',', $arr), ',');
			$serie[$i] = $usuarios[$i]['id_usuario']." (".$cant[$i].")";
		}
		$tipo_msj = '';
		$nombreAno = explode("-",$ano);
		$nombreAno = $nombreAno[0];	
		$titulo = "Actividad de Usuarios";
		if ($tipo==1){
			$tipo_msj = 'Flujos de trabajo';			
		}
		else{
			$tipo_msj = 'Transiciones';
		}
		$subtitulo = $tipo_msj." del año ".$nombreAno." de todos los usuarios";
		$leyenda = "Número de ".$tipo_msj;
		$data = array(
			'titulo' 					=> $titulo,
			'subtitulo' 				=> $subtitulo,
			'datos_principal_nombre' 	=> null,
			'datos_principal' 			=> null,
			'datos_secundario_nombre' 	=> null,
			'datos_secundario' 			=> null,
			'actividades'				=> $actividad,
			'actividades_nombre'		=> $serie,
			'leyenda' 					=> $leyenda,
			'type' 						=> 'dias');
		return $data;
	}

	//calcula la actividad de un usuario en el año
	private function _actividadUsuarioAno($tipo,$usuario,$ano){
		$data = $this->CI->database->actividadUsuarioAno($tipo,$usuario,$ano);
		$datos = rtrim(implode(',', $data), ',');
		return $datos;
	}

	//recibe los datos del tiempo y forma el string dias, horas, minutos, segundos
	private function _stringPeriodo($tiempo){
		$tiempo = explode(',',$tiempo);
		$datos['dias'] = $tiempo[0];
		$datos['horas'] = $tiempo[1];
		$datos['minutos'] = $tiempo[2];
		$datos['segundos'] = $tiempo[3];
		$data = $tiempo[0].' días '.$tiempo[1].' horas '.$tiempo[2].' minutos '.$tiempo[3].' segundos';
		return $data;
	}

	//calcula el resumen de los workflows y los procesos en el dia
	private function _resumenDelDia($dia){
		$workflow_resumen = $this->CI->database->workflowResumen($dia,$dia);
		$proceso_resumen = $this->CI->database->procesoResumen($dia,$dia);
		$resumen_workflow_mas_realizado = 'No existen datos';
		$resumen_workflow_menos_realizado = 'No existen datos';
		$resumen_workflow_mas_rapido = 'No existen datos';
		$resumen_workflow_mas_lento = 'No existen datos';
		$resumen_workflow_cant = 'No existen datos';
		$resumen_proceso_mas_realizado = 'No existen datos';
		$resumen_proceso_menos_realizado = 'No existen datos';
		$resumen_proceso_mas_rapido = 'No existen datos';
		$resumen_proceso_mas_lento = 'No existen datos';
		$resumen_proceso_cant = 'No existen datos';
		//instancias
		if (isset($workflow_resumen['mas_realizado'])){
			$resumen_workflow_mas_realizado = $workflow_resumen['mas_realizado']['nombre'].' ('.$workflow_resumen['mas_realizado']['cant'].')';	
		}
		if (isset($workflow_resumen['menos_realizado'])){
			$resumen_workflow_menos_realizado = $workflow_resumen['menos_realizado']['nombre'].' ('.$workflow_resumen['menos_realizado']['cant'].')';		
		}
		if (isset($workflow_resumen['mas_rapido'])){
			$resumen_workflow_mas_rapido = $workflow_resumen['mas_rapido']['nombre'].' ('.$this->_stringPeriodo($workflow_resumen['mas_rapido']['time']).')';
		}
		if (isset($workflow_resumen['mas_lento'])){
			$resumen_workflow_mas_lento = $workflow_resumen['mas_lento']['nombre'].' ('.$this->_stringPeriodo($workflow_resumen['mas_lento']['time']).')';
		}
		if (isset($workflow_resumen['total'])){
			$resumen_workflow_cant = $workflow_resumen['total']['cant'];
		}
		//procesos
		if (isset($proceso_resumen['mas_realizado'])){
			$resumen_proceso_mas_realizado = $proceso_resumen['mas_realizado']['nombre'].' ('.$proceso_resumen['mas_realizado']['cant'].')';
		}
		if (isset($proceso_resumen['menos_realizado'])){
			$resumen_proceso_menos_realizado = $proceso_resumen['menos_realizado']['nombre'].' ('.$proceso_resumen['menos_realizado']['cant'].')';		
		}
		if (isset($proceso_resumen['mas_rapido'])){
			$resumen_proceso_mas_rapido = $proceso_resumen['mas_rapido']['nombre'].' ('.$this->_stringPeriodo($proceso_resumen['mas_rapido']['time']).')';
		}
		if (isset($proceso_resumen['mas_lento'])){
			$resumen_proceso_mas_lento = $proceso_resumen['mas_lento']['nombre'].' ('.$this->_stringPeriodo($proceso_resumen['mas_lento']['time']).')';
		}
		if (isset($proceso_resumen['total'])){
			$resumen_proceso_cant = $proceso_resumen['total']['cant'];
		}
		$dia = explode(" ",$dia);
		$dia = date_create($dia[0]);
		$dia = date_format($dia,"d-m-Y");
		$titulo = "Resumen";
		$subtitulo = "Para el día ".$dia;
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'resumen_workflow_mas_realizado' 		=> $resumen_workflow_mas_realizado,
			'resumen_workflow_menos_realizado' 		=> $resumen_workflow_menos_realizado,
			'resumen_workflow_mas_rapido' 			=> $resumen_workflow_mas_rapido,
			'resumen_workflow_mas_lento' 			=> $resumen_workflow_mas_lento,
			'resumen_workflow_cant' 				=> $resumen_workflow_cant,
			'resumen_proceso_mas_realizado' 		=> $resumen_proceso_mas_realizado,
			'resumen_proceso_menos_realizado' 		=> $resumen_proceso_menos_realizado,
			'resumen_proceso_mas_rapido' 			=> $resumen_proceso_mas_rapido,
			'resumen_proceso_mas_lento' 			=> $resumen_proceso_mas_lento,
			'resumen_proceso_cant' 					=> $resumen_proceso_cant);
		return $data;
	}

	//calcula el resumen de los workflows y los procesos en el mes
	private function _resumenDelMes($fecha_inicial,$fecha_final){
		$workflow_resumen = $this->CI->database->workflowResumen($fecha_inicial,$fecha_final);
		$proceso_resumen = $this->CI->database->procesoResumen($fecha_inicial,$fecha_final);
		$resumen_workflow_mas_realizado = 'No existen datos';
		$resumen_workflow_menos_realizado = 'No existen datos';
		$resumen_workflow_mas_rapido = 'No existen datos';
		$resumen_workflow_mas_lento = 'No existen datos';
		$resumen_workflow_cant = 'No existen datos';
		$resumen_proceso_mas_realizado = 'No existen datos';
		$resumen_proceso_menos_realizado = 'No existen datos';
		$resumen_proceso_mas_rapido = 'No existen datos';
		$resumen_proceso_mas_lento = 'No existen datos';
		$resumen_proceso_cant = 'No existen datos';
		//instancias
		if (isset($workflow_resumen['mas_realizado'])){
			$resumen_workflow_mas_realizado = $workflow_resumen['mas_realizado']['nombre'].' ('.$workflow_resumen['mas_realizado']['cant'].')';	
		}
		if (isset($workflow_resumen['menos_realizado'])){
			$resumen_workflow_menos_realizado = $workflow_resumen['menos_realizado']['nombre'].' ('.$workflow_resumen['menos_realizado']['cant'].')';		
		}
		if (isset($workflow_resumen['mas_rapido'])){
			$resumen_workflow_mas_rapido = $workflow_resumen['mas_rapido']['nombre'].' ('.$this->_stringPeriodo($workflow_resumen['mas_rapido']['time']).')';
		}
		if (isset($workflow_resumen['mas_lento'])){
			$resumen_workflow_mas_lento = $workflow_resumen['mas_lento']['nombre'].' ('.$this->_stringPeriodo($workflow_resumen['mas_lento']['time']).')';
		}
		if (isset($workflow_resumen['total'])){
			$resumen_workflow_cant = $workflow_resumen['total']['cant'];
		}
		//procesos
		if (isset($proceso_resumen['mas_realizado'])){
			$resumen_proceso_mas_realizado = $proceso_resumen['mas_realizado']['nombre'].' ('.$proceso_resumen['mas_realizado']['cant'].')';
		}
		if (isset($proceso_resumen['menos_realizado'])){
			$resumen_proceso_menos_realizado = $proceso_resumen['menos_realizado']['nombre'].' ('.$proceso_resumen['menos_realizado']['cant'].')';		
		}
		if (isset($proceso_resumen['mas_rapido'])){
			$resumen_proceso_mas_rapido = $proceso_resumen['mas_rapido']['nombre'].' ('.$this->_stringPeriodo($proceso_resumen['mas_rapido']['time']).')';
		}
		if (isset($proceso_resumen['mas_lento'])){
			$resumen_proceso_mas_lento = $proceso_resumen['mas_lento']['nombre'].' ('.$this->_stringPeriodo($proceso_resumen['mas_lento']['time']).')';
		}
		if (isset($proceso_resumen['total'])){
			$resumen_proceso_cant = $proceso_resumen['total']['cant'];
		}
		$nombreMes = $this->_nombreMes($fecha_inicial);
		$titulo = "Resumen";
		$subtitulo = "Para el mes ".$nombreMes;
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'resumen_workflow_mas_realizado' 		=> $resumen_workflow_mas_realizado,
			'resumen_workflow_menos_realizado' 		=> $resumen_workflow_menos_realizado,
			'resumen_workflow_mas_rapido' 			=> $resumen_workflow_mas_rapido,
			'resumen_workflow_mas_lento' 			=> $resumen_workflow_mas_lento,
			'resumen_workflow_cant' 				=> $resumen_workflow_cant,
			'resumen_proceso_mas_realizado' 		=> $resumen_proceso_mas_realizado,
			'resumen_proceso_menos_realizado' 		=> $resumen_proceso_menos_realizado,
			'resumen_proceso_mas_rapido' 			=> $resumen_proceso_mas_rapido,
			'resumen_proceso_mas_lento' 			=> $resumen_proceso_mas_lento,
			'resumen_proceso_cant' 					=> $resumen_proceso_cant);
		return $data;
	}

	//calcula el resumen de los workflows y los procesos en el año
	private function _resumenDelAno($fecha_inicial,$fecha_final){
		$workflow_resumen = $this->CI->database->workflowResumen($fecha_inicial,$fecha_final);
		$proceso_resumen = $this->CI->database->procesoResumen($fecha_inicial,$fecha_final);
		$resumen_workflow_mas_realizado = 'No existen datos';
		$resumen_workflow_menos_realizado = 'No existen datos';
		$resumen_workflow_mas_rapido = 'No existen datos';
		$resumen_workflow_mas_lento = 'No existen datos';
		$resumen_workflow_cant = 'No existen datos';
		$resumen_proceso_mas_realizado = 'No existen datos';
		$resumen_proceso_menos_realizado = 'No existen datos';
		$resumen_proceso_mas_rapido = 'No existen datos';
		$resumen_proceso_mas_lento = 'No existen datos';
		$resumen_proceso_cant = 'No existen datos';
		//instancias
		if (isset($workflow_resumen['mas_realizado'])){
			$resumen_workflow_mas_realizado = $workflow_resumen['mas_realizado']['nombre'].' ('.$workflow_resumen['mas_realizado']['cant'].')';	
		}
		if (isset($workflow_resumen['menos_realizado'])){
			$resumen_workflow_menos_realizado = $workflow_resumen['menos_realizado']['nombre'].' ('.$workflow_resumen['menos_realizado']['cant'].')';		
		}
		if (isset($workflow_resumen['mas_rapido'])){
			$resumen_workflow_mas_rapido = $workflow_resumen['mas_rapido']['nombre'].' ('.$this->_stringPeriodo($workflow_resumen['mas_rapido']['time']).')';
		}
		if (isset($workflow_resumen['mas_lento'])){
			$resumen_workflow_mas_lento = $workflow_resumen['mas_lento']['nombre'].' ('.$this->_stringPeriodo($workflow_resumen['mas_lento']['time']).')';
		}
		if (isset($workflow_resumen['total'])){
			$resumen_workflow_cant = $workflow_resumen['total']['cant'];
		}
		//procesos
		if (isset($proceso_resumen['mas_realizado'])){
			$resumen_proceso_mas_realizado = $proceso_resumen['mas_realizado']['nombre'].' ('.$proceso_resumen['mas_realizado']['cant'].')';
		}
		if (isset($proceso_resumen['menos_realizado'])){
			$resumen_proceso_menos_realizado = $proceso_resumen['menos_realizado']['nombre'].' ('.$proceso_resumen['menos_realizado']['cant'].')';		
		}
		if (isset($proceso_resumen['mas_rapido'])){
			$resumen_proceso_mas_rapido = $proceso_resumen['mas_rapido']['nombre'].' ('.$this->_stringPeriodo($proceso_resumen['mas_rapido']['time']).')';
		}
		if (isset($proceso_resumen['mas_lento'])){
			$resumen_proceso_mas_lento = $proceso_resumen['mas_lento']['nombre'].' ('.$this->_stringPeriodo($proceso_resumen['mas_lento']['time']).')';
		}
		if (isset($proceso_resumen['total'])){
			$resumen_proceso_cant = $proceso_resumen['total']['cant'];
		}
		$nombreAno = explode("-",$fecha_inicial);
		$nombreAno = $nombreAno[0];
		$titulo = "Resumen";
		$subtitulo = "Para el año ".$nombreAno;
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'resumen_workflow_mas_realizado' 		=> $resumen_workflow_mas_realizado,
			'resumen_workflow_menos_realizado' 		=> $resumen_workflow_menos_realizado,
			'resumen_workflow_mas_rapido' 			=> $resumen_workflow_mas_rapido,
			'resumen_workflow_mas_lento' 			=> $resumen_workflow_mas_lento,
			'resumen_workflow_cant' 				=> $resumen_workflow_cant,
			'resumen_proceso_mas_realizado' 		=> $resumen_proceso_mas_realizado,
			'resumen_proceso_menos_realizado' 		=> $resumen_proceso_menos_realizado,
			'resumen_proceso_mas_rapido' 			=> $resumen_proceso_mas_rapido,
			'resumen_proceso_mas_lento' 			=> $resumen_proceso_mas_lento,
			'resumen_proceso_cant' 					=> $resumen_proceso_cant);
		return $data;
	}

	//calcula el resumen de los workflows y los procesos en el periodo
	private function _resumenDelPeriodo($fecha_inicial,$fecha_final){
		$workflow_resumen = $this->CI->database->workflowResumen($fecha_inicial,$fecha_final);
		$proceso_resumen = $this->CI->database->procesoResumen($fecha_inicial,$fecha_final);
		$resumen_workflow_mas_realizado = 'No existen datos';
		$resumen_workflow_menos_realizado = 'No existen datos';
		$resumen_workflow_mas_rapido = 'No existen datos';
		$resumen_workflow_mas_lento = 'No existen datos';
		$resumen_workflow_cant = 'No existen datos';
		$resumen_proceso_mas_realizado = 'No existen datos';
		$resumen_proceso_menos_realizado = 'No existen datos';
		$resumen_proceso_mas_rapido = 'No existen datos';
		$resumen_proceso_mas_lento = 'No existen datos';
		$resumen_proceso_cant = 'No existen datos';
		//instancias
		if (isset($workflow_resumen['mas_realizado'])){
			$resumen_workflow_mas_realizado = $workflow_resumen['mas_realizado']['nombre'].' ('.$workflow_resumen['mas_realizado']['cant'].')';	
		}
		if (isset($workflow_resumen['menos_realizado'])){
			$resumen_workflow_menos_realizado = $workflow_resumen['menos_realizado']['nombre'].' ('.$workflow_resumen['menos_realizado']['cant'].')';		
		}
		if (isset($workflow_resumen['mas_rapido'])){
			$resumen_workflow_mas_rapido = $workflow_resumen['mas_rapido']['nombre'].' ('.$this->_stringPeriodo($workflow_resumen['mas_rapido']['time']).')';
		}
		if (isset($workflow_resumen['mas_lento'])){
			$resumen_workflow_mas_lento = $workflow_resumen['mas_lento']['nombre'].' ('.$this->_stringPeriodo($workflow_resumen['mas_lento']['time']).')';
		}
		if (isset($workflow_resumen['total'])){
			$resumen_workflow_cant = $workflow_resumen['total']['cant'];
		}
		//procesos
		if (isset($proceso_resumen['mas_realizado'])){
			$resumen_proceso_mas_realizado = $proceso_resumen['mas_realizado']['nombre'].' ('.$proceso_resumen['mas_realizado']['cant'].')';
		}
		if (isset($proceso_resumen['menos_realizado'])){
			$resumen_proceso_menos_realizado = $proceso_resumen['menos_realizado']['nombre'].' ('.$proceso_resumen['menos_realizado']['cant'].')';		
		}
		if (isset($proceso_resumen['mas_rapido'])){
			$resumen_proceso_mas_rapido = $proceso_resumen['mas_rapido']['nombre'].' ('.$this->_stringPeriodo($proceso_resumen['mas_rapido']['time']).')';
		}
		if (isset($proceso_resumen['mas_lento'])){
			$resumen_proceso_mas_lento = $proceso_resumen['mas_lento']['nombre'].' ('.$this->_stringPeriodo($proceso_resumen['mas_lento']['time']).')';
		}
		if (isset($proceso_resumen['total'])){
			$resumen_proceso_cant = $proceso_resumen['total']['cant'];
		}
		$fecha_inicial = explode(" ",$fecha_inicial);
		$fecha_final = explode(" ",$fecha_final);
		$fecha_inicial = date_create($fecha_inicial[0]);
		$fecha_final = date_create($fecha_final[0]);
		$fecha_inicial = date_format($fecha_inicial,"d-m-Y");
		$fecha_final = date_format($fecha_final,"d-m-Y");		
		$titulo = "Resumen";
		$subtitulo = "En el periodo del ".$fecha_inicial." al ".$fecha_final;
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'resumen_workflow_mas_realizado' 		=> $resumen_workflow_mas_realizado,
			'resumen_workflow_menos_realizado' 		=> $resumen_workflow_menos_realizado,
			'resumen_workflow_mas_rapido' 			=> $resumen_workflow_mas_rapido,
			'resumen_workflow_mas_lento' 			=> $resumen_workflow_mas_lento,
			'resumen_workflow_cant' 				=> $resumen_workflow_cant,
			'resumen_proceso_mas_realizado' 		=> $resumen_proceso_mas_realizado,
			'resumen_proceso_menos_realizado' 		=> $resumen_proceso_menos_realizado,
			'resumen_proceso_mas_rapido' 			=> $resumen_proceso_mas_rapido,
			'resumen_proceso_mas_lento' 			=> $resumen_proceso_mas_lento,
			'resumen_proceso_cant' 					=> $resumen_proceso_cant);
		return $data;
	}

	//muestra las ultimas instancias / transiciones (procesos) del dia 
	private function _ultimas($dia,$ultimas_instancias,$ultimas_transiciones){
		$subtitulo_ins = "";
		$subtitulo_trans = "";
		$subtitulo = "No se definieron datos";
		$datos = $this->CI->database->ultimas($dia,$ultimas_instancias,$ultimas_transiciones);
		//var_dump($datos);
		$titulo = "Ultimos Flujos de trabajo / Transiciones";
		$dia = explode(" ",$dia);
		$dia = date_create($dia[0]);
		$dia = date_format($dia,"d-m-Y");
		if ($ultimas_instancias>1){
			$subtitulo_ins = "Últimos ".$ultimas_instancias." Flujos de trabajo"; 	
		}
		else if ($ultimas_instancias == 1){
			$subtitulo_ins = "Último Flujo de trabajo"; 		
		}
		if ($ultimas_transiciones>1){
			$subtitulo_trans = "últimas ".$ultimas_transiciones." transiciones";
		}
		else if ($ultimas_transiciones == 1){
			$subtitulo_trans = "última transición";	
		}
		if (($subtitulo_ins!="")&&($subtitulo_trans!="")){
			$subtitulo = $subtitulo_ins." y ".$subtitulo_trans." para el día ";	
		}
		else if (($subtitulo_ins!="")&&($subtitulo_trans=="")){
			$subtitulo = $subtitulo_ins." para el día ";	
		}
		else if (($subtitulo_ins=="")&&($subtitulo_trans!="")){
			$subtitulo = $subtitulo_trans." para el día ";	
		}
		$subtitulo = $subtitulo.$dia;
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'instancias' 							=> json_encode($datos['instancias']),
			'transiciones' 							=> json_encode($datos['procesos'])
			);
		return $data;
	}

	//calcula el tiempo de duracion de un usuario en una actividad en un dia
	private function _duracionTransicionUsuarioDia($usuario,$transicion,$tipo_usuario,$dia){
		$datos_busqueda = array();
		$datos_promedio = array();
		$datos_busqueda[0] = $this->CI->database->duracionTransicion($usuario,$transicion,$tipo_usuario,$dia,$dia);
		$tiempo_busqueda[0] = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_busqueda[0]));
		$nombre_usuario[0] = $usuario; 
		$datos_promedio = $this->CI->database->duracionTransicion('all',$transicion,$tipo_usuario,$dia,$dia);
		$tiempo_promedio = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_promedio));
		$titulo = 'Duración Transición';
		if ($usuario=='all'){
			$usuario = 'Todos';
		}
		if ($transicion=='all'){
			$transicion = 'Todas';
		}else{
			$transicion = $this->CI->database->nombreTransicion($transicion);	
		}
		$dia = explode(" ",$dia);
		$dia = date_create($dia[0]);
		$dia = date_format($dia,"d-m-Y");
		$subtitulo = 'Del usuario <b>'.$usuario.'</b> para la transición <b>'.$transicion.'</b> en el día '.$dia;		
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'datos_busqueda' 						=> $datos_busqueda,
			'tiempo_busqueda'						=> $tiempo_busqueda,
			'datos_promedio'						=> $datos_promedio,
			'tiempo_promedio'						=> $tiempo_promedio,
			'nombre_usuario'						=> $nombre_usuario			
			);		
		return $data;
	}

	//calcula el tiempo de duracion todos los usuarios en una actividad en un dia
	private function _duracionTransicionTodosDia($usuario,$transicion,$tipo_usuario,$dia){		
		$datos_busqueda = array();
		$datos_promedio = array();
		if ($tipo_usuario == 'all')
			$usuarios = $this->CI->database->usuariosTodos();			
		else
			$usuarios = $this->CI->database->usuariosTodos($tipo_usuario);
		for ($i=0; $i < count($usuarios); $i++)
		{			
			$datos_busqueda[$i] = $this->CI->database->duracionTransicion($usuarios[$i]['id_usuario'],$transicion,$tipo_usuario,$dia,$dia);			
			$tiempo_busqueda[$i] = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_busqueda[$i]));
			$nombre_usuario[$i] = $usuarios[$i]['id_usuario'];
		}		
		$datos_promedio = $this->CI->database->duracionTransicion('all',$transicion,$tipo_usuario,$dia,$dia);
		$tiempo_promedio = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_promedio));
		$titulo = 'Duración Transición';
		if ($tipo_usuario=='all'){			
			$tipo_usuario = 'Todos';
		}
		else{
			$tipo_usuario = $this->CI->database->nombreTipoUsuario($tipo_usuario);	
		}
		if ($transicion=='all'){
			$transicion = 'Todas';
		}else{
			$transicion = $this->CI->database->nombreTransicion($transicion);	
		}
		$dia = explode(" ",$dia);
		$dia = date_create($dia[0]);
		$dia = date_format($dia,"d-m-Y");
		$subtitulo = 'Del tipo usuario <b>'.$tipo_usuario.'</b> para la transición <b>'.$transicion.'</b> en el día '.$dia;		
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'datos_busqueda' 						=> $datos_busqueda,
			'tiempo_busqueda'						=> $tiempo_busqueda,
			'datos_promedio'						=> $datos_promedio,
			'tiempo_promedio'						=> $tiempo_promedio,
			'nombre_usuario'						=> $nombre_usuario			
			);		
		return $data;
	}

	//calcula el tiempo de duracion de un usuario en una actividad en un mes
	private function _duracionTransicionUsuarioMes($usuario,$transicion,$tipo_usuario,$fecha_inicial,$fecha_final){
		$datos_busqueda = array();
		$datos_promedio = array();
		$datos_busqueda[0] = $this->CI->database->duracionTransicion($usuario,$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_busqueda[0] = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_busqueda[0]));
		$nombre_usuario[0] = $usuario; 
		$datos_promedio = $this->CI->database->duracionTransicion('all',$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_promedio = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_promedio));
		$titulo = 'Duración Transición';
		if ($usuario=='all'){
			$usuario = 'Todos';
		}
		if ($transicion=='all'){
			$transicion = 'Todas';
		}else{
			$transicion = $this->CI->database->nombreTransicion($transicion);	
		}
		$nombreMes = $this->_nombreMes($fecha_inicial);
		$subtitulo = 'Del usuario <b>'.$usuario.'</b> para la transición <b>'.$transicion.'</b> en el mes '.$nombreMes;		
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'datos_busqueda' 						=> $datos_busqueda,
			'tiempo_busqueda'						=> $tiempo_busqueda,
			'datos_promedio'						=> $datos_promedio,
			'tiempo_promedio'						=> $tiempo_promedio,
			'nombre_usuario'						=> $nombre_usuario			
			);		
		return $data;
	}

	//calcula el tiempo de duracion todos los usuarios en una actividad en un mes
	private function _duracionTransicionTodosMes($usuario,$transicion,$tipo_usuario,$fecha_inicial,$fecha_final){		
		$datos_busqueda = array();
		$datos_promedio = array();
		if ($tipo_usuario == 'all')
			$usuarios = $this->CI->database->usuariosTodos();			
		else
			$usuarios = $this->CI->database->usuariosTodos($tipo_usuario);
		for ($i=0; $i < count($usuarios); $i++)
		{			
			$datos_busqueda[$i] = $this->CI->database->duracionTransicion($usuarios[$i]['id_usuario'],$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);			
			$tiempo_busqueda[$i] = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_busqueda[$i]));
			$nombre_usuario[$i] = $usuarios[$i]['id_usuario'];
		}		
		$datos_promedio = $this->CI->database->duracionTransicion('all',$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_promedio = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_promedio));
		$titulo = 'Duración Transición';
		if ($tipo_usuario=='all'){			
			$tipo_usuario = 'Todos';
		}
		else{
			$tipo_usuario = $this->CI->database->nombreTipoUsuario($tipo_usuario);	
		}
		if ($transicion=='all'){
			$transicion = 'Todas';
		}else{
			$transicion = $this->CI->database->nombreTransicion($transicion);	
		}
		$nombreMes = $this->_nombreMes($fecha_inicial);
		$subtitulo = 'Del tipo usuario <b>'.$tipo_usuario.'</b> para la transición <b>'.$transicion.'</b> en el mes '.$nombreMes;		
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'datos_busqueda' 						=> $datos_busqueda,
			'tiempo_busqueda'						=> $tiempo_busqueda,
			'datos_promedio'						=> $datos_promedio,
			'tiempo_promedio'						=> $tiempo_promedio,
			'nombre_usuario'						=> $nombre_usuario			
			);		
		return $data;
	}

	//calcula el tiempo de duracion de un usuario en una actividad en un año
	private function _duracionTransicionUsuarioAno($usuario,$transicion,$tipo_usuario,$fecha_inicial,$fecha_final){
		$datos_busqueda = array();
		$datos_promedio = array();
		$datos_busqueda[0] = $this->CI->database->duracionTransicion($usuario,$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_busqueda[0] = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_busqueda[0]));
		$nombre_usuario[0] = $usuario; 
		$datos_promedio = $this->CI->database->duracionTransicion('all',$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_promedio = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_promedio));
		$titulo = 'Duración Transición';
		if ($usuario=='all'){
			$usuario = 'Todos';
		}
		if ($transicion=='all'){
			$transicion = 'Todas';
		}else{
			$transicion = $this->CI->database->nombreTransicion($transicion);	
		}
		$nombreAno = explode("-",$fecha_inicial);
		$nombreAno = $nombreAno[0];	
		$subtitulo = 'Del usuario <b>'.$usuario.'</b> para la transición <b>'.$transicion.'</b> en el año '.$nombreAno;		
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'datos_busqueda' 						=> $datos_busqueda,
			'tiempo_busqueda'						=> $tiempo_busqueda,
			'datos_promedio'						=> $datos_promedio,
			'tiempo_promedio'						=> $tiempo_promedio,
			'nombre_usuario'						=> $nombre_usuario			
			);		
		return $data;
	}

	//calcula el tiempo de duracion todos los usuarios en una actividad en un año
	private function _duracionTransicionTodosAno($usuario,$transicion,$tipo_usuario,$fecha_inicial,$fecha_final){		
		$datos_busqueda = array();
		$datos_promedio = array();
		if ($tipo_usuario == 'all')
			$usuarios = $this->CI->database->usuariosTodos();			
		else
			$usuarios = $this->CI->database->usuariosTodos($tipo_usuario);
		for ($i=0; $i < count($usuarios); $i++)
		{			
			$datos_busqueda[$i] = $this->CI->database->duracionTransicion($usuarios[$i]['id_usuario'],$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);			
			$tiempo_busqueda[$i] = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_busqueda[$i]));
			$nombre_usuario[$i] = $usuarios[$i]['id_usuario'];
		}		
		$datos_promedio = $this->CI->database->duracionTransicion('all',$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_promedio = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_promedio));
		$titulo = 'Duración Transición';
		if ($tipo_usuario=='all'){			
			$tipo_usuario = 'Todos';
		}
		else{
			$tipo_usuario = $this->CI->database->nombreTipoUsuario($tipo_usuario);	
		}
		if ($transicion=='all'){
			$transicion = 'Todas';
		}else{
			$transicion = $this->CI->database->nombreTransicion($transicion);	
		}
		$nombreAno = explode("-",$fecha_inicial);
		$nombreAno = $nombreAno[0];
		$subtitulo = 'Del tipo usuario <b>'.$tipo_usuario.'</b> para la transición <b>'.$transicion.'</b> en el año '.$nombreAno;		
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'datos_busqueda' 						=> $datos_busqueda,
			'tiempo_busqueda'						=> $tiempo_busqueda,
			'datos_promedio'						=> $datos_promedio,
			'tiempo_promedio'						=> $tiempo_promedio,
			'nombre_usuario'						=> $nombre_usuario			
			);		
		return $data;
	}

	//calcula el tiempo de duracion de un usuario en una actividad en un periodo
	private function _duracionTransicionUsuarioPeriodo($usuario,$transicion,$tipo_usuario,$fecha_inicial,$fecha_final){
		$datos_busqueda = array();
		$datos_promedio = array();
		$datos_busqueda[0] = $this->CI->database->duracionTransicion($usuario,$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_busqueda[0] = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_busqueda[0]));
		$nombre_usuario[0] = $usuario; 
		$datos_promedio = $this->CI->database->duracionTransicion('all',$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_promedio = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_promedio));
		$titulo = 'Duración Transición';
		if ($usuario=='all'){
			$usuario = 'Todos';
		}
		if ($transicion=='all'){
			$transicion = 'Todas';
		}else{
			$transicion = $this->CI->database->nombreTransicion($transicion);	
		}
		$fecha_inicial = explode(" ",$fecha_inicial);
		$fecha_final = explode(" ",$fecha_final);
		$fecha_inicial = date_create($fecha_inicial[0]);
		$fecha_final = date_create($fecha_final[0]);
		$fecha_inicial = date_format($fecha_inicial,"d-m-Y");
		$fecha_final = date_format($fecha_final,"d-m-Y");		
		$subtitulo = 'Del usuario <b>'.$usuario.'</b> para la transición <b>'.$transicion.'</b> en el periodo del '.$fecha_inicial.' al '.$fecha_final;	
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'datos_busqueda' 						=> $datos_busqueda,
			'tiempo_busqueda'						=> $tiempo_busqueda,
			'datos_promedio'						=> $datos_promedio,
			'tiempo_promedio'						=> $tiempo_promedio,
			'nombre_usuario'						=> $nombre_usuario			
			);		
		return $data;
	}

	//calcula el tiempo de duracion todos los usuarios en una actividad en un periodo
	private function _duracionTransicionTodosPeriodo($usuario,$transicion,$tipo_usuario,$fecha_inicial,$fecha_final){		
		$datos_busqueda = array();
		$datos_promedio = array();
		if ($tipo_usuario == 'all')
			$usuarios = $this->CI->database->usuariosTodos();			
		else
			$usuarios = $this->CI->database->usuariosTodos($tipo_usuario);
		for ($i=0; $i < count($usuarios); $i++)
		{			
			$datos_busqueda[$i] = $this->CI->database->duracionTransicion($usuarios[$i]['id_usuario'],$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);			
			$tiempo_busqueda[$i] = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_busqueda[$i]));
			$nombre_usuario[$i] = $usuarios[$i]['id_usuario'];
		}		
		$datos_promedio = $this->CI->database->duracionTransicion('all',$transicion,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_promedio = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_promedio));
		$titulo = 'Duración Transición';
		if ($tipo_usuario=='all'){			
			$tipo_usuario = 'Todos';
		}
		else{
			$tipo_usuario = $this->CI->database->nombreTipoUsuario($tipo_usuario);	
		}
		if ($transicion=='all'){
			$transicion = 'Todas';
		}else{
			$transicion = $this->CI->database->nombreTransicion($transicion);	
		}
		$fecha_inicial = explode(" ",$fecha_inicial);
		$fecha_final = explode(" ",$fecha_final);
		$fecha_inicial = date_create($fecha_inicial[0]);
		$fecha_final = date_create($fecha_final[0]);
		$fecha_inicial = date_format($fecha_inicial,"d-m-Y");
		$fecha_final = date_format($fecha_final,"d-m-Y");
		$subtitulo = 'Del tipo usuario <b>'.$tipo_usuario.'</b> para la transición <b>'.$transicion.'</b> en el periodo del '.$fecha_inicial.' al '.$fecha_final;
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'datos_busqueda' 						=> $datos_busqueda,
			'tiempo_busqueda'						=> $tiempo_busqueda,
			'datos_promedio'						=> $datos_promedio,
			'tiempo_promedio'						=> $tiempo_promedio,
			'nombre_usuario'						=> $nombre_usuario			
			);		
		return $data;
	}

	//calcula el tiempo de duracion de un usuario en un workflow en un dia
	private function _duracionWorkflowUsuarioDia($usuario,$workflow,$tipo_usuario,$dia){
		$datos_busqueda = array();
		$datos_promedio = array();
		$datos_busqueda[0] = $this->CI->database->duracionWorkflow($usuario,$workflow,$tipo_usuario,$dia,$dia);
		$tiempo_busqueda[0] = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_busqueda[0]));
		$nombre_usuario[0] = $usuario; 
		$datos_promedio = $this->CI->database->duracionWorkflow('all',$workflow,$tipo_usuario,$dia,$dia);
		$tiempo_promedio = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_promedio));
		$titulo = 'Duración Flujo de Trabajo';
		if ($usuario=='all'){
			$usuario = 'Todos';
		}
		if ($workflow=='all'){
			$workflow = 'Todos';
		}else{
			$workflow = $this->CI->database->nombreWorkflow($workflow);	
		}
		$dia = explode(" ",$dia);
		$dia = date_create($dia[0]);
		$dia = date_format($dia,"d-m-Y");
		$subtitulo = 'Del usuario <b>'.$usuario.'</b> para el flujo de trabajo <b>'.$workflow.'</b> en el día '.$dia;		
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'datos_busqueda' 						=> $datos_busqueda,
			'tiempo_busqueda'						=> $tiempo_busqueda,
			'datos_promedio'						=> $datos_promedio,
			'tiempo_promedio'						=> $tiempo_promedio,
			'nombre_usuario'						=> $nombre_usuario			
			);		
		return $data;
	}

	//calcula el tiempo de duracion todos los usuarios en un workflow en un dia
	private function _duracionWorkflowTodosDia($usuario,$workflow,$tipo_usuario,$dia){		
		$datos_busqueda = array();
		$datos_promedio = array();
		if ($tipo_usuario == 'all')
			$usuarios = $this->CI->database->usuariosTodos();			
		else
			$usuarios = $this->CI->database->usuariosTodos($tipo_usuario);
		for ($i=0; $i < count($usuarios); $i++)
		{			
			$datos_busqueda[$i] = $this->CI->database->duracionWorkflow($usuarios[$i]['id_usuario'],$workflow,$tipo_usuario,$dia,$dia);			
			$tiempo_busqueda[$i] = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_busqueda[$i]));
			$nombre_usuario[$i] = $usuarios[$i]['id_usuario'];
		}		
		$datos_promedio = $this->CI->database->duracionWorkflow('all',$workflow,$tipo_usuario,$dia,$dia);
		$tiempo_promedio = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_promedio));
		$titulo = 'Duración Flujo de Trabajo';
		if ($tipo_usuario=='all'){			
			$tipo_usuario = 'Todos';
		}
		else{
			$tipo_usuario = $this->CI->database->nombreTipoUsuario($tipo_usuario);	
		}
		if ($workflow=='all'){
			$workflow = 'Todos';
		}else{
			$workflow = $this->CI->database->nombreWorkflow($workflow);	
		}
		$dia = explode(" ",$dia);
		$dia = date_create($dia[0]);
		$dia = date_format($dia,"d-m-Y");
		$subtitulo = 'Del tipo usuario <b>'.$tipo_usuario.'</b> para el flujo de trabajo <b>'.$workflow.'</b> en el día '.$dia;		
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'datos_busqueda' 						=> $datos_busqueda,
			'tiempo_busqueda'						=> $tiempo_busqueda,
			'datos_promedio'						=> $datos_promedio,
			'tiempo_promedio'						=> $tiempo_promedio,
			'nombre_usuario'						=> $nombre_usuario			
			);		
		return $data;
	}

	//calcula el tiempo de duracion de un usuario en un workflow en un mes
	private function _duracionWorkflowUsuarioMes($usuario,$workflow,$tipo_usuario,$fecha_inicial,$fecha_final){
		$datos_busqueda = array();
		$datos_promedio = array();
		$datos_busqueda[0] = $this->CI->database->duracionWorkflow($usuario,$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_busqueda[0] = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_busqueda[0]));
		$nombre_usuario[0] = $usuario; 
		$datos_promedio = $this->CI->database->duracionWorkflow('all',$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_promedio = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_promedio));
		$titulo = 'Duración Flujo de Trabajo';
		if ($usuario=='all'){
			$usuario = 'Todos';
		}
		if ($workflow=='all'){
			$workflow = 'Todos';
		}else{
			$workflow = $this->CI->database->nombreWorkflow($workflow);	
		}
		$nombreMes = $this->_nombreMes($fecha_inicial);
		$subtitulo = 'Del usuario <b>'.$usuario.'</b> para el flujo de trabajo <b>'.$workflow.'</b> en el mes '.$nombreMes;		
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'datos_busqueda' 						=> $datos_busqueda,
			'tiempo_busqueda'						=> $tiempo_busqueda,
			'datos_promedio'						=> $datos_promedio,
			'tiempo_promedio'						=> $tiempo_promedio,
			'nombre_usuario'						=> $nombre_usuario			
			);		
		return $data;
	}

	//calcula el tiempo de duracion todos los usuarios en un workflow en un mes
	private function _duracionWorkflowTodosMes($usuario,$workflow,$tipo_usuario,$fecha_inicial,$fecha_final){		
		$datos_busqueda = array();
		$datos_promedio = array();
		if ($tipo_usuario == 'all')
			$usuarios = $this->CI->database->usuariosTodos();			
		else
			$usuarios = $this->CI->database->usuariosTodos($tipo_usuario);
		for ($i=0; $i < count($usuarios); $i++)
		{			
			$datos_busqueda[$i] = $this->CI->database->duracionWorkflow($usuarios[$i]['id_usuario'],$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);			
			$tiempo_busqueda[$i] = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_busqueda[$i]));
			$nombre_usuario[$i] = $usuarios[$i]['id_usuario'];
		}		
		$datos_promedio = $this->CI->database->duracionWorkflow('all',$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_promedio = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_promedio));
		$titulo = 'Duración Flujo de Trabajo';
		if ($tipo_usuario=='all'){			
			$tipo_usuario = 'Todos';
		}
		else{
			$tipo_usuario = $this->CI->database->nombreTipoUsuario($tipo_usuario);	
		}
		if ($workflow=='all'){
			$workflow = 'Todos';
		}else{
			$workflow = $this->CI->database->nombreWorkflow($workflow);	
		}
		$nombreMes = $this->_nombreMes($fecha_inicial);
		$subtitulo = 'Del tipo usuario <b>'.$tipo_usuario.'</b> para el flujo de trabajo <b>'.$workflow.'</b> en el mes '.$nombreMes;		
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'datos_busqueda' 						=> $datos_busqueda,
			'tiempo_busqueda'						=> $tiempo_busqueda,
			'datos_promedio'						=> $datos_promedio,
			'tiempo_promedio'						=> $tiempo_promedio,
			'nombre_usuario'						=> $nombre_usuario			
			);		
		return $data;
	}

	//calcula el tiempo de duracion de un usuario en un workflow en un año
	private function _duracionWorkflowUsuarioAno($usuario,$workflow,$tipo_usuario,$fecha_inicial,$fecha_final){
		$datos_busqueda = array();
		$datos_promedio = array();
		$datos_busqueda[0] = $this->CI->database->duracionWorkflow($usuario,$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_busqueda[0] = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_busqueda[0]));
		$nombre_usuario[0] = $usuario; 
		$datos_promedio = $this->CI->database->duracionWorkflow('all',$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_promedio = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_promedio));
		$titulo = 'Duración Flujo de Trabajo';
		if ($usuario=='all'){
			$usuario = 'Todos';
		}
		if ($workflow=='all'){
			$workflow = 'Todos';
		}else{
			$workflow = $this->CI->database->nombreWorkflow($workflow);	
		}
		$nombreAno = explode("-",$fecha_inicial);
		$nombreAno = $nombreAno[0];	
		$subtitulo = 'Del usuario <b>'.$usuario.'</b> para el flujo de trabajo <b>'.$workflow.'</b> en el año '.$nombreAno;		
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'datos_busqueda' 						=> $datos_busqueda,
			'tiempo_busqueda'						=> $tiempo_busqueda,
			'datos_promedio'						=> $datos_promedio,
			'tiempo_promedio'						=> $tiempo_promedio,
			'nombre_usuario'						=> $nombre_usuario			
			);		
		return $data;
	}

	//calcula el tiempo de duracion todos los usuarios en un workflow en un año
	private function _duracionWorkflowTodosAno($usuario,$workflow,$tipo_usuario,$fecha_inicial,$fecha_final){		
		$datos_busqueda = array();
		$datos_promedio = array();
		if ($tipo_usuario == 'all')
			$usuarios = $this->CI->database->usuariosTodos();			
		else
			$usuarios = $this->CI->database->usuariosTodos($tipo_usuario);
		for ($i=0; $i < count($usuarios); $i++)
		{			
			$datos_busqueda[$i] = $this->CI->database->duracionWorkflow($usuarios[$i]['id_usuario'],$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);			
			$tiempo_busqueda[$i] = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_busqueda[$i]));
			$nombre_usuario[$i] = $usuarios[$i]['id_usuario'];
		}		
		$datos_promedio = $this->CI->database->duracionWorkflow('all',$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_promedio = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_promedio));
		$titulo = 'Duración Flujo de Trabajo';
		if ($tipo_usuario=='all'){			
			$tipo_usuario = 'Todos';
		}
		else{
			$tipo_usuario = $this->CI->database->nombreTipoUsuario($tipo_usuario);	
		}
		if ($workflow=='all'){
			$workflow = 'Todos';
		}else{
			$workflow = $this->CI->database->nombreWorkflow($workflow);	
		}
		$nombreAno = explode("-",$fecha_inicial);
		$nombreAno = $nombreAno[0];
		$subtitulo = 'Del tipo usuario <b>'.$tipo_usuario.'</b> para el flujo de trabajo <b>'.$workflow.'</b> en el año '.$nombreAno;		
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'datos_busqueda' 						=> $datos_busqueda,
			'tiempo_busqueda'						=> $tiempo_busqueda,
			'datos_promedio'						=> $datos_promedio,
			'tiempo_promedio'						=> $tiempo_promedio,
			'nombre_usuario'						=> $nombre_usuario			
			);		
		return $data;
	}

	//calcula el tiempo de duracion de un usuario en un workflow en un periodo
	private function _duracionWorkflowUsuarioPeriodo($usuario,$workflow,$tipo_usuario,$fecha_inicial,$fecha_final){
		$datos_busqueda = array();
		$datos_promedio = array();
		$datos_busqueda[0] = $this->CI->database->duracionWorkflow($usuario,$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_busqueda[0] = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_busqueda[0]));
		$nombre_usuario[0] = $usuario; 
		$datos_promedio = $this->CI->database->duracionWorkflow('all',$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_promedio = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_promedio));
		$titulo = 'Duración Flujo de Trabajo';
		if ($usuario=='all'){
			$usuario = 'Todos';
		}
		if ($workflow=='all'){
			$workflow = 'Todos';
		}else{
			$workflow = $this->CI->database->nombreWorkflow($workflow);
		}
		$fecha_inicial = explode(" ",$fecha_inicial);
		$fecha_final = explode(" ",$fecha_final);
		$fecha_inicial = date_create($fecha_inicial[0]);
		$fecha_final = date_create($fecha_final[0]);
		$fecha_inicial = date_format($fecha_inicial,"d-m-Y");
		$fecha_final = date_format($fecha_final,"d-m-Y");		
		$subtitulo = 'Del usuario <b>'.$usuario.'</b> para el flujo de trabajo <b>'.$workflow.'</b> en el periodo del '.$fecha_inicial.' al '.$fecha_final;	
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'datos_busqueda' 						=> $datos_busqueda,
			'tiempo_busqueda'						=> $tiempo_busqueda,
			'datos_promedio'						=> $datos_promedio,
			'tiempo_promedio'						=> $tiempo_promedio,
			'nombre_usuario'						=> $nombre_usuario			
			);		
		return $data;
	}

	//calcula el tiempo de duracion todos los usuarios en un workflow en un periodo
	private function _duracionWorkflowTodosPeriodo($usuario,$workflow,$tipo_usuario,$fecha_inicial,$fecha_final){		
		$datos_busqueda = array();
		$datos_promedio = array();
		if ($tipo_usuario == 'all')
			$usuarios = $this->CI->database->usuariosTodos();			
		else
			$usuarios = $this->CI->database->usuariosTodos($tipo_usuario);
		for ($i=0; $i < count($usuarios); $i++)
		{			
			$datos_busqueda[$i] = $this->CI->database->duracionWorkflow($usuarios[$i]['id_usuario'],$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);			
			$tiempo_busqueda[$i] = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_busqueda[$i]));
			$nombre_usuario[$i] = $usuarios[$i]['id_usuario'];
		}		
		$datos_promedio = $this->CI->database->duracionWorkflow('all',$workflow,$tipo_usuario,$fecha_inicial,$fecha_final);
		$tiempo_promedio = $this->_stringPeriodo($this->CI->database->convert_seconds($datos_promedio));
		$titulo = 'Duración Flujo de Trabajo';
		if ($tipo_usuario=='all'){			
			$tipo_usuario = 'Todos';
		}
		else{
			$tipo_usuario = $this->CI->database->nombreTipoUsuario($tipo_usuario);	
		}
		if ($workflow=='all'){
			$workflow = 'Todas';
		}else{
			$workflow = $this->CI->database->nombreWorkflow($workflow);
		}
		$fecha_inicial = explode(" ",$fecha_inicial);
		$fecha_final = explode(" ",$fecha_final);
		$fecha_inicial = date_create($fecha_inicial[0]);
		$fecha_final = date_create($fecha_final[0]);
		$fecha_inicial = date_format($fecha_inicial,"d-m-Y");
		$fecha_final = date_format($fecha_final,"d-m-Y");
		$subtitulo = 'Del tipo usuario <b>'.$tipo_usuario.'</b> para el flujo de trabajo <b>'.$workflow.'</b> en el periodo del '.$fecha_inicial.' al '.$fecha_final;
		$data = array(
			'titulo' 								=> $titulo,
			'subtitulo' 							=> $subtitulo,
			'datos_busqueda' 						=> $datos_busqueda,
			'tiempo_busqueda'						=> $tiempo_busqueda,
			'datos_promedio'						=> $datos_promedio,
			'tiempo_promedio'						=> $tiempo_promedio,
			'nombre_usuario'						=> $nombre_usuario			
			);		
		return $data;
	}


}

/* End of file indicadores_libreria.php */
/* Location: ./application/libraries/indicadores_libreria.php */

