
mostrarhora();
function mostrarhora(){ 
	var f=new Date();
	dia = f.getDate();
	if (dia<10)
		dia = '0'+dia;
	mes = f.getMonth();
	mes++;
	if (mes<10)
		mes = '0'+mes;
	ano = f.getFullYear();
	hora = f.getHours();
	if (hora<10)
		hora = '0'+hora;
	minuto = f.getMinutes();
	if (minuto<10)
		minuto = '0'+minuto;
	segundo = f.getSeconds();
	if (segundo<10)
		segundo = '0'+segundo;
	cad=dia+'/'+mes+'/'+ano +' '+hora+":"+minuto+":"+segundo; 
	$('#fecha').text(cad);
	setTimeout("mostrarhora()",1000); 
}


$('#cargarpdf').click(function(){
	url='http://localhost/tesisdss/reportes/reporte_actividad/2016-09-10/2016-09-30';
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 		window.open(url);
	}
	$(".iframepdf").html("<iframe width='100%' height='450' src="+url+"></iframe>");  
})


/*-------------- vista indicadores/duracion flujos de trabajo----------------*/
function reiniciar_act_usr(){
	var u = $('#filtro-indicador1').siblings('ul');
	$(u).children().removeClass('active selected');
	var i = $('#filtro-indicador1').siblings('input');
	$(i).val('Seleccione una opción');
	$('#submit-indicador').parent().addClass('disabled');	
	$('#filtro-indicador-dia-div').addClass('hide');
	$('#filtro-indicador-mesespecifico-div').addClass('hide');
	$('#filtro-indicador-anoespecifico-div').addClass('hide');
	$('#filtro-indicador-periodo-div').addClass('hide');
	$('#filtro-indicador-periodo-campo2').parent().addClass('hide');
}

indicador_act_wrk = ubicacion.indexOf("duracion_flujos");
indicador_act_tran = ubicacion.indexOf("duracion_transicion");
alarmas = ubicacion.indexOf("alarmas");
if ((indicador_act_wrk!=-1)||(indicador_act_tran!=-1)||(alarmas!=-1)){
	reiniciar_act_usr();
	$('#ajax-tipousuario1').empty();
	$('#ajax-tipousuario1').append('<option value="" disabled selected>Seleccione una opción</option>');
	$('#ajax-tipousuario1').append('<option value=all>Todos</option>');
	$.ajax({
		url: servidor+"indicadores/filtro/tipousuario/-1",
		dataType: "json",
		async: true,
		success: function(data){
			$.each( data, function( key, value ) {
				  	$('#ajax-tipousuario1').append('<option value='+value.id_tipo+'>'+value.descripcion+'</option>');
				});	
			$("#ajax-tipousuario1").material_select();
		},
		error: function (error){
			console.log(error);
		}
	})
}


$('#ajax-tipousuario1').change(function(){
	reiniciar_act_usr();
	$('.filtroajax-usuario1-div').addClass('hide');
	$('.filtroajax-workflow1-div').addClass('hide');
	$('.filtroajax-instancia1-div').addClass('hide');
	$('.filtro-periodo1').addClass('hide');
	value = $(this).val();
	$('.filtroajax-usuario1-div').removeClass('hide');
	$('#ajax-usuario1').empty();
	$('#ajax-usuario1').append('<option disabled selected value>Seleccione una opción</option>');
	$('#ajax-usuario1').append('<option value=all>Todos</option>');
	$.ajax({
		url: servidor+"indicadores/filtro/usuario/"+value,
		dataType: "json",
		async: true,
		success: function(data){
			$.each( data, function( key, value ) {
				  	$('#ajax-usuario1').append('<option value='+value.id_usuario+'>'+value.id_usuario+'</option>');
			});
			$("#ajax-usuario1").material_select();
		},
		error: function (data){
			console.log(data);	
		}
	})
})


$('#ajax-usuario1').change(function(){
	reiniciar_act_usr();
	$('.filtroajax-workflow1-div').removeClass('hide');
	$('.filtroajax-instancia1-div').addClass('hide');
	$('.filtro-periodo1').addClass('hide');
	$('#ajax-workflow1').empty();
	$('#ajax-workflow1').append('<option disabled selected value>Seleccione una opción</option>');
	tipousuario = $('#ajax-tipousuario1').val();
	if (indicador_act_tran==-1){
		$('#ajax-workflow1').append('<option value=all>Todos</option>');
		$.ajax({
			url: servidor+"indicadores/filtro/workflow/-1",
			dataType: "json",
			async: true,
			success: function(data){
				$.each( data, function( key, value ) {
				  	$('#ajax-workflow1').append('<option value='+value.id_workflow+'>'+value.nombre+'</option>');
				});
				$("#ajax-workflow1").material_select();
			},
			error: function (data){
				console.log(data);	
			}
		})
	}
	else{
		$('#ajax-workflow1').append('<option value=all>Todas</option>');
		$.ajax({
			url: servidor+"indicadores/filtro/transicion/"+tipousuario,
			dataType: "json",
			async: true,
			success: function(data){
				$.each( data, function( key, value ) {
				  	$('#ajax-workflow1').append('<option value='+value.id_transicion+'>'+value.nombre+'</option>');
				});
				$("#ajax-workflow1").material_select();
			},
			error: function (data){
				console.log(data);	
			}
		})
	}
	
})


