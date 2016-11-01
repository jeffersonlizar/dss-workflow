
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

function ajax_workflow(){
	$('.ajax-workflow').empty();
	$('.ajax-workflow').append('<option disabled selected value>Seleccione una opción</option>');
	$('.ajax-workflow').append('<option value=all>Todos</option>');
	$.ajax({
		url: servidor+"indicadores/filtro/workflow/-1",
		dataType: "json",
		async: true,
		success: function(data){
			$.each( data, function( key, value ) {
			  	$('.ajax-workflow').append('<option value='+value.id_workflow+'>'+value.nombre+'</option>');
			});
		},
		error: function (data){
			console.log(data);	
		}
	})
}

$('.ajax-workflow').change(function(){
	value = $(this).val();
	$('.ajax-instancia').empty();
	$('.ajax-tipousuario').empty();
	$('.ajax-usuario').empty();
	$('.ajax-instancia').append('<option disabled selected value>Seleccione una opción</option>');
	$('.ajax-instancia').append('<option value=all>Todas</option>');
	$.ajax({
		url: servidor+"indicadores/filtro/instancia/"+value,
		dataType: "json",
		async: true,
		success: function(data){
			$.each( data, function( key, value ) {
			  	$('.ajax-instancia').append('<option value='+value.id_instancia+'>'+value.titulo+'</option>');
			});
		},
		error: function (data){
			console.log(data);	
		}
	})
})

$('.ajax-instancia').change(function(){
	$('.ajax-tipousuario').empty();
	$('.ajax-tipousuario').append('<option disabled selected value>Seleccione una opción</option>');
	$('.ajax-tipousuario').append('<option value=all>Todos</option>');
	$.ajax({
		url: servidor+"indicadores/filtro/tipousuario/-1",
		dataType: "json",
		async: true,
		success: function(data){
			console.log(data);
			$.each( data, function( key, value ) {
				  	$('.ajax-tipousuario').append('<option value='+value.id_tipo+'>'+value.descripcion+'</option>');
				});
		},
		error: function (data){
			console.log(data);	
		}
	})
})


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
}

$('#ajax-tipousuario').change(function(){
	value = $(this).val();
	$('.filtroajax-usuario-div').removeClass('hide');
	$('#ajax-usuario').empty();
	$('#ajax-usuario').append('<option disabled selected value>Seleccione una opción</option>');
	$('#ajax-usuario').append('<option value=all>Todos</option>');
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

function ajax_usuario(value){
	$.ajax({
		url: servidor+"indicadores/filtro/usuario/"+value,
		dataType: "json",
		async: true,
		success: function(data){
			console.log(data);
		},
		error: function (data){
			console.log(data);	
		}
	})
}

$('#cargarpdf').click(function(){
	url='http://localhost/tesisdss/reportes/reporte_actividad/2016-09-10/2016-09-30';
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 		window.open(url);
	}
	$(".iframepdf").html("<iframe width='100%' height='450' src="+url+"></iframe>");  
})