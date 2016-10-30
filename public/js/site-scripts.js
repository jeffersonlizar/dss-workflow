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
    	selectYears: 2, // Creates a dropdown of 15 years to control year
    	max: true
  	});
  	$('.datepickerperiodo1').pickadate({
    	selectMonths: true, // Creates a dropdown to control month
    	selectYears: 2, // Creates a dropdown of 15 years to control year
    	max: true
  	});
  	$('.datepickerperiodo2').pickadate({
		selectMonths: true, 
		selectYears: 2
	})
	$('.datepickerperiodo3').pickadate({
    	selectMonths: true, // Creates a dropdown to control month
    	selectYears: 2, // Creates a dropdown of 15 years to control year
    	max: true
  	});
  	$('.datepickerperiodo4').pickadate({
		selectMonths: true, 
		selectYears: 2
	})
  	
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
$('#filtro-indicador').change(function(){
	$('#submit-indicador').parent().addClass('disabled');	
	$('#filtro-indicador-dia-div').addClass('hide');
	$('#filtro-indicador-comparardias-div').addClass('hide');
	$('#filtro-indicador-mesespecifico-div').addClass('hide');
	$('#filtro-indicador-compararmeses-div').addClass('hide');
	$('#filtro-indicador-anoespecifico-div').addClass('hide');
	$('#filtro-indicador-compararanos-div').addClass('hide');
	$('#filtro-indicador-periodo-div').addClass('hide');
	$('#filtro-indicador-periodo-campo2').parent().addClass('hide');
	$('#filtro-indicador-crecimiento-periodos-div').addClass('hide');
	value = $(this).val();
	if((value=='hoy')||(value=='ayer')||(value=='mesactual')||(value=='anoactual')||(value=='crecimiento-hoy-ayer')||(value=='crecimiento-mactual-manterior')||(value=='crecimiento-aactual-aanterior')){
		$('#submit-indicador').parent().removeClass('disabled');
	}
	else{
		if (value=='dia'){
			$('#filtro-indicador-dia-campo').val('');
			$('#filtro-indicador-dia-div').removeClass('hide');
		}
		else if (value=='comparardias'){
			$('#filtro-indicador-comparardias-campo1').val('');
			$('#filtro-indicador-comparardias-campo2').val('');
			$('#filtro-indicador-comparardias-div').removeClass('hide');
		}
		else if (value=='mesespecifico'){
			var u = $('#filtro-indicador-mesespecifico-campo1').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-mesespecifico-campo1').siblings('input');
			$(i).val('Seleccione el mes');			
			var u = $('#filtro-indicador-mesespecifico-campo2').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-mesespecifico-campo2').siblings('input');
			$(i).val('Seleccione el año');
			$('#filtro-indicador-mesespecifico-campo1').val('');
			$('#filtro-indicador-mesespecifico-campo2').val('');
			$('#filtro-indicador-mesespecifico-div').removeClass('hide');
		}
		else if (value=='compararmeses'){
			var u = $('#filtro-indicador-compararmeses-campo1').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-compararmeses-campo1').siblings('input');
			$(i).val('Seleccione el mes');			
			var u = $('#filtro-indicador-compararmeses-campo2').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-compararmeses-campo2').siblings('input');
			$(i).val('Seleccione el año');
			var u = $('#filtro-indicador-compararmeses-campo3').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-compararmeses-campo3').siblings('input');
			$(i).val('Seleccione el mes');
			var u = $('#filtro-indicador-compararmeses-campo4').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-compararmeses-campo4').siblings('input');
			$(i).val('Seleccione el año');

			$('#filtro-indicador-compararmeses-campo1').val('');
			$('#filtro-indicador-compararmeses-campo2').val('');
			$('#filtro-indicador-compararmeses-campo3').val('');
			$('#filtro-indicador-compararmeses-campo4').val('');
			$('#filtro-indicador-compararmeses-div').removeClass('hide');
		}
		else if (value=='anoespecifico'){
			var u = $('#filtro-indicador-anoespecifico-campo1').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-anoespecifico-campo1').siblings('input');
			$(i).val('Seleccione el año');
			$('#filtro-indicador-anoespecifico-campo1').val('');
			$('#filtro-indicador-anoespecifico-div').removeClass('hide');
		}
		else if (value=='compararanos'){
			var u = $('#filtro-indicador-compararanos-campo1').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-compararanos-campo1').siblings('input');
			$(i).val('Seleccione el año');
			var u = $('#filtro-indicador-compararanos-campo2').siblings('ul');
			$(u).children().removeClass('active selected');
			var i = $('#filtro-indicador-compararanos-campo2').siblings('input');
			$(i).val('Seleccione el año');
			$('#filtro-indicador-compararanos-campo1').val('');
			$('#filtro-indicador-compararanos-campo2').val('');
			$('#filtro-indicador-compararanos-div').removeClass('hide');
		}
		else if (value=='periodo'){
			$('#filtro-indicador-periodo-campo1').val('');
			$('#filtro-indicador-periodo-campo2').val('');
			$('#filtro-indicador-periodo-div').removeClass('hide');
		}
		else if (value=='crecimiento-periodos'){
			$('#filtro-indicador-crecimiento-periodo-campo1').val('');
			$('#filtro-indicador-crecimiento-periodo-campo2').val('');
			$('#filtro-indicador-crecimiento-periodo-campo3').val('');
			$('#filtro-indicador-crecimiento-periodo-campo4').val('');
			$('#filtro-indicador-crecimiento-periodos-div').removeClass('hide');
		}
	}
})
$('#filtro-indicador-dia-campo').change(function(){
	value = $(this).val();
	if (value!='')
		$('#submit-indicador').parent().removeClass('disabled');
	else
		$('#submit-indicador').parent().addClass('disabled');	
})

