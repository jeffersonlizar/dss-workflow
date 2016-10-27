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
	$('#filtro-indicador-actividad-mesespecifico-div').addClass('hide');
	$('#filtro-indicador-actividad-compararmeses-div').addClass('hide');
	$('#filtro-indicador-actividad-anoespecifico-div').addClass('hide');
	$('#filtro-indicador-actividad-compararanos-div').addClass('hide');
	value = $(this).val();
	if((value=='hoy')||(value=='ayer')||(value=='mesactual')||(value=='anoactual')){
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
		else if (value=='mesespecifico'){
			var u = $('#filtro-indicador-actividad-mesespecifico-campo1').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-actividad-mesespecifico-campo1').siblings('input');
			$(i).val('Seleccione el mes');			
			var u = $('#filtro-indicador-actividad-mesespecifico-campo2').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-actividad-mesespecifico-campo2').siblings('input');
			$(i).val('Seleccione el año');
			$('#filtro-indicador-actividad-mesespecifico-campo1').val('');
			$('#filtro-indicador-actividad-mesespecifico-campo2').val('');
			$('#filtro-indicador-actividad-mesespecifico-div').removeClass('hide');
		}
		else if (value=='compararmeses'){
			var u = $('#filtro-indicador-actividad-compararmeses-campo1').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-actividad-compararmeses-campo1').siblings('input');
			$(i).val('Seleccione el mes');			
			var u = $('#filtro-indicador-actividad-compararmeses-campo2').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-actividad-compararmeses-campo2').siblings('input');
			$(i).val('Seleccione el año');
			var u = $('#filtro-indicador-actividad-compararmeses-campo3').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-actividad-compararmeses-campo3').siblings('input');
			$(i).val('Seleccione el mes');			
			var u = $('#filtro-indicador-actividad-compararmeses-campo4').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-actividad-compararmeses-campo4').siblings('input');
			$(i).val('Seleccione el año');

			$('#filtro-indicador-actividad-compararmeses-campo1').val('');
			$('#filtro-indicador-actividad-compararmeses-campo2').val('');
			$('#filtro-indicador-actividad-compararmeses-campo3').val('');
			$('#filtro-indicador-actividad-compararmeses-campo4').val('');
			$('#filtro-indicador-actividad-compararmeses-div').removeClass('hide');
		}
		else if (value=='anoespecifico'){
			var u = $('#filtro-indicador-actividad-anoespecifico-campo1').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-actividad-anoespecifico-campo1').siblings('input');
			$(i).val('Seleccione el año');
			$('#filtro-indicador-actividad-anoespecifico-campo1').val('');
			$('#filtro-indicador-actividad-anoespecifico-div').removeClass('hide');
		}
		else if (value=='compararanos'){
			var u = $('#filtro-indicador-actividad-compararanos-campo1').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-actividad-compararanos-campo1').siblings('input');
			$(i).val('Seleccione el año');
			var u = $('#filtro-indicador-actividad-compararanos-campo2').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-actividad-compararanos-campo2').siblings('input');
			$(i).val('Seleccione el año');
			$('#filtro-indicador-actividad-compararanos-campo1').val('');
			$('#filtro-indicador-actividad-compararanos-campo2').val('');
			$('#filtro-indicador-actividad-compararanos-div').removeClass('hide');
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

$('#filtro-indicador-actividad-mesespecifico-campo1').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-actividad-mesespecifico-campo2').val();
	if ((value1!=null)&&(value2!=null))
		$('#submit-indicador-actividad').parent().removeClass('disabled');
	else
		$('#submit-indicador-actividad').parent().addClass('disabled');	
})

$('#filtro-indicador-actividad-mesespecifico-campo2').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-actividad-mesespecifico-campo1').val();
	if ((value1!=null)&&(value2!=null))
		$('#submit-indicador-actividad').parent().removeClass('disabled');
	else
		$('#submit-indicador-actividad').parent().addClass('disabled');	
})

$('#filtro-indicador-actividad-compararmeses-campo1').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-actividad-compararmeses-campo2').val();
	value3 = $('#filtro-indicador-actividad-compararmeses-campo3').val();
	value4 = $('#filtro-indicador-actividad-compararmeses-campo4').val();
	if ((value1!=null)&&(value2!=null)&&(value3!=null)&&(value4!=null))
		$('#submit-indicador-actividad').parent().removeClass('disabled');
	else
		$('#submit-indicador-actividad').parent().addClass('disabled');	
})

$('#filtro-indicador-actividad-compararmeses-campo2').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-actividad-compararmeses-campo1').val();
	value3 = $('#filtro-indicador-actividad-compararmeses-campo3').val();
	value4 = $('#filtro-indicador-actividad-compararmeses-campo4').val();
	if ((value1!=null)&&(value2!=null)&&(value3!=null)&&(value4!=null))
		$('#submit-indicador-actividad').parent().removeClass('disabled');
	else
		$('#submit-indicador-actividad').parent().addClass('disabled');	
})

$('#filtro-indicador-actividad-compararmeses-campo3').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-actividad-compararmeses-campo1').val();
	value3 = $('#filtro-indicador-actividad-compararmeses-campo2').val();
	value4 = $('#filtro-indicador-actividad-compararmeses-campo4').val();
	if ((value1!=null)&&(value2!=null)&&(value3!=null)&&(value4!=null))
		$('#submit-indicador-actividad').parent().removeClass('disabled');
	else
		$('#submit-indicador-actividad').parent().addClass('disabled');	
})

$('#filtro-indicador-actividad-compararmeses-campo4').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-actividad-compararmeses-campo1').val();
	value3 = $('#filtro-indicador-actividad-compararmeses-campo2').val();
	value4 = $('#filtro-indicador-actividad-compararmeses-campo3').val();
	if ((value1!=null)&&(value2!=null)&&(value3!=null)&&(value4!=null))
		$('#submit-indicador-actividad').parent().removeClass('disabled');
	else
		$('#submit-indicador-actividad').parent().addClass('disabled');	
})

$('#filtro-indicador-actividad-anoespecifico-campo1').change(function(){
	value1 = $(this).val();
	if ((value1!=null))
		$('#submit-indicador-actividad').parent().removeClass('disabled');
	else
		$('#submit-indicador-actividad').parent().addClass('disabled');	
})

$('#filtro-indicador-actividad-compararanos-campo1').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-actividad-compararanos-campo2').val();
	if ((value1!=null)&&(value2!=null))
		$('#submit-indicador-actividad').parent().removeClass('disabled');
	else
		$('#submit-indicador-actividad').parent().addClass('disabled');	
})

$('#filtro-indicador-actividad-compararanos-campo2').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-actividad-compararanos-campo1').val();
	if ((value1!=null)&&(value2!=null))
		$('#submit-indicador-actividad').parent().removeClass('disabled');
	else
		$('#submit-indicador-actividad').parent().addClass('disabled');	
})