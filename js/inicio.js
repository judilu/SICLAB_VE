var inicio = function ()
{
	var ingresar = function ()
	{
		console.log("hola");
		$(".acceso").hide();
		$(".accesoAlumno").show("slow");
		alert("pudiste");
	}
	//Configuramos los eventos
	$("#btnIngresar").on("click",ingresar);
}
$(document).on("ready",inicio);