$('#filtro-indicador-comparardias-campo1').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-comparardias-campo2').val();
	if ((value1!='')&&(value2!=''))
		$('#submit-indicador').parent().removeClass('disabled');
	else
		$('#submit-indicador').parent().addClass('disabled');	
})

$('#filtro-indicador-comparardias-campo2').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-comparardias-campo1').val();
	if ((value1!='')&&(value2!=''))
		$('#submit-indicador').parent().removeClass('disabled');
	else
		$('#submit-indicador').parent().addClass('disabled');	
})

$('#filtro-indicador-mesespecifico-campo1').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-mesespecifico-campo2').val();
	if ((value1!=null)&&(value2!=null))
		$('#submit-indicador').parent().removeClass('disabled');
	else
		$('#submit-indicador').parent().addClass('disabled');	
})

$('#filtro-indicador-mesespecifico-campo2').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-mesespecifico-campo1').val();
	if ((value1!=null)&&(value2!=null))
		$('#submit-indicador').parent().removeClass('disabled');
	else
		$('#submit-indicador').parent().addClass('disabled');	
})

$('#filtro-indicador-compararmeses-campo1').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-compararmeses-campo2').val();
	value3 = $('#filtro-indicador-compararmeses-campo3').val();
	value4 = $('#filtro-indicador-compararmeses-campo4').val();
	if ((value1!=null)&&(value2!=null)&&(value3!=null)&&(value4!=null))
		$('#submit-indicador').parent().removeClass('disabled');
	else
		$('#submit-indicador').parent().addClass('disabled');	
})

$('#filtro-indicador-compararmeses-campo2').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-compararmeses-campo1').val();
	value3 = $('#filtro-indicador-compararmeses-campo3').val();
	value4 = $('#filtro-indicador-compararmeses-campo4').val();
	if ((value1!=null)&&(value2!=null)&&(value3!=null)&&(value4!=null))
		$('#submit-indicador').parent().removeClass('disabled');
	else
		$('#submit-indicador').parent().addClass('disabled');	
})

$('#filtro-indicador-compararmeses-campo3').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-compararmeses-campo1').val();
	value3 = $('#filtro-indicador-compararmeses-campo2').val();
	value4 = $('#filtro-indicador-compararmeses-campo4').val();
	if ((value1!=null)&&(value2!=null)&&(value3!=null)&&(value4!=null))
		$('#submit-indicador').parent().removeClass('disabled');
	else
		$('#submit-indicador').parent().addClass('disabled');	
})

$('#filtro-indicador-compararmeses-campo4').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-compararmeses-campo1').val();
	value3 = $('#filtro-indicador-compararmeses-campo2').val();
	value4 = $('#filtro-indicador-compararmeses-campo3').val();
	if ((value1!=null)&&(value2!=null)&&(value3!=null)&&(value4!=null))
		$('#submit-indicador').parent().removeClass('disabled');
	else
		$('#submit-indicador').parent().addClass('disabled');	
})

$('#filtro-indicador-anoespecifico-campo1').change(function(){
	value1 = $(this).val();
	if ((value1!=null))
		$('#submit-indicador').parent().removeClass('disabled');
	else
		$('#submit-indicador').parent().addClass('disabled');	
})

$('#filtro-indicador-compararanos-campo1').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-compararanos-campo2').val();
	if ((value1!=null)&&(value2!=null))
		$('#submit-indicador').parent().removeClass('disabled');
	else
		$('#submit-indicador').parent().addClass('disabled');	
})

$('#filtro-indicador-compararanos-campo2').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-compararanos-campo1').val();
	if ((value1!=null)&&(value2!=null))
		$('#submit-indicador').parent().removeClass('disabled');
	else
		$('#submit-indicador').parent().addClass('disabled');	
})

