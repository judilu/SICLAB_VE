<?php
  require_once('../data/conexion.php');
  $conexion = conectaBDSICLAB();
  
  $categorias = array('MES');
  $enero = array('01');
  $febrero = array('02');
  $marzo = array('03');
  $abril = array('04');
  $mayo = array('05');
  $junio = array('06');
  $julio = array('07');
  $agosto = array('08');
  $septiembre = array('09');
  $octubre = array('10');
  $noviembre = array('11');
  $diciembre = array('12');

 // $consulta = "SELECT categoria, mes, total FROM tblventas WHERE mes = 'enero' OR mes = 'febrero'  ORDER BY mes, categoria;";
  //$result = $conexion->query($consulta);
  //while($fila = $result->fetch_array()){
    //if($fila['mes'] == 'ENERO')
     // $enero[] = (double)$fila['total'];
  $categorias[]='USO';
  $enero[]=20;
  $febrero[]=60;
  $marzo[]=30;
  $abril[] = 15;
  $mayo[] = 25;
  $junio[] = 100;
  $julio[] = 223;
  $agosto[] = 0;
  $septiembre[] = 240;
  $octubre[] = 85;
  $noviembre[] = 30;
  $diciembre[] = 188;

    //else if ($fila['mes'] == 'FEBRERO'){
      //$febrero[] = (double)$fila['total'];
    //}
  //}

  echo json_encode(array($categorias,$enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre) );
  
?>
