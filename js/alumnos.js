var inicio = function()
{
	$('select').material_select();
	var practicaAlumnos = function()
	{
		$("#accesoAlumno").hide();
		$("#datosPracticas").show("slow");
	}
	var materialPractica = function()
	{
		$("#datosPractica2").hide();
		$("#materialAlumno").show("slow");
	}
	$("#btnPractica").on("click",practicaAlumnos);
	$("#btnMaterialAlumno").on("click",materialPractica);
}
$(document).on("ready",inicio);