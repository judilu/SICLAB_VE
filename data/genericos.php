<?php
require_once('../data/conexion.php');
/*require_once('../data/funciones.php');
*/
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
	
}
function usuario ()
{
	session_start();
	$_SESSION['nombre'] = GetSQLValueString($_POST['clave1'],"text");
}
function listaArticulos()
{
	$respuesta 	= false;
	session_start();
	if(!empty($_SESSION['nombre']))
	{ 
		$responsable= $_SESSION['nombre'];
		$art 		= "";
		$articulos 	= "";
		$con 		= 0;
		$rows		= array();
		$renglones	= "";
		$conexion 	= conectaBDSICLAB();
		$consulta	= sprintf("select A.claveArticulo,B.nombreArticulo, C.cantidad from lbarticulos as A inner join lbarticuloscat as B ON A.claveArticulo=B.claveArticulo
			inner join lbinventarios as C ON B.claveArticulo=C.claveArticulo where A.estatus='V'",$responsable);
		$res 		= mysql_query($consulta);
		$renglones	.= "<thead>";
		$renglones	.= "<tr>";
		$renglones	.= "<th data-field='codigo'>Código</th>";
		$renglones	.= "<th data-field='nombreArticulo'>Nombre del artículo</th>";
		$renglones	.= "<th data-field='cantidad'>Cantidad</th>";
		$renglones	.= "</tr>";
		$renglones	.= "</thead>";
		while($row = mysql_fetch_array($res))
		{
			$art 	.= "'".($row["claveArticulo"])."',";
			$rows[]=$row;
			$respuesta = true;
			$con++;
		}
		$art = (rtrim($art,","));
		for($c= 0; $c< $con; $c++)
		{
			$renglones .= "<tbody>";
			$renglones .= "<tr>";
			$renglones .= "<td>".$rows[$c]["claveArticulo"]."</td>";
			$renglones .= "<td>".$rows[$c]["nombreArticulo"]."</td>";
			$renglones .= "<td>".$rows[$c]["cantidad"]."</td>";
			$renglones .= "</tr>";
			$renglones .= "</tbody>";
			$respuesta = true;
		}
	}
	else
	{
		//salir();
	}
	$arrayJSON = array('respuesta' => $respuesta,
		'renglones' => $renglones);
	print json_encode($arrayJSON);
}
function buscaArticulo()
{
	$respuesta 	= false;
	session_start();
	if(!empty($_SESSION['nombre']))
	{ 
		$responsable= $_SESSION['nombre'];
		$identificadorArticulo= GetSQLValueString($_POST["identificadorArticulo"],"text");
		$con 			= 0;
		$rows			= array();
		$modelo			= "";
		$numeroSerie	= "";
		$nombreArticulo	= "";
		$marca			= "";
		$fechaCaducidad	= "";
		$descripcionArticulo	= "";
		$descripcionUso	= "";
		$unidadMedida	= "";
		$tipoContenedor	= "";
		$conexion 	= conectaBDSICLAB();
		$consulta	= sprintf("select A.modelo,A.numeroSerie,B.nombreArticulo,A.marca,A.fechaCaducidad,
			A.descripcionArticulo,A.descripcionUso,A.unidadMedida, A.tipoContenedor
			from lbarticulos as A inner join lbarticuloscat as B on A.claveArticulo=B.claveArticulo
			where A.identificadorArticulo=%s",$identificadorArticulo,$responsable);
		$res 		= mysql_query($consulta);
		
		while($row = mysql_fetch_array($res))
		{
			$respuesta = true;
			$modelo			= $row["modelo"];
			$numeroSerie 	= $row["numeroSerie"];
			$nombreArticulo	= $row["nombreArticulo"];
			$marca		 	= $row["marca"];
			$fechaCaducidad	= $row["fechaCaducidad"];
			$descripcionArticulo	= $row["descripcionArticulo"];
			$descripcionUso	= $row["descripcionUso"];
			$unidadMedida	= $row["unidadMedida"];
			$tipoContenedor	= $row["tipoContenedor"];
		}
	}
	$salidaJSON = array('respuesta' => $respuesta,
		'modelo' => $modelo, 'numeroSerie' => $numeroSerie, 'nombreArticulo' => $nombreArticulo,
		'marca' => $marca, 'fechaCaducidad' => $fechaCaducidad, 'descripcionArticulo' => $descripcionArticulo,
		'descripcionUso' => $descripcionUso, 'unidadMedida' => $unidadMedida, 'tipoContenedor' => $tipoContenedor);
	print json_encode($salidaJSON);
}
function bajaArticulos()
{
	$respuesta 	= false;
	session_start();
	if(!empty($_SESSION['nombre']))
	{ 
		$responsable= $_SESSION['nombre'];
		$identificadorArticulo= GetSQLValueString($_POST["identificadorArticulo"],"text");
		$art 		= "";
		$articulos 	= "";
		$con 		= 0;
		$rows		= array();
		$renglones	= "";
		$conexion 	= conectaBDSICLAB();
		$consulta	= sprintf("update lbarticulos set estatus='B' where identificadorArticulo=%s",$identificadorArticulo,$responsable);
		$res 		= mysql_query($consulta);
		
		if(mysql_affected_rows()>0)
			$respuesta = true; 
	}
	$salidaJSON = array('respuesta' => $respuesta);
	print json_encode($salidaJSON);
}
function mantenimientoArticulos()
{

}
//Menú principal
$opc = $_POST["opc"];
switch ($opc){
	case 'altaInventario1':
	altaInventario1();
	break;
	case 'listaArticulos1':
	listaArticulos();
	break;
	case 'usuario1':
	usuario();
	break;
	case 'bajaArticulos1':
	bajaArticulos();
	break;
	case 'buscaArticulos1':
	buscaArticulo();
	break;
	case 'manteniminetoArticulos1':
	mantenimientoArticulos();
	break;
} 
?>