$('#ajax-workflow1').change(function(){
	reiniciar_act_usr();
	workflow = $('#ajax-workflow1').val();
	value = $(this).val();
	if (alarmas=='-1'){
		$('.filtro-periodo1').removeClass('hide');	
	}
	else{
		$('.filtroajax-instancia1-div').removeClass('hide');
		$('#ajax-instancia1').empty();
		$('#ajax-instancia1').append('<option disabled selected value>Seleccione una opción</option>');
		$('#ajax-instancia1').append('<option value=all>Todas</option>');
		$.ajax({
			url: servidor+"indicadores/filtro/instancia/"+workflow,
			dataType: "json",
			async: true,
			success: function(data){
				$.each( data, function( key, value ) {
				  	$('#ajax-instancia1').append('<option value='+value.id_instancia+'>'+value.titulo+'</option>');
				});
				$("#ajax-instancia1").material_select();
			},
			error: function (data){
				console.log(data);	
			}
		})
	}
})

$('#ajax-instancia1').change(function(){
	if (alarmas!='-1'){
		$('.rango-div').removeClass('hide');	
	}
})
$('#rangodias').change(function(){
	value = $(this).val();
	if (alarmas!='-1'){
		if (value>0){
			name = $('#name').val();
			if (name!=''){
				$('#submit-indicador').parent().removeClass('disabled');		
			}
		}
	}
})

$('#name').change(function(){
	value = $(this).val();
	if (alarmas!='-1'){
		if (value!=''){
			rango = $('#rangodias').val();
			if (rango>0){
				$('#submit-indicador').parent().removeClass('disabled');		
			}
		}
		else{
			$('#submit-indicador').parent().addClass('disabled');		
		}
	}	
})

$(document).keypress(function(e){
	if (alarmas!=-1)
		if (e.which == 13)
			e.preventDefault();

})

/*-------------- vista indicadores/actividad usuario----------------*/


indicador_act_user = ubicacion.indexOf("actividad_usuario");
if (indicador_act_user!=-1){
	$('#ajax-tipousuario').empty();
	$('#ajax-tipousuario').append('<option value="" disabled selected>Seleccione una opción</option>');
	$('#ajax-tipousuario').append('<option value=all>Todos</option>');
	$.ajax({
		url: servidor+"indicadores/filtro/tipousuario/-1",
		dataType: "json",
		async: true,
		success: function(data){
			$.each( data, function( key, value ) {
				  	$('#ajax-tipousuario').append('<option value='+value.id_tipo+'>'+value.descripcion+'</option>');
				});	
			$("#ajax-tipousuario").material_select();
		},
		error: function (error){
			console.log(error);
		}
	})

	$('#ajax-tipousuario2').empty();
	$('#ajax-tipousuario2').append('<option value="" disabled selected>Seleccione una opción</option>');
	$('#ajax-tipousuario2').append('<option value=all>Todos</option>');
	$.ajax({
		url: servidor+"indicadores/filtro/tipousuario/-1",
		dataType: "json",
		async: true,
		success: function(data){
			$.each( data, function( key, value ) {
				  	$('#ajax-tipousuario2').append('<option value='+value.id_tipo+'>'+value.descripcion+'</option>');
				});	
			$("#ajax-tipousuario2").material_select();
		},
		error: function (error){
			console.log(error);
		}
	})
}

$('#ajax-tipousuario').change(function(){
	value = $(this).val();
	$('.filtroajax-usuario-div').removeClass('hide');
	$('#ajax-usuario').empty();
	$('#ajax-usuario').append('<option disabled selected value>Seleccione una opción</option>');
	$.ajax({
		url: servidor+"indicadores/filtro/usuario/"+value,
		dataType: "json",
		async: true,
		success: function(data){
			$.each( data, function( key, value ) {
				  	$('#ajax-usuario').append('<option value='+value.id_usuario+'>'+value.id_usuario+'</option>');
			});
			$("#ajax-usuario").material_select();
		},
		error: function (data){
			console.log(data);	
		}
	})
})

$('#ajax-tipousuario2').change(function(){
	value = $(this).val();
	$('.filtroajax-usuario-div2').removeClass('hide');
	$('#ajax-usuario2').empty();
	$('#ajax-usuario2').append('<option disabled selected value>Seleccione una opción</option>');
	$.ajax({
		url: servidor+"indicadores/filtro/usuario/"+value,
		dataType: "json",
		async: true,
		success: function(data){
			$.each( data, function( key, value ) {
				  	$('#ajax-usuario2').append('<option value='+value.id_usuario+'>'+value.id_usuario+'</option>');
			});
			$("#ajax-usuario2").material_select();
		},
		error: function (data){
			console.log(data);	
		}
	})
})