$('#filtro-indicador-periodo-campo1').change(function(){
	$('#filtro-indicador-periodo-campo2').parent().addClass('hide');
	value1 = $(this).val();
	$('#filtro-indicador-periodo-campo2').val('');
	value2 = $('#filtro-indicador-periodo-campo2').val();
	if (value1!=''){
		fecha = value1.split("/");
		d = new Date();
		var $input = $('.datepickerperiodo2').pickadate()
		var picker = $input.pickadate('picker');
		picker.set('min', new Date(fecha[2],(fecha[1]-1),fecha[0]));
		picker.set('max', new Date(d.getFullYear(),d.getMonth(),d.getDate()));
		$('#filtro-indicador-periodo-campo2').parent().removeClass('hide');
	}else{		
		$('#filtro-indicador-periodo-campo2').parent().addClass('hide');
		$('#filtro-indicador-periodo-campo2').val('');
	}
	if ((value1!='')&&(value2!=''))
		$('#submit-indicador').parent().removeClass('disabled');
	else
		$('#submit-indicador').parent().addClass('disabled');	
})

$('#filtro-indicador-periodo-campo2').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-periodo-campo1').val();
	if ((value1!='')&&(value2!=''))
		$('#submit-indicador').parent().removeClass('disabled');
	else
		$('#submit-indicador').parent().addClass('disabled');	
})

$('#filtro-indicador-crecimiento-periodo-campo1').change(function(){
	$('#filtro-indicador-crecimiento-periodo-campo2').parent().addClass('hide');
	value1 = $(this).val();
	$('#filtro-indicador-crecimiento-periodo-campo2').val('');
	value2 = $('#filtro-indicador-crecimiento-periodo-campo2').val();
	if (value1!=''){
		fecha = value1.split("/");
		d = new Date();
		var $input = $('.datepickerperiodo2').pickadate()
		var picker = $input.pickadate('picker');
		picker.set('min', new Date(fecha[2],(fecha[1]-1),fecha[0]));
		picker.set('max', new Date(d.getFullYear(),d.getMonth(),d.getDate()));
		$('#filtro-indicador-crecimiento-periodo-campo2').parent().removeClass('hide');
	}else{		
		$('#filtro-indicador-crecimiento-periodo-campo2').parent().addClass('hide');
		$('#filtro-indicador-crecimiento-periodo-campo2').val('');
	}
	if ((value1!='')&&(value2!=''))
		$('.crecimientoperiodo2').removeClass('hide');
	else{
		$('.crecimientoperiodo2').addClass('hide');
		$('#filtro-indicador-crecimiento-periodo-campo3').val('');
		$('#filtro-indicador-crecimiento-periodo-campo4').val('');
	}
})

$('#filtro-indicador-crecimiento-periodo-campo2').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-crecimiento-periodo-campo1').val();
	if ((value1!='')&&(value2!=''))
		$('.crecimientoperiodo2').removeClass('hide');
	else{
		$('.crecimientoperiodo2').addClass('hide');
		$('#filtro-indicador-crecimiento-periodo-campo3').val('');
		$('#filtro-indicador-crecimiento-periodo-campo4').val('');
	}
})

$('#filtro-indicador-crecimiento-periodo-campo3').change(function(){
	$('#filtro-indicador-crecimiento-periodo-campo4').parent().addClass('hide');
	value1 = $(this).val();
	$('#filtro-indicador-crecimiento-periodo-campo4').val('');
	value2 = $('#filtro-indicador-crecimiento-periodo-campo4').val();
	if (value1!=''){
		fecha = value1.split("/");
		d = new Date();
		var $input = $('.datepickerperiodo4').pickadate()
		var picker = $input.pickadate('picker');
		picker.set('min', new Date(fecha[2],(fecha[1]-1),fecha[0]));
		picker.set('max', new Date(d.getFullYear(),d.getMonth(),d.getDate()));
		$('#filtro-indicador-crecimiento-periodo-campo4').parent().removeClass('hide');
	}else{		
		$('#filtro-indicador-crecimiento-periodo-campo4').parent().addClass('hide');
		$('#filtro-indicador-crecimiento-periodo-campo4').val('');
	}
	if ((value1!='')&&(value2!=''))
		$('#submit-indicador').parent().removeClass('disabled');
	else
		$('#submit-indicador').parent().addClass('disabled');	
})

$('#filtro-indicador-crecimiento-periodo-campo4').change(function(){
	value1 = $(this).val();
	value2 = $('#filtro-indicador-crecimiento-periodo-campo3').val();
	if ((value1!='')&&(value2!=''))
		$('#submit-indicador').parent().removeClass('disabled');
	else
		$('#submit-indicador').parent().addClass('disabled');	
})