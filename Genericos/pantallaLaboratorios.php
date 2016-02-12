<!DOCTYPE html>
<html lang="es">
<head>
	<?php include '..\Inicio\head.php';?>
</head>
<body>
	<div id="pantallaLaboratorios" class="body2">
		<div class="row">
			<div class="col s12">
				<ul class="tabs" id="selector">
					<li id="tabPrestamos" class="tab col s2"><a class="active breadcrumb" href="#prestamos">Préstamos</a></li>
					<li id="tabLabs" class="tab col s2"><a class="breadcrumb" href="#laboratorios">Laboratorios</a></li>
					<li id="tabInventario" class="tab col s2"><a class="breadcrumb" href="#inventarios">Inventario</a></li>
					<li id="tabRe´portes" class="tab col s2"><a class="breadcrumb" href="#reportes">Reportes</a></li>
					<li class="tab col s2"><a class="breadcrumb" href="#salir">Salir</a></li>
				</ul>
			</div>
		</div>
		<div id="prestamos" class="col s12">
			<div id="menuPrestamos">
				<ul>
					<a class="waves-effect waves-light btn blue darken-1" id="btnPendientes">Pendientes</a>
					<a class="waves-effect waves-light btn blue darken-2" id="btnEnProceso">En proceso</a>
				</ul>
			</div>
			<div id="solicitudesPendientes">
				<h5>Solicitudes por atender</h5>
				{{> solicitudesPendientes}}
			</div>
			<div id="solicitudesEnProceso">
				<h5>Solicitudes en proceso</h5>
				{{> solicitudesEnProceso}}
			</div>
		</div>
		<div id="laboratorios" class="col s12">
			<div id="menuLaboratorios">
				<ul>
					<a class="waves-effect waves-light btn blue darken-1" id="btnPendientesLab">Pendientes</a>
					<a class="waves-effect waves-light btn grey" id="btnAceptadasLab">Aceptadas</a>
				</ul>
			</div>
			<div id="sPendientesLab">
				<h5>Solicitudes de laboratorio</h5>
				{{> solicitudesPendientesLaboratorio}}
			</div>
			<div id="sAceptadasLab">
				<h5>Solicitudes de laboratorio</h5>
				{{> solicitudesAceptadasLaboratorio}}
			</div>
		</div>
		<div id="inventarios">
			<div id="menuInventario">
				<ul>
					<a class="waves-effect waves-light btn grey" id="btnArticulos">Articulos</a>
					<a class="waves-effect waves-light btn blue darken-2" id="btnAlta">Alta</a>
					<a class="waves-effect waves-light btn blue darken-2" id="btnBaja">Baja</a>
					<a class="waves-effect waves-light btn blue darken-1" id="btnPeticionesPendientes">Peticiones pendientes</a>
					<a class="waves-effect waves-light btn blue darken-1" id="btnPeticiónArticulo">Petición artículo</a>
				</ul>
			</div>
			<div id="pantallaInventario">
				<h5>Inventario</h5>
				{{> pantallaInventario}}
			</div>
			<div id="altaArticulos">
				<h5>Alta de artículos</h5>
				{{> altaArticulos}}
			</div>
			<div id="bajaArticulos">
				<h5>Baja de artículos</h5>
				{{> bajaArticulos}}
			</div>
			<div id="peticionesPendientes">
				<h5>Peticiones pendientes</h5>
				{{> peticionesPendientes}}
			</div>
			<div id="peticionesArticulos">
				<h5>Peticiones de articulos</h5>
				{{> peticionesArticulos}}
			</div>
		</div>
		<div id="reportes">
			<div id="menuReportes">
				<ul>
					<a class="waves-effect waves-light btn blue darken-2" id="btnReporteLabs">Laboratorios</a>
				</ul>
			</div>
		</div>
		<div id="salir">
			{{> salirSistema}}
		</div>
	</div>
</body>
<footer>
		<?php include '..\Inicio\footer.php';?>
</footer>
</html>