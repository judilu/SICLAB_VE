var inicio = function ()
{
	$('ul.tabs').tabs();
	$('select').material_select(); //agregado
	//eventos menu Solicitudes
	var salir = function()
	{
		swal({   	title: "¿Estas seguro que deseas salir?",   
			text: "",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Si",   
			cancelButtonText: "No",   
			closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm)
			{   
				if (isConfirm) 
					{ swal("Adios!", "Tu puedes volver a ingresar al sistema", "success");} 
			else {swal("OK..!",
				"Aún sigues en el sistema", "error");   } 
		});
	}
	var solAceptadas = function()
	{
		//ocultar los div
		$("#sNuevaMaestro").hide();
		$("#sPendientesMaestro").hide();
		$("#sRealizadas").hide();
		//contenido dinamico
		var parametros = "opc=solicitudesAceptadas1"+
		"&id="+Math.random();
		$.ajax({
			cache:false,
			type: "POST",
			dataType: "json",
			url:"../data/maestros.php",
			data: parametros,
			success: function(response){
				if(response.respuesta == true)
				{
					$("#tbSolAceptadas").html(response.renglones);
				}
				else
					alert("No hay solicitudes");
			},
			error: function(xhr, ajaxOptions,x){
				alert("Error de conexión");
				console.log(xhr);	
			}
		});
		$("#sAceptadasMaestro").show("slow");	
	}
	var solPendientes = function()
	{
		$("#sNuevaMaestro").hide();
		$("#sAceptadasMaestro").hide();
		$("#editarSolicitudLab").hide();
		$("#sRealizadas").hide();
		var parametros = "opc=solicitudesPendientes1"+
		"&maestro="+"ALEJANDRA"+
		"&id="+Math.random();
		$.ajax({
			cache:false,
			type: "POST",
			dataType: "json",
			url:"../data/maestros.php",
			data: parametros,
			success: function(response){
				if(response.respuesta == true)
				{
					$("#tabSolPendientes").html(response.renglones);
				}
				else
					alert("No hay solicitudes");
			},
			error: function(xhr, ajaxOptions,x){
				alert("Error de conexión");	
			}
		});
		$("#sPendientesMaestro").show("slow");
		$("#solicitudesPendientesLab").show("slow");	
	}
	var solRealizadas = function()
	{
		//ocultar los div
		$("#sNuevaMaestro").hide();
		$("#sAceptadasMaestro").hide();
		$("#sPendientesMaestro").hide();
		$("#sRealizadas").hide();
		//contenido dinamico
		var parametros = "opc=solicitudesRealizadas1"+
		"&maestro="+"ALEJANDRA"+
		"&id="+Math.random();
		$.ajax({
			cache:false,
			type: "POST",
			dataType: "json",
			url:"../data/maestros.php",
			data: parametros,
			success: function(response){
				if(response.respuesta == true)
				{
					$("#tbSolRealizadas").html(response.renglones);
				}
				else
					alert("No hay practicas realizadas");
			},
			error: function(xhr, ajaxOptions,x){
				alert("Error de conexión");	
			}
		});
		$("#sRealizadas").show("slow");
	}
	var solNueva = function()
	{
		$("#sAceptadasMaestro").hide();
		$("#sPendientesMaestro").hide();
		$("#sRealizadas").hide();
		$("#eleccionMaterial").hide();
		$("#sNuevaMaestro").show("slow");
		$("#nuevaMaestro").show("slow");
		//contenido Dinamico
		if(($("#txtCodigoBarras").val())!=' ' && ($("#txtModeloArt").val())!= ' ')
		{
			//aqui empieza todo
       		//var cveUsuario = usuarioNombre();
       		var imagen						= $("#txtImagenAlta").val();
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
       var elegirMaterial = function()
       {
       	$("#nuevaMaestro").hide();
       	$("#eleccionMaterial").show("slow");
       }
       var editarSolicitudLab = function()
       {
       	$(this).closest("td").children("input").val();
       	$("#solicitudesPendientesLab").hide();
       	$("#editarSolicitudLab").show("slow");
       }
	//eventos menu Reportes
	var listaAsistencia = function()
	{
		$("#selecionarLista").hide();
		$("#lista").show();
	}
	var regresar = function()
	{
		$("#lista").hide();
		$("#selecionarLista").show("slow");
	}
	var probando = function()
	{
		swal({
			title: "Estas seguro que deseas editar la solicitud?",
			text: "Una vez editado, puedes volver a editar..!",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "SI",   
			cancelButtonText: "NO",   
			closeOnConfirm: false,   
			closeOnCancel: false }, function(isConfirm){   
				if (isConfirm) {swal("Deleted!", 
					"Tu solicitud ha sido editada con éxito", 
					"success");   } 
					else {swal("Cancelled", "Tu solicitud no ha sido modificada", 
						"error");} 
				});
	}
	//Configuramos el evento del Tab
	$("#salirTab").on("click",salir);
	$("#solicitudestab").on("click",solAceptadas);
	//Configuramos los eventos Menu Solicitudes
	$("#btnSolicitudesAceptadas").on("click",solAceptadas);
	$("#btnSolicitudesPendientes").on("click",solPendientes);
	$("#btnSolicitudesRealizadas").on("click",solRealizadas)
	$("#btnNuevaSolicitud").on("click",solNueva);
	$("#btnElegirMaterial").on("click",elegirMaterial);
	$("#btnRegresar").on("click",solNueva);
	$("#tabSolPendientes").on("click", "#btnEditarSolicitudLab" , editarSolicitudLab);
	$("#btnAceptarEdit").on("click",probando)
	//Configuramos los eventos Menu Reportes
	$("#btnListaAsistencia").on("click",listaAsistencia);
	$("#btnRegresarla").on("click",regresar);
}
$(document).on("ready",inicio);