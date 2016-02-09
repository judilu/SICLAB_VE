<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '..\Inicio\head.php';?>
	<link rel="stylesheet" href="..\css\maestro.css">
	<script src="..\js\maestros.js"></script>
</head>
<body>
	<div class="menuMaestro" id="body2">
		<div class="row">
			<div class="col s12">
				<ul class="tabs">
					<li class="tab col s3 active"><a href="#solicitudes">Solicitudes</a></li>
					<li class="tab col s3"><a href="#reportes">Reportes</a></li>
					<li class="tab col s3"><a href="#salir">Salir</a></li>
				</ul>
			</div>
		</div>
		<div id="solicitudes" class="col s12">
			<div id="menuSolicitudesMaestro">
				<ul>
					<a class="waves-effect waves-light btn grey" id="btnSolicitudesAceptadas">Aceptadas</a>
					<a class="waves-effect waves-light btn blue darken-1" id="btnSolicitudesPendientes">Pendientes</a>
					<a class="waves-effect waves-light btn blue darken-2" id="btnNuevaSolicitud">Nueva</a>
				</ul>
			</div>
			<div id="sAceptadasMaestro">
				<h5>Solicitudes aceptadas</h5>
				<?php include 'sAceptadasMaestro.php';?>
			</div>
			<div id="sPendientesMaestro">
				<h5 id="etiquetaPendientes">Solicitudes pendientes</h5>
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
			<?php include 'salirSistema.php';?>
		</div>
	</div>
</body>
<footer>
	<?php include '..\Inicio\footer.php';?>
</footer>
</html>