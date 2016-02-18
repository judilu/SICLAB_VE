<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" href="../css/maestro.css">
	<script src="../js/maestros.js"></script>
</head>
<body>
	<div id="menuMaestro" class="body2">
		<div class="row">
			<div class="col s12">
				<ul class="tabs">
					<li class="tab col s3 active"><a id="soliAceptadas" href="#solicitudes">Solicitudes</a></li>
					<li class="tab col s3"><a href="#reportes">Reportes</a></li>
					<li class="tab col s3"><a href="#salir">Salir</a></li>
				</ul>
			</div>
		</div>
		<div id="solicitudes" class="col s12">
			<div id="menuSolicitudesMaestro">
				<ul>
					<button class="waves-effect waves-light btn grey" id="btnSolicitudesAceptadas">Aceptadas</button>
					<button class="waves-effect waves-light btn blue darken-1" id="btnSolicitudesPendientes">Pendientes</button>
					<button class="waves-effect waves-light btn blue darken-2" id="btnNuevaSolicitud">Nueva</button>
				</ul>
			</div>
			<div id="sAceptadasMaestro">
				<h5>Solicitudes aceptadas</h5>
				<?php include 'sAceptadasMaestro.php';?>
			</div>
			<div id="sPendientesMaestro">
				<?php include 'sPendientesMaestro.php';?>
			</div>
			<div id="sNuevaMaestro">
				<h5>Nueva solicitud</h5>
				<?php include 'sNuevaMaestro.php';?>
			</div>
		</div>
		<div id="reportes">
			<?php include 'seleccionListaAsistencia.php';?>
		</div>
		<div id="salir">
			<?php include '..\Genericos\salirSistema.php';?>
		</div>
	</div>
</body>
</html>