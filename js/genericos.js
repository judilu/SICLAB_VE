var inicio = function()
{
	$('ul.tabs').tabs();
	$('select').material_select(); //agregado
	//Prestamos
	var prestamosPendientes = function()
	{
		$("#atenderSolicitud").hide();
		$("#solicitudesEnProceso").hide();
		$("#solicitudesPendientes").show("slow");
		$("#solicitudesPendientes2").show("slow");
	}
	var prestamosProceso = function()
	{
		$("#solicitudesPendientes").hide();
		$("#devolucionMaterial").hide();
		$("#alumnosSancionados").hide();
		$("#solicitudesEnProceso").show("slow");
		$("#solicitudesEnProceso2").show("slow");
	}
	var listaSanciones = function()
	{	
		$("#solicitudesPendientes").hide();
		$("#devolucionMaterial").hide();
		$("#solicitudesEnProceso").hide();
		$("#alumnosSancionados").show("slow");
		$("#listaSanciones2").show("slow");
	}
	var aplicaSancion = function()
	{		
		$("#devolucionMaterial2").hide();
		$("#aplicaSanciones").show("slow");
	}
	var devolucionMaterial = function()
	{		
		$("#solicitudesEnProceso2").hide();
		$("#aplicaSanciones").hide();
		$("#devolucionMaterial").show("slow");
		$("#devolucionMaterial2").show("slow");
	}
	//Laboratorios
	var sLaboratorioPendientes = function()
	{
		$("#sAceptadasLab").hide();
		$("#verMasSolicitud").hide();
		$("#sPendientesLab").show("slow");
		$("#solicitudesPendientesLab2").show("slow");
	}
	var sLaboratorioAceptadas = function()
	{
		$("#sPendientesLab").hide();
		$("#verMasSolicitud2").hide();
		$("#sAceptadasLab").show("slow");
		$("#solicitudesAceptadasLab2").show("slow");
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
	//Inventario
	var listaArticulos = function()
	{
		$("#altaArticulos").hide();
		$("#bajaArticulos").hide();
		$("#editar").hide();
		$("#peticionesPendientes").hide();
		$("#peticionesArticulos").hide();
		$("#listaArt").show("slow");
		$("#pantallaInventario").show("slow");
	}
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
	var editarArticulo = function()
	{		
		$("#listaArt").hide();
		$("#editar").show("slow");
	}
	
	//Prestamos
	$("#btnPendientes").on("click",prestamosPendientes);
	$("#btnEnProceso").on("click",prestamosProceso);
	$("#btnCancelarDevolucion").on("click",prestamosProceso);
	$("#btnListaSanciones").on("click",listaSanciones);
	$("#btnCancelarSolPendiente").on("click",prestamosPendientes);
	$("#btnAplicaSancion").on("click",aplicaSancion);
	$("#btnRegresarSancion").on("click",devolucionMaterial);
	$("#btnDevolucion").on("click",devolucionMaterial);
	//Laboratorios
	$("#btnPendientesLab").on("click",sLaboratorioPendientes);
	$("#btnAceptadasLab").on("click",sLaboratorioAceptadas);
	$("#btnRegresarVerMas").on("click",sLaboratorioPendientes);
	$("#btnRegresarVerMas2").on("click",sLaboratorioAceptadas);
	$("#btnVerMas").on("click",verMas);
	$("#btnVerMas2").on("click",verMas2);
	//Inventario
	$("#btnArticulos").on("click",listaArticulos);
	$("#btnEditarArt").on("click",editarArticulo);
	$("#btnRegresarEditarArt").on("click",listaArticulos);
	$("#btnAlta").on("click",altaArticulos);
	$("#btnBaja").on("click",bajaArticulos);
	$("#btnPeticionesPendientes").on("click",peticionesPendientesArt);
	$("#btnPeticionArticulo").on("click",peticionesArticulos);
	$("#btnAtender").on("click",atenderSolicitud);	
}
$(document).on("ready",inicio);