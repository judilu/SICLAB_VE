var inicio = function()
{
	$('.collapsible').collapsible({
      accordion : false
    });
	$('ul.tabs').tabs();
	$('select').material_select(); //agregado
	var prestamosPendientes = function()
	{
		$("#solicitudesEnProceso").hide();
		$("#solicitudesPendientes").show("slow");
	}
	var prestamosProceso = function()
	{
		$("#solicitudesPendientes").hide();
		$("#solicitudesEnProceso").show("slow");
	}
	var sLaboratorioPendientes = function()
	{
		$("#sAceptadasLab").hide();
		$("#sPendientesLab").show("slow");
	}
	var sLaboratorioAceptadas = function()
	{
		$("#sPendientesLab").hide();
		$("#sAceptadasLab").show("slow");
	}
	var listaArticulos = function()
	{
		$("#altaArticulos").hide();
		$("#bajaArticulos").hide();
		$("#peticionesPendientes").hide();
		$("#peticionesArticulos").hide();
		$("#pantallaInventario").show("slow");
	}
	//Inventario
	var altaArticulos = function()
	{
		$("#pantallaInventario").hide();
		$("#bajaArticulos").hide();
		$("#peticionesPendientes").hide();
		$("#peticionesArticulos").hide();
		$("#altaArticulos").show("slow");
	}
	var bajaArticulos = function()
	{
		$("#altaArticulos").hide();
		$("#pantallaInventario").hide();
		$("#peticionesPendientes").hide();
		$("#peticionesArticulos").hide();
		$("#bajaArticulos").show("slow");
	}
	var peticionesPendientesArt = function()
	{
		$("#altaArticulos").hide();
		$("#pantallaInventario").hide();
		$("#bajaArticulos").hide();
		$("#peticionesArticulos").hide();
		$("#peticionesPendientes").show("slow");
	}
	var peticionesArticulos = function()
	{
		$("#altaArticulos").hide();
		$("#pantallaInventario").hide();
		$("#bajaArticulos").hide();
		$("#peticionesPendientes").hide();
		$("#peticionesArticulos").show("slow");
	}
	var atenderSolicitud = function()
	{		
		$("#solicitudesPendientes2").hide();
		$("#atenderSolicitud").show("slow");
	}
	var verMas = function()
	{		
		$("#solicitudesPendientesLab2").hide();
		$("#verMasSolicitud").show("slow");
	}
	var verMas2 = function()
	{		
		$("#solicitudesAceptadasLab2").hide();
		$("#verMasSolicitud2").show("slow");
	}
	var editarArticulo = function()
	{		
		$("#listaArt").hide();
		$("#editar").show("slow");
	}
	$("#btnPendientes").on("click",prestamosPendientes);
	$("#btnEnProceso").on("click",prestamosProceso);
	$("#btnPendientesLab").on("click",sLaboratorioPendientes);
	$("#btnAceptadasLab").on("click",sLaboratorioAceptadas);
	$("#btnArticulos").on("click",listaArticulos);
	$("#btnAlta").on("click",altaArticulos);
	$("#btnBaja").on("click",bajaArticulos);
	$("#btnPeticionesPendientes").on("click",peticionesPendientesArt);
	$("#btnPeticionArticulo").on("click",peticionesArticulos);
	$("#btnAtender").on("click",atenderSolicitud);	
	$("#btnVerMas").on("click",verMas);
	$("#btnEditarSolicitudLab").on("click",verMas2);
	$("#btnEditarArt").on("click",editarArticulo);

}
$(document).on("ready",inicio);