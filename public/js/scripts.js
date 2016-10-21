
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


function ajax_tipousuario(){
	$('.ajax-tipousuario').empty();
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
}



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