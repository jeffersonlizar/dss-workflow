var cont=0,aux = 0;
function eliminar(codigo)
{
	cont=cont-1;
	var button = $('#button'+codigo);
	var input_cantidad = $('#cant'+codigo);
	var price = button.attr('price');//.substring(1);
	var cantidad = input_cantidad.val();
	var fila = $('#fila'+codigo);
	var total = price*aux;
	var total_pagar = $('#total_pagar');
	//document.write('<p>cantidad: ' + cantidad+ '<br>total: ' + total+ '<br>aux: ' + aux+'</p>');
	fila.remove();
	button.removeAttr('disabled');
	input_cantidad.removeAttr('disabled');
	input_cantidad.val('1');
	if (cont==0)
	{
		document.getElementById("pedir").disabled = true;	
	}
	total_pagar.text(parseFloat(total_pagar.text())-parseFloat(total));
}

function agregar(producto)
{
	cont=cont+1;	
	var codigo = producto.value;
	var button = $('#button'+codigo);//# = por id
	var input_cantidad = $('#cant'+codigo);
	var total_pagar = $('#total_pagar');
	var nombre = producto.innerHTML;
	var tipo = button.attr('tipo');
	var price = button.attr('price');//.substring(1);//Eliminar $
	var cantidad = input_cantidad.val();
	aux = cantidad;
	if(cantidad > 10)
	{
		alert('ERROR');
		location.reload(true);
		window.StopWhateverBelow();
	}
	var total = price*cantidad;
	var btn_eliminar = ' <button  type = "button" class = "btn btn-danger" onClick="eliminar('+codigo+')">Eliminar</button>';
	var oculto_cod = '<input type="hidden" name='+codigo.concat("c")+' value='+codigo+' />';
	var oculto_nom = '<input type="hidden" name='+codigo.concat("n")+' value='+nombre+' />';
	var oculto_cant = '<input type="hidden" name='+codigo.concat("cant")+' value='+cantidad+' />';
	var oculto_precio = '<input type="hidden" name='+codigo.concat("pre")+' value='+price+' />';
	var oculto_total = '<input type="hidden" name='+codigo.concat("t")+' value='+total+' />';
	
	$('#myTable tr:last').after(
	'<tr id="fila'+codigo+'">'+
		'<td>'+codigo+'</td>'+
		'<td>'+tipo+' '+nombre+'</td>'+
		'<td>'+cantidad+'</td>'+
		'<td>'+price+'</td>'+
		'<td>'+total+'</td>'+
		'<td>'+btn_eliminar+'</td>'+
		+ oculto_cod 
		+ oculto_cod 
		+ oculto_nom 
		+ oculto_cant 
		+ oculto_precio 
		+ oculto_total +
	'</tr>');
	
	button.attr('disabled','disabled');
	input_cantidad.val('1');
	input_cantidad.attr('disabled','disabled');
	document.getElementById("pedir").disabled = false;	
	total_pagar.text(parseFloat(total_pagar.text())+parseFloat(total));
}
