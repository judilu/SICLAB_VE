var inicio = function ()
{
	var verificarUsuario = function()
	{
		var usu = $("#txtUsuario").val();
		var cve = $("#txtClave").val();
		if(usu!="" && cve!="")
		{
			var parametros = "opc=validaUsuario"+"&usuario="+usu+"&cveUsuario="+cve+"&id="+Math.random();
			$.ajax({
				cache:false,
				type: "POST",
				dataType: "json",
				url:"../data/usuarios.php",
				data: parametros,
				success: function(response){
					if(response.respuesta == true)
					{
						switch (response.tipo){
							case "1":
								$("#acceso").hide();
								$("#genericos").show("slow");
							break;
							case "2":
								$("#acceso").hide();
								$("#genericos").show("slow");
							break;
							case "3":
								$("#acceso").hide();
								$("#genericos").show("slow");
							break;
							case "4":
								$("#acceso").hide();
								$("#alumno").show("slow");
							break;
							case "5":
								$("#acceso").hide();
								$("#genericos").show("slow");
							break;
							case "6":
								$("#acceso").hide();
								$("#maestro").show("slow");
							break;

						}
						$(".acceso").hide("slow");
						$(".accesoAlumno").show("slow");
						console.log(response.tipo);
					}
					else
						alert("Usuario y/o contraseña incorrectos");
				},
				error: function(xhr,ajaxOptions,x){
					alert("Error de conexión");
				}
			});
		}
		else
		{
			alert("nombre de usuario y contraseña incorrectos");
		}

	}
	//Configuramos los eventos
	$("#btnIngresar").on("click",verificarUsuario);
}
$(document).on("ready",inicio);
