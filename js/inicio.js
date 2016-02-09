var inicio = function ()
{
	var ingresar = function ()
	{
		console.log("hola");
		$(".acceso").hide();
		$("#accesoAlumno").show("slow");
		console.log("adios");
	}
	//Configuramos los eventos
	$("#btnIngresar").on("click",ingresar);
}
$(document).on("ready",inicio);