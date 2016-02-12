var inicio = function ()
{
	var verificarUsuario = function()
	{
		var usu = $("#txtUsuario").val();
		var cve = $("#txtClave").val();
		if(usu!="" && cve!="")
		{
			var parametros = "opc=validaUsuario"+"&ALUNOM="+usu+"&ALUCTR="+cve+"&id="+Math.random();
			alert(usu);
			alert(cve);
			$.ajax({
				cache:false,
				type: "POST",
				dataType: "json",
				url:"../data/usuarios.php",
				data: parametros,
				success: function(response){
					if(response.respuesta == true)
					{
						$(".acceso").hide();
						$(".accesoAlumno").show("slow");
						console.log(response.contenido);
					}
					else
						alert("lo siento");
				},
				error: function(xhr,ajaxOptions,x){
					alert("tecle un usuario y/o contraseña correctos");
					console.log(xhr,x);
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
