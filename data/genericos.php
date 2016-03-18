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
	
}

function listaArticulos()
{
	$respuesta 	= false;
	session_start();
	if(!empty($_SESSION['nombre']))
	{ 
		$maestro	= $_SESSION['nombre'];
		$conexion 	= conectaBDSICLAB();
		$consulta	= sprintf("select A.claveArticulo,B.nombreArticulo, C.cantidad from lbarticulos as A inner join lbarticuloscat as B ON A.claveArticulo=B.claveArticulo
			inner join lbinventario as C ON B.claveArticulo=C.claveArticulo");
		$res 		= mysql_query($consulta);
		$renglones	.= "<thead>";
		$renglones	.= "<tr>";
		$renglones	.= "<th data-field='codigo'>Código</th>";
		$renglones	.= "<th data-field='nombreArticulo'>Nombre del artículo</th>";
		$renglones	.= "<th data-field='cantidad'>Cantidad</th>";
		$renglones	.= "<th data-field='fecha'>Fecha</th>";
		$renglones	.= "</tr>";
		$renglones	.= "</thead>";
		while($row = mysql_fetch_array($res))
		{
			$mat 	.= "'".($row["MATCVE"])."',";
			$rows[]=$row;
			$respuesta = true;
			$con++;
		}
		$mat = (rtrim($mat,","));
		$materias = nomMat($mat);
		for($c= 0; $c< $con; $c++)
		{
			$renglones .= "<tbody>";
			$renglones .= "<tr>";
			$renglones .= "<td>".$materias[$rows[$c]["MATCVE"]]."</td>";
			$renglones .= "<td>".$rows[$c]["tituloPractica"]."</td>";
			$renglones .= "<td>".$rows[$c]["nombreLaboratorio"]."</td>";
			$renglones .= "<td>".$rows[$c]["fechaAsignada"]."</td>";
			$renglones .= "<td>".$rows[$c]["horaAsignada"]."</td>";
			$renglones .= "<td><a name = '".$rows[$c]["claveCalendarizacion"]."' class='btn-floating btn-large waves-effect waves-light green darken-2'><i class='material-icons'>thumb_up</i></a></td>";
			$renglones .= "</tr>";
			$renglones .= "</tbody>";
			$respuesta = true;
		}
	}
	else
	{
		salir();
	}
	$arrayJSON = array('respuesta' => $respuesta,
		'renglones' => $renglones);
	print json_encode($arrayJSON);
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
} 
?>