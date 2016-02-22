var inicio = function ()
{
	$('ul.tabs').tabs();
	$('select').material_select(); //agregado
	//eventos menu Solicitudes
	var solAceptadas = function()
	{
		//ocultar los div
		$("#sNuevaMaestro").hide();
		$("#sPendientesMaestro").hide();
		//contenido dinamico
		var parametros = "opc=solicitudesAceptadas1"+
		"&maestro="+"ALEJANDRO"+
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
			}
		});
		$("#sAceptadasMaestro").show("slow");	
	}
	var solPendientes = function()
	{
		$("#sNuevaMaestro").hide();
		$("#sAceptadasMaestro").hide();
		$("#editarSolicitudLab").hide();
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
	var solNueva = function()
	{
		$("#sAceptadasMaestro").hide();
		$("#sPendientesMaestro").hide();
		$("#eleccionMaterial").hide();
		$("#sNuevaMaestro").show("slow");
		$("#nuevaMaestro").show("slow");
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
	//Configuramos los eventos Menu Solicitudes
	$("#btnSolicitudesAceptadas").on("click",solAceptadas);
	$("#btnSolicitudesPendientes").on("click",solPendientes);
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