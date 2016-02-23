<?php
include '../data/conexion.php';
function solicitudesAceptadas ()
{	
	$maestro	= "'".$_POST["maestro"]."'";
	$respuesta 	= false;
	$renglones	= "";
	$conexion 	= conectaBDSIE();
	$consulta	= sprintf("select * from DALUMN WHERE ALUNOM=%s LIMIT 10",$maestro);
	$res 		= mysql_query($consulta);
	$renglones	.= "<thead>";
	$renglones	.= "<tr>";
	$renglones	.= "<th data-field='materia'>Materia</th>";
	$renglones	.= "<th data-field='nombrePractica'>Nombre de la práctica</th>";
	$renglones	.= "<th data-field='laboratorio'>Laboratorio</th>";
	$renglones	.= "<th data-field='fecha'>Fecha</th>";
	$renglones	.= "<th data-field='hora'>Hora</th>";
	$renglones	.= "</tr>";
	$renglones	.= "<thead>";
	while($row = mysql_fetch_array($res))
	{
		$renglones .= "<tbody>";
		$renglones .= "<tr>";
		$renglones .= "<td>".$row["ALUCTR"]."</td>";
		$renglones .= "<td>".$row["ALUAPP"]."</td>";
		$renglones .= "<td>".$row["ALUAPM"]."</td>";
		$renglones .= "<td>".$row["ALUNOM"]."</td>";
		$renglones .= "<td>".$row["ALUSEX"]."</td>";
		$renglones .= "</tr>";
		$renglones .= "<tbody>";
		$respuesta = true;
	}
	$arrayJSON = array('respuesta' => $respuesta,
						'renglones' => $renglones);
	print json_encode($arrayJSON);
}
function altaInventario1 ()
{
	$cb 			= GetSQLValueString($_POST["cb"],"text");
	$modelo			= GetSQLValueString($_POST["modelo"],"text");
	$numSerie		= GetSQLValueString($_POST["numSerie"],"text");
	$nombreArt 		= GetSQLValueString($_POST["nombreArt"],"text");
	$marca			= GetSQLValueString($_POST["marca"],"text");
	$tc				= GetSQLValueString($_POST["tc"],"text");
	$descripcion	= GetSQLValueString($_POST["descripcion"],"text");
	$desUso			= GetSQLValueString($_POST["desUso"],"text");
	$um				= GetSQLValueString($_POST["um"],"text");
	$fechacad		= GetSQLValueString($_POST["cveUsuario"],"text");
	$cveUsuario		= GetSQLValueString($_POST["fechacad"],"text");
	$cveArticulo 	= ""//pendiente
	$idenArticulo	= ""//pendiente
	$kit			= ""//pendiente
	$ubicacion		= ""//pendiente
	$estatus		= "V"
	$ima			= "../img/person.png";
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
	case 'solicitudesAceptadas1':
	solicitudesAceptadas();
	break;
	case 'altaInventario1':
	altaInventario1();
} 
?>