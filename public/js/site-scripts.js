$(document).ready(function(){
	$(".button-collapse").sideNav();	
	$('.button-collapse').sideNav({
      menuWidth: 200, // Default is 240
      edge: 'left', // Choose the horizontal origin      
    });
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
    $('select').material_select();
    $('.datepicker').pickadate({
    	selectMonths: true, // Creates a dropdown to control month
    	selectYears: 15 // Creates a dropdown of 15 years to control year
  	});
})

$( ".usuario" ).on( "click", function() {
	id = $(this).attr('id');
	$('#cargar_usuario_username').val(id);
	$('#cargar_usuario').submit();
});

$( "#eliminar_usuario" ).on( "click", function() {	
	enlace = $('#cargar_usuario').attr('action');
	$('#cargar_usuario').attr('action',enlace+'/eliminar');	
	$('#cargar_usuario').submit();
});

$( "#reiniciar_contrasena" ).on( "click", function() {	
	enlace = $('#cargar_usuario').attr('action');
	$('#cargar_usuario').attr('action',enlace+'/reiniciarcontrasena');	
	$('#cargar_usuario').submit();
});

/*--------------------------indicadores-------------------------*/
$('#filtro-indicador-actividad').change(function(){
	$('#submit-indicador-actividad').parent().addClass('disabled');	
	$('#filtro-indicador-actividad-dia-div').addClass('hide');
	$('#filtro-indicador-actividad-comparardias-div').addClass('hide');
	value = $(this).val();
	if((value=='hoy')||(value=='ayer')){
		$('#submit-indicador-actividad').parent().removeClass('disabled');
	}
	else{
		if (value=='dia'){
			$('#filtro-indicador-actividad-dia-campo').val('');
			$('#filtro-indicador-actividad-dia-div').removeClass('hide');
		}
		else if (value=='comparardias'){
			$('#filtro-indicador-actividad-comparardias-campo1').val('');
			$('#filtro-indicador-actividad-comparardias-campo2').val('');
			$('#filtro-indicador-actividad-comparardias-div').removeClass('hide');
		}
	}
})
$('#filtro-indicador-actividad-dia-campo').change(function(){
	value = $(this).val();
	if (value!='')
		$('#submit-indicador-actividad').parent().removeClass('disabled');
	else
		$('#submit-indicador-actividad').parent().addClass('disabled');	
})

$('#filtro-indicador-actividad-comparardias-campo1').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-actividad-comparardias-campo2').val();
	if ((value1!='')&&(value2!=''))
		$('#submit-indicador-actividad').parent().removeClass('disabled');
	else
		$('#submit-indicador-actividad').parent().addClass('disabled');	
})

$('#filtro-indicador-actividad-comparardias-campo2').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-actividad-comparardias-campo1').val();
	if ((value1!='')&&(value2!=''))
		$('#submit-indicador-actividad').parent().removeClass('disabled');
	else
		$('#submit-indicador-actividad').parent().addClass('disabled');	
})
