<?php
include '../data/conexion.php';
include '../data/funciones.php';
function altaInventario1 ()
{
	//$cveUsuario		= GetSQLValueString($_POST[""],"text");
	$img			= GetSQLValueString($_POST["img"],"text");
	$idenArt 		= GetSQLValueString($_POST["idenArt"],"text");
	$modelo			= GetSQLValueString($_POST["modelo"],"text");
	$numSerie		= GetSQLValueString($_POST["numSerie"],"text");
	$nombreArt		= GetSQLValueString($_POST["nombreArt"],"text");
	$marca			= GetSQLValueString($_POST["marca"],"text");
	$tc				= GetSQLValueString($_POST["tc"],"text");
	$descripcion	= GetSQLValueString($_POST["descripcion"],"text");
	$desUso			= GetSQLValueString($_POST["desUso"],"text");
	$um				= GetSQLValueString($_POST["um"],"text");
	$fechacad		= GetSQLValueString($_POST["fechacad"],"text");
	$claveKit		= GetSQLValueString($_POST["claveKit"],"text");
	$ubicacion		= GetSQLValueString($_POST["ubicacion"],"text");
	$respuesta 		= false;
	$cveArticulo 	= claveArt(nombreArt);
	$estatus 		= 'V';
	//insert a tabla lbarticulos
	$consulta		= sprintf("insert into lbarticulos values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
                $cveArticulo,$desUso,$descripcion,$numSerie,$marca,$modelo,$estatus,$um,$fechacad,$tc,$ima,$idenArticulo,$ubicacion,$claveKit);
	$res = mysql_query($consulta);
	if(mysql_affected_rows()>0)
	{
		$respuesta= true;
		
	}
	//insert a tabla lbmovimientosarticulos
	$consulta2		= sprintf("insert into lbmovimientosarticulos values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
                $cveArticulo,$desUso,$descripcion,$numSerie,$marca,$modelo,$estatus,$um,$fechacad,$tc,$ima,$idenArticulo,$ubicacion,$claveKit);
}
//funcion para sacar el idArticulo
function claveArt (nombreArt)
{
	$nombreArticulo = "'".nombreArticulo."'";
	$respuesta		= false;
	$conexion 		= conectaBDSICLAB();
	$consulta 		= sprintf("select * from lbarticuloscat where nombreArticulo=%s limit 1",$nombreArticulo);
	$res			= mysql_query($consulta);
	if($row = mysql_fetch_array($res))
	{
		$respuesta = true;
		$claveArt = $row["claveArticulo"];
	}
	return $claveArt;
}	
//Menú principal
$opc = $_POST["opc"];
switch ($opc){
	case 'altaInventario1':
	altaInventario1();
	break;
} 
?>