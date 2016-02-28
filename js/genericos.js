//document.write("<script type='text/javascript' src='../js/usuarios.js'></script>");
var inicio = function()
{
	$('ul.tabs').tabs();
	$('select').material_select(); //agregado
	$('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
	//Prestamos
	var prestamosPendientes = function()
	{
		$("#atenderSolicitud").hide("slow");
		$("#alumnosSancionados").hide("slow");
		$("#solicitudesEnProceso").hide("slow");
		$("#solicitudesPendientes").show("slow");
		$("#solicitudesPendientes2").show("slow");
	}
	var prestamosProceso = function()
	{
		$("#solicitudesPendientes").hide("slow");
		$("#devolucionMaterial").hide("slow");
		$("#alumnosSancionados").hide("slow");
		$("#solicitudesEnProceso").show("slow");
		$("#solicitudesEnProceso2").show("slow");
	}
	var listaSanciones = function()
	{	
		$("#solicitudesPendientes").hide("slow");
		$("#devolucionMaterial").hide("slow");
		$("#solicitudesEnProceso").hide("slow");
		$("#alumnosSancionados").show("slow");
		$("#listaSanciones2").show("slow");
	}
	var aplicaSancion = function()
	{		
		$("#devolucionMaterial2").hide("slow");
		$("#aplicaSanciones").show("slow");
	}
	var devolucionMaterial = function()
	{		
		$("#solicitudesEnProceso2").hide("slow");
		$("#aplicaSanciones").hide("slow");
		$("#devolucionMaterial").show("slow");
		$("#devolucionMaterial2").show("slow");
	}
	//Laboratorios
	var sLaboratorioPendientes = function()
	{
		$("#sAceptadasLab").hide("slow");
		$("#verMasSolicitud").hide("slow");
		$("#sPendientesLab").show("slow");
		$("#solicitudesPendientesLab2").show("slow");
	}
	var sLaboratorioAceptadas = function()
	{
		$("#sPendientesLab").hide("slow");
		$("#verMasSolicitud2").hide("slow");
		$("#sAceptadasLab").show("slow");
		$("#solicitudesAceptadasLab2").show("slow");
	}
	var verMas = function()
	{		
		$("#solicitudesPendientesLab2").hide("slow");
		$("#verMasSolicitud").show("slow");
	}
	var verMas2 = function()
	{		
		$("#solicitudesAceptadasLab2").hide("slow");
		$("#verMasSolicitud2").show("slow");
	}
	//Inventario
	var listaArticulos = function()
	{
		$("#altaArticulos").hide("slow");
		$("#bajaArticulos").hide("slow");
		$("#mantenimientoArticulos").hide("slow");
		$("#editar").hide("slow");
		$("#peticionesPendientes").hide("slow");
		$("#peticionesArticulos").hide("slow");
		$("#listaArt").show("slow");
		$("#pantallaInventario").show("slow");
	}
	var altaArticulos = function()
	{
		$("#pantallaInventario").hide("slow");
		$("#bajaArticulos").hide("slow");
		$("#mantenimientoArticulos").hide("slow");
		$("#peticionesPendientes").hide("slow");
		$("#peticionesArticulos").hide("slow");
		$("#altaArticulos").show("slow");

		var parametros = "opc=comboBoxAlta1"+
		"&id="+Math.random();
		$.ajax({
			cache:false,
			type: "POST",
			dataType: "json",
			url:'../data/genericos.php',
			data: parametros,
			success: function(response){
			if(response.respuesta == true)
				{
					$("#cmbNombreArt").append(response.option);
				}
				else
					alert("No hay materiales");
			},
			error: function(xhr, ajaxOptions,x){
				alert("Error de conexión");
				console.log(xhr);
			}
		});
	}
	var altaInventario = function()
	{
		if(($("#txtCodigoBarras").val())!=' ' && ($("#txtModeloArt").val())!= ' ')
		{
			//aqui empieza todo
       		//var cveUsuario = usuarioNombre();
       		var imagen						= $("#txtImagenAlta").val();
			var identificadorArticulo		= $("#txtCodigoBarrasAlta").val();
			var modelo 						= $("#txtModeloArtAlta").val();
			var numeroSerie 				= $("#txtNumSerieAlta").val();
			var claveArticulo				= $("#cmbNombreArt").val();//ocupo sacar el valor del select
			var marca						= $("#txtMarcaArtAlta").val();
			var tipoContenedor 				= $("#txtTipoContenedorAlta").val();
			var descripcionArticulo			= $("#txtDescripcionArtAlta").val();
			var descripcionUso				= $("#txtDescripcionUsoAlta").val();
			var unidadMedida 				= $("#cmbUm").val();
			var fechaCaducidad				= $("#txtFechaCaducidadAlta").val();
			var claveKit					= $("#txtClaveKitAlta").val();
			var ubicacionAsignada			= $("#txtUbicacionAlta").val();
			var estatus						= "V";
			var parametros 	= "opc=altaInventario1"+"&claveArticulo="+claveArticulo
								+"&imagen="+imagen
								+"&identificadorArticulo="+identificadorArticulo
								+"&modelo="+modelo
								+"&numeroSerie="+numeroSerie
								+"&marca="+marca
								+"&tipoContenedor="+tipoContenedor
								+"&descripcionArticulo="+descripcionArticulo
								+"&descripcionUso="+descripcionUso
								+"&unidadMedida="+unidadMedida
								+"&fechaCaducidad="+fechaCaducidad
								+"&claveKit="+claveKit
								+"&ubicacionAsignada="+ubicacionAsignada
								+"&estatus="+estatus
								+"&id="+Math.random();
								$.ajax({
									cache:false,
									type: "POST",
									dataType: "json",
									url:'../data/genericos.php',
									data: parametros,
									success: function(response){
										if(response.respuesta == true)
										{
											swal("El articulo fue dado de alta con éxito!", "Da clic en el botón OK!", "success");
										}
										else
										{
											sweetAlert("Error", "No se pudo insertar el articulo!", "error");
										}
									},
									error: function(xhr, ajaxOptions,x){
										sweetAlert("Error", "Error de conexión", "error");
									}
								});
								console.log(parametros);
		}
	}
	var bajaArticulos = function()
	{
		$("#altaArticulos").hide("slow");
		$("#mantenimientoArticulos").hide("slow");
		$("#pantallaInventario").hide("slow");
		$("#peticionesPendientes").hide("slow");
		$("#peticionesArticulos").hide("slow");
		$("#bajaArticulos").show("slow");
	}
	var mantenimientoArticulos = function()
	{
		$("#altaArticulos").hide("slow");
		$("#bajaArticulos").hide("slow");
		$("#pantallaInventario").hide("slow");
		$("#peticionesPendientes").hide("slow");
		$("#peticionesArticulos").hide("slow");
		$("#mantenimientoArticulos").show("slow");
	}
	var peticionesPendientesArt = function()
	{
		$("#altaArticulos").hide("slow");
		$("#bajaArticulos").hide("slow");
		$("#mantenimientoArticulos").hide("slow");
		$("#pantallaInventario").hide("slow");
		$("#peticionesArticulos").hide("slow");
		$("#peticionesPendientes").show("slow");
	}
	var peticionesArticulos = function()
	{
		$("#altaArticulos").hide("slow");
		$("#bajaArticulos").hide("slow");
		$("#mantenimientoArticulos").hide("slow");
		$("#pantallaInventario").hide("slow");
		$("#peticionesPendientes").hide("slow");
		$("#peticionesArticulos").show("slow");
	}
	var atenderSolicitud = function()
	{		
		$("#solicitudesPendientes2").hide("slow");
		$("#atenderSolicitud").show("slow");
	}
	var editarArticulo = function()
	{		
		$("#listaArt").hide("slow");
		$("#editar").show("slow");
	}

	//Reportes
	var resumenReportes=function()
	{
		$("#existenciaInventario").hide("slow");
		$("#pedidoMaterial").hide("slow");
		$("#bajoInventario").hide("slow");
		$("#resumenReportes").show("slow");
	}
	var existenciaInventario=function()
	{
		$("#resumenReportes").hide("slow");
		$("#pedidoMaterial").hide("slow");
		$("#bajoInventario").hide("slow");	
		$("#existenciaInventario").show("slow");
	}
	var bajoInventario = function()
	{
		$("#resumenReportes").hide("slow");
		$("#existenciaInventario").hide("slow");
		$("#pedidoMaterial").hide("slow");
		$("#bajoInventario").show("slow");
	}
	var pedidoMaterial=function()
	{
		$("#resumenReportes").hide("slow");
		$("#existenciaInventario").hide("slow");
		$("#bajoInventario").hide("slow");
		$("#pedidoMaterial").show("slow");
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
	$("#btnAltaArt").on("click",altaInventario);
	$("#btnBaja").on("click",bajaArticulos);
	$("#btnMantenimiento").on("click",mantenimientoArticulos);
	$("#btnPeticionesPendientes").on("click",peticionesPendientesArt);
	$("#btnPeticionArticulo").on("click",peticionesArticulos);
	$("#btnAtender").on("click",atenderSolicitud);	
	//Reportes
	$("#btnResumenReportes").on("click",resumenReportes);
	$("#btnExistenciaInventario").on("click",existenciaInventario);
	$("#btnBajoInventario").on("click",bajoInventario);
	$("#btnPedidoMaterial").on("click",pedidoMaterial);

	$('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: true, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    });
}
$(document).on("ready",inicio);