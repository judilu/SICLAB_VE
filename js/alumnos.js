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
	var uno= function()
	{
			$("#txtNControl").val($("#txtNControl").val()+1);
	}
	var dos= function()
	{
			$("#txtNControl").val($("#txtNControl").val()+2);
	}
	var tres= function()
	{
			$("#txtNControl").val($("#txtNControl").val()+3);
	}
	var cuatro= function()
	{
			$("#txtNControl").val($("#txtNControl").val()+4);
	}
	var cinco= function()
	{
			$("#txtNControl").val($("#txtNControl").val()+5);
	}
	var seis= function()
	{
			$("#txtNControl").val($("#txtNControl").val()+6);
	}
	var siete= function()
	{
			$("#txtNControl").val($("#txtNControl").val()+7);
	}
	var ocho= function()
	{
			$("#txtNControl").val($("#txtNControl").val()+8);
	}
	var nueve= function()
	{
			$("#txtNControl").val($("#txtNControl").val()+9);
	}
	var cero= function()
	{
			$("#txtNControl").val($("#txtNControl").val()+0);
	}
	var ma= function()
	{
		if($("#txtNControl").val()=="")
			$("#txtNControl").val("MA");
			else
					{
						sweetAlert("Error", "El prefijo MA solo puede ir al inicio.", "error");
					}
	}
	var del= function()
	{
		var objEntrada = document.getElementById('txtNControl');
		if(objEntrada.value.length > 0 && objEntrada.value!="MA")
			objEntrada.value = objEntrada.value.substring(0,objEntrada.value.length-1);
		else
		{
			if(objEntrada.value=="MA")
				objEntrada.value = objEntrada.value.substring(objEntrada.value.length);
		}
	}
	$("#btnPractica").on("click",practicaAlumnos);
	$("#btnMaterialAlumno").on("click",materialPractica);

	//Botones teclado numerico
	$("#btn1").on("click",uno);
	$("#btn2").on("click",dos);
	$("#btn3").on("click",tres);
	$("#btn4").on("click",cuatro);
	$("#btn5").on("click",cinco);
	$("#btn6").on("click",seis);
	$("#btn7").on("click",siete);
	$("#btn8").on("click",ocho);
	$("#btn9").on("click",nueve);
	$("#btn0").on("click",cero);
	$("#btnMA").on("click",ma);
	$("#btnDel").on("click",del);
	
}
$(document).on("ready",inicio);
