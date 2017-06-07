
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
	//cad=dia+'/'+mes+'/'+ano +' '+hora+":"+minuto+":"+segundo; 
	cad=dia+'/'+mes+'/'+ano +' '+formatAMPM(f); 
	$('#fecha').text(cad);
	$('#fecha2').text(cad);
	setTimeout("mostrarhora()",1000); 
}

function formatAMPM(date){
	var hours = date.getHours();
	var minutes = date.getMinutes();
	var seconds = date.getSeconds();
	var ampm = hours >=12 ? 'pm' : 'am';
	hours = hours % 12;
	hours = hours ? hours : 12;
	minutes = minutes < 10 ? '0'+minutes : minutes;
	seconds = seconds < 10 ? '0'+seconds : seconds;
	var strTime = hours + ':' + minutes +':' + seconds + ' ' + ampm;
	return strTime;
}

indicador_act_wrk = ubicacion.indexOf("duracion_flujos");
indicador_act_tran = ubicacion.indexOf("duracion_transicion");
alarmas = ubicacion.indexOf("alarmas");
categoria = ubicacion.indexOf("categoria");
detalle = ubicacion.indexOf("detalle");





/*-------------- reportes ----------------*/



if ((categoria!=-1)){
	
	$.ajax({
		url: servidor+"indicadores/filtro/categorias/-1",
		dataType: "json",
		async: true,
		success: function(data){
			$.each( data, function( key, value ) {
				  	$('#ajax-categoria').append('<option value='+value.id_categoria+'>'+value.descripcion+'</option>');
				});	
			$("#ajax-categoria").material_select();
			
		},
		error: function (error){
			console.log(error);
		}
	})
}
if ((detalle!=-1)){
	$('#name_search').focus();

}
var pos=0;
var tot;

$('#name_search').blur(function(e){
	$('#livesearch').html('').css('border','0px');
	pos=0;
})

$('#name_search').keypress(function(e){
	if (e.which == 13){
		e.preventDefault();
		if (pos>0){
			var element = "#livesearch-item"+pos;
			var data = $(element).html();
			var pk = $(element).attr('pk');

			$('#id_instancia').val(pk);
			$('#name_search').val(data);
			$('#livesearch').html('').css('border','0px');
			$('#id_instancia').focus();
		}
	}
})

$('#name_search').keyup(function(e){
	if (e.which == 40){
		var previous = "#livesearch-item"+pos;
		if (pos <= tot-2){
			pos++;
			var next = "#livesearch-item"+pos;
			$(previous).removeClass('hovered');
			$(next).addClass('hovered');
		}
	}
	else if (e.which == 38){
		var next = "#livesearch-item"+pos;
		if (pos > 0){
			pos--;
			var previous = "#livesearch-item"+ pos;
			$(next).removeClass('hovered');
			$(previous).addClass('hovered');	
		}
	}
	else{
		pos = 0;
		var value = $(this).val();
		$.ajax({
			url: servidor+"indicadores/filtro/nombre/-1",
			data:{'nombre':value},
			dataType: "json",
			async: true,
			success: function(data){
				$('#livesearch').html('').css('border','0px');
				if (value.length > 0){
					var i = 1;
					$('#livesearch').css('border','1px solid #A5ACB2');
					$.each( data, function( key, value ) {
						var id = "livesearch-item"+i++;
						$('#livesearch').append('<p class="livesearch-item" id="'+id+'" pk="'+value.id_instancia+'">'+value.titulo+'</p>');
					});
					tot = i;		
				}
			},
			error: function (error){
				console.log(error);
			}
		})	
	}
})

$(document).on('click','.livesearch-item',function(){
	var pk = $(this).attr('pk');
	var value = $(this).html();
	$('#id_instancia').val(pk);
	$('#name_search').val(value);
	$('#livesearch').html('').css('border','0px');
})
	


/*-------------- eliminar alarmas ----------------*/


function mostrarDelete() {
	alarmas = $('.eliminaralarma');
	$.each( alarmas, function( key, value ) {
	  	id = value.id;
	  	nombre = id.split('-');
	  	div = '#'+nombre[0]; 
	  	pos = 0;
	  	pos = $(div).position();
	  	width = $(div).width();
	  	wdocu = $(document).width();
  		tope = pos.top+38;
  		left = pos.left+width-20;
	  	$(this).css({'top':tope+'px','left':left+'px'});
	  	$(this).removeClass('hide');	 
	});		
}


	
 $('.eliminaralarma').click(function(){
 	id = $(this).attr('id');
 	nombre = $(this).attr('name');
 	tipo = $(this).attr('type');
	pk = id.split('-');
	option = confirm('Al eliminar la alarma "'+nombre+'" eliminará todas las notificaciones activadas.\n¿Está seguro?')
	if (option){
		$('#id').val(pk[1]);
		$('#tipo').val(tipo);
		$('#id').val(pk[1]);
		$('#formeliminar').submit();
	}
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
			if (alarmas!=-1){
				mostrarDelete();
			}
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
			if (alarmas!=-1){
				mostrarDelete();
			}
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
				if (alarmas!=-1){
					mostrarDelete();
				}
			},
			error: function (data){
				console.log(data);	
			}
		})
	}
	else{
		$('#ajax-workflow1').append('<option value=all>Todas</option>');
		$.ajax({
			url: servidor+"indicadores/filtro/transiciones/"+tipousuario,
			dataType: "json",
			async: true,
			success: function(data){
				$.each( data, function( key, value ) {
				  	$('#ajax-workflow1').append('<option value='+value.id_transicion+'>'+value.nombre+'</option>');
				});
				$("#ajax-workflow1").material_select();
				if (alarmas!=-1){
					mostrarDelete();
				}
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
				if (alarmas!=-1){
					mostrarDelete();
				}
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
		if (alarmas!=-1){
				mostrarDelete();
			}	
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
reportes = ubicacion.indexOf("reportes");
if ((indicador_act_user!=-1)||(reportes!=-1)){
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