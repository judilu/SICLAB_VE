var inicio = function ()
{
	$('ul.tabs').tabs();
	$('select').material_select(); //agregado
	var solAceptadas = function ()
	{
		$("#sNuevaMaestro").hide();
		$("#sPendientesMaestro").hide();
		$("#sAceptadasMaestro").show("");
	}
	var solPendientes = function()
	{
		$("#sNuevaMaestro").hide();
		$("#sAceptadasMaestro").hide();
		$("#sPendientesMaestro").show("");	
	}
	var solNueva = function()
	{
		$("#sAceptadasMaestro").hide();
		$("#sPendientesMaestro").hide();
		$("#sNuevaMaestro").show("");
	}
	//Configuramos los eventos
	$("#btnSolicitudesAceptadas").on("click",solAceptadas);
	$("#btnSolicitudesPendientes").on("click",solPendientes);
	$("#btnNuevaSolicitud").on("click",solNueva);
}
$(document).on("ready",inicio);