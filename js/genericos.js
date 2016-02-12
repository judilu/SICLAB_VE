var inicio = function()
{
	$('ul.tabs').tabs();
	$('select').material_select(); //agregado
	//Configuramos los eventos
	$("#btnSolicitudesAceptadas").on("click",solAceptadas);
}
$(document).on("ready",inicio);