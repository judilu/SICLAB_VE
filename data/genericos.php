<?php
include '../data/conexion.php';
function altaInventario1 ()
{
	//$cveUsuario		= GetSQLValueString($_POST[""],"text");
	$conexion					= conectaBDSICLAB();
	$imagen						= GetSQLValueString($_POST["imagen"],"text");
	$identificadorArticulo 		= GetSQLValueString($_POST["identificadorArticulo"],"text");
	$modelo						= GetSQLValueString($_POST["modelo"],"text");
	$numeroSerie				= GetSQLValueString($_POST["numeroSerie"],"text");
	$marca						= GetSQLValueString($_POST["marca"],"text");
	$tipoContenedor				= GetSQLValueString($_POST["tipoContenedor"],"text");
	$descripcionArticulo		= GetSQLValueString($_POST["descripcionArticulo"],"text");
	$descripcionUso				= GetSQLValueString($_POST["descripcionUso"],"text");
	$unidadMedida				= GetSQLValueString($_POST["unidadMedida"],"text");
	$fechaCaducidad				= GetSQLValueString($_POST["fechaCaducidad"],"text");
	$claveKit					= GetSQLValueString($_POST["claveKit"],"text");
	$ubicacionAsignada			= GetSQLValueString($_POST["ubicacionAsignada"],"text");
	$claveArticulo 				= GetSQLValueString($_POST["claveArticulo"],"text");	
	//$claveArticulo = claveArt(nombreArt);
	$estatus 					= GetSQLValueString($_POST["estatus"],"text");
	$respuesta 					= false;
	//insert a tabla lbarticulos
	$consulta= sprintf("insert into lbarticulos values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
                				$claveArticulo,$descripcionUso,$descripcionArticulo,$numeroSerie,$marca,$modelo,$estatus,$unidadMedida,$fechaCaducidad,$tipoContenedor,$imagen,$identificadorArticulo,$ubicacionAsignada,$claveKit);
		$resconsulta = mysql_query($consulta);
		if(mysql_affected_rows()>0)
			$respuesta = true; 
	
$salidaJSON = array('respuesta' => $respuesta);
print json_encode($salidaJSON);
	//insert a tabla lbmovimientosarticulos
	/*$consulta2		= sprintf("insert into lbmovimientosarticulos values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
                $claveArticulo,$descripcionUso,$descripcionArticulo,$numeroSerie,$marca,$modelo,$estatus,$unidadMedida,$fechaCaducidad,$tipoContenedor,$imagen,$identificadorArticulo,$ubicacionAsignada,$claveKit);
*/
}

//funcion para sacar el idArticulo
/*function claveArt (nombreArt)
{
	$nombreArticulo = "'".$_POST["nombreArticulo"]."'";
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
}	*/
//Menú principal
$opc = $_POST["opc"];
switch ($opc){
	case 'altaInventario1':
	altaInventario1();
	break;
} 
?>