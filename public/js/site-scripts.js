$(document).ready(function(){
	$(".button-collapse").sideNav();	
	$('.button-collapse').sideNav({
      menuWidth: 200, // Default is 240
      edge: 'left', // Choose the horizontal origin      
    });
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
	
})


$( ".usuario" ).on( "click", function() {
	id = $(this).attr('id');
	console.log(id);
	$('#cargar_usuario_username').val(id);
	$('#cargar_usuario').submit();
});
