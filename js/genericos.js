var inicio = function()
{
	$('ul.tabs').tabs();
	$('select').material_select(); //agregado
	var prestamosPendientes = function()
	{
		$("#solicitudesEnProceso").hide();
		$("#solicitudesPendientes").show("slow");
	}
	var prestamosProceso = function()
	{
		console.log("entro");
		$("#solicitudesPendientes").hide();
		$("#solicitudesEnProceso").show("slow");
	}
	//Configuramos los eventos
	$("#btnPendientes").on("click",prestamosPendientes);
	$("#btnEnProceso").on("click",prestamosProceso);
}
$(document).on("ready",inicio);