
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

function ajax(){
	$.ajax({
		
	})
}