<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" href="../css/maestro.css">
	<!--<?php include '../Inicio/head.php';?>-->
</head>
<body>
	<div class="solPendientesMaestro">
		<div class="row" id="solicitudesPendientesLab">
			<div class="col s10 offset-s1">
				<table id="tabSolPendientes">
					<!--<thead>
						<tr>
							<th data-field="materia">Materia</th>
							<th data-field="nombrePractica">Nombre de la práctica</th>
							<th data-field="fecha">Fecha</th>
							<th data-field="hora">Hora</th>
							<th data-field="hora">Acciones</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Sistemas Programables</td>
							<td>Sensores ultrasónicos</td>
							<td>10/12/15</td>
							<td>14:56</td>
							<td>
								<a class="btn-floating btn-large waves-effect waves-light amber darken-2" id="btneditarSolicitudLab"><i class="material-icons">mode_edit</i></a>
								<a class="btn-floating btn-large waves-effect waves-light red darken-1" id="btneliminarSolicitudLab"><i class="material-icons">delete</i></a>
							</td>
						</tr>
					</tbody>-->
				</table>
			</div>
		</div>
		<div id="editarSolicitudLab">
			<h5>Editar Solicitud</h5>
			<?php include 'editarSolicitudLab.php';?>
		</div>
	</div>
</body>
<!--
<footer>
		<?php include '..\Inicio\footer.php';?>
</footer>
-->
</html>