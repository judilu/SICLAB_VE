<?php
include '../data/conexion.php';
function altaInventario1 ()
{
	$cveUsuario		= GetSQLValueString($_POST[""],"text");
	$img			= GetSQLValueString($_POST["img"],"text");
	$idenArt 		= GetSQLValueString($_POST["idenArt"],"text");
	$modelo			= GetSQLValueString($_POST["modelo"],"text");
	$numSerie		= GetSQLValueString($_POST["numSerie"],"text");
	$nombreArt		= GetSQLValueString($_POST["nombreArt"],"text");
	$marca			= GetSQLValueString($_POST["marca"],"text");
	$tc				= GetSQLValueString($_POST["tc"],"text");
	$descripcion	= GetSQLValueString($_POST["descripcion"],"text");
	$desUso			= GetSQLValueString($_POST["desUso"],"text");
	$
	$respuesta 		= false;

	$consulta		= sprintf("insert into lbarticulos values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
                $cveArticulo,$nombreArt,$desUso,$descripcion,$numSerie,$marca,$modelo,$estatus,$um,$fechacad,$tc,$ima,$idenArticulo,$ubicacion,$kit);
	$res = mysql_query($consulta);
	if(mysql_affected_rows()>0)
	{
		$respuesta= true;
	}
}	
//Menú principal
$opc = $_POST["opc"];
switch ($opc){
	case 'altaInventario1':
	altaInventario1();
	break;
} 
?>