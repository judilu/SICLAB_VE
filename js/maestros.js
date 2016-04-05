var inicio = function ()
{
	$('ul.tabs').tabs();
	$('select').material_select(); //agregado
	//eventos menu Solicitudes
	//Empieza función salir del sistema
	var salir = function()
	{
		swal({   	
			title: "¿Estas seguro que deseas salir?",   
			text: "",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Si",   
			cancelButtonText: "No",   
			closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm)
			{   
				if (isConfirm) 
				{ 
					var parametros = "opc=salir1"+
					"&id="+Math.random();
					$.ajax({
						cache:false,
						type: "POST",
						dataType: "json",
						url:"../data/funciones.php",
						data: parametros,
						success: function(response){
							if(response.respuesta)
							{
								document.location.href= "acceso.php";
							}
							else
							{
								console.log(response.respuesta);
							}
						},
						error: function(xhr, ajaxOptions,x)
						{
							alert("Error de conexión salir");
						}
					});
				} 
				else 
				{
					swal("OK..!",
						"Aún sigues en el sistema", "error");
				} 
			});
	}//Termina función salir del sistema
	//Empieza función de solicitudes Aceptadas
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
					$("#tbSolAceptadas a").on("click",practicaRealizada);
				}
				else
					sweetAlert("No hay solicitudes..!", "Debe crear una solicitud antes", "error");
			},
			error: function(xhr, ajaxOptions,x){
				alert("Error de conexión sol aceptadas");
				console.log(xhr);	
			}
		});
		$("#sAceptadasMaestro").show("slow");	
	}//Termina función de solicitudes Aceptadas
	//Empieza función para liberar una solicitud realizada a aceptadas
	var practicaRealizada = function(evt)
	{
		//contenido dinamico
		var realid = $(this).attr("name");
		var parametros = "opc=liberarPractica1"+
		"&clave="+realid+
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
					swal("Practica realizada..!", "Buen trabajo..!", "success");
					solAceptadas();
				}
				else
				{
					sweetAlert("No existe esa solicitud..!", "", "error");
				}
			},
			error: function(xhr, ajaxOptions,x)
			{
				alert("Error de conexión realizadas");
			}
		});	
	}//Termina función para liberar una solicitud realizada a aceptadas
	//Empieza función de solicitudes pendientes
	var solPendientes = function()
	{
		$("#sNuevaMaestro").hide();
		$("#sAceptadasMaestro").hide();
		$("#editarSolicitudLab").hide();
		$("#sRealizadas").hide();
		//Contenido Dinamico
		var parametros = "opc=solicitudesPendientes1"+
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
					$("#tabSolPendientes").on("click", ".btnEditarSolicitudLab" , editarSolicitudLab);
				}
				else
					sweetAlert("No hay solicitudes pendientes", "Han aceptado todas tus solicitudes o no ha enviado ninguna solicitud", "error");
			},
			error: function(xhr, ajaxOptions,x){
				alert("Error de conexión sp");	
			}
		});
		$("#sPendientesMaestro").show("slow");
		$("#solicitudesPendientesLab").show("slow");	
	}//Termina función de solicitudes pendientes
	//Empieza función de solicitudes realizadas
	var solRealizadas = function()
	{
		//ocultar los div
		$("#sNuevaMaestro").hide();
		$("#sAceptadasMaestro").hide();
		$("#sPendientesMaestro").hide();
		$("#sRealizadas").hide();
		//contenido dinamico
		var parametros = "opc=solicitudesRealizadas1"+
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
					sweetAlert("No hay solicitudes realizadas", "Debes liberar la práctica realizada", "error");
			},
			error: function(xhr, ajaxOptions,x){
				alert("Error de conexión srealizadas");	
			}
		});
		$("#sRealizadas").show("slow");
	}//Termina función de solicitudes realizadas
	//Empieza función de crear nueva solicitud
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
       		var imagen		= $("#txtImagenAlta").val();
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
       				sweetAlert("Error", "Error de conexión articulo", "error");
       			}
       		});
       		console.log(parametros);
       	}
    }//Termina función de crear nueva solicitud
    //Empieza función de elegir material
    var elegirMaterial = function()
    {
       $("#nuevaMaestro").hide();
       $("#eleccionMaterial").show("slow");
    }//Termina función de elegir material
       //Empieza función editar solicitud
    var editarSolicitudLab = function()
    {
	    //ocultar elementos
	    //$(this).closest("td").children("input").val();
	    $("#solicitudesPendientesLab").hide();
	    //Contenido Dinamico
	    $("#editarSolicitudLab").show("slow");
	   	 var solId = $(this).attr("name");
	   	 var parametros = "opc=editarSolicitud1"+
	   	 "&solId"+solId+
	   	 "&id="+Math.random();
	   	 $.ajax({
	   	 	cache:false,
	   	 	type: "POST",
	   	 	dataType: "json",
	   	 	url:'../data/maestros.php',
	   	 	data: parametros,
	   	 	success: function(response){
	   	 		if(response.respuesta == true)
	   	 		{
       				console.log(response.rows);
       			}
       			else
       			{
       				//aqui va algo
       			}
       			},
       			error: function(xhr, ajaxOptions,x){
       				sweetAlert("Error", "Error de conexion editar", "error");
       			}
       		});
    }//Termina función editar solicitud
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
	//para botones que son creados dinamicamente primero se coloca:
	//el nombre de el id de la tabla que lo contiene despues el on y despues el evento
	//y de ahi el nombre del boton que desencadenara el evento
	$("#tbSolRealizadas").on("click","#btnPracticaRealizada",practicaRealizada);
	$("#btnSolicitudesPendientes").on("click",solPendientes);
	$("#btnSolicitudesRealizadas").on("click",solRealizadas)
	$("#btnNuevaSolicitud").on("click",solNueva);
	$("#btnElegirMaterial").on("click",elegirMaterial);
	$("#btnRegresar").on("click",solNueva);
	$("#btnAceptarEdit").on("click",probando)
	//Configuramos los eventos Menu Reportes
	$("#btnListaAsistencia").on("click",listaAsistencia);
	$("#btnRegresarla").on("click",regresar);
}
$(document).on("ready",inicio);