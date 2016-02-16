<section id="solicitudesPendientes2">
	<h5>Solicitudes por atender</h5>
		<div class="col s10 offset-s1" id="peticiones">
			<table class="bordered highlight responsive-table">
				<thead>
					<tr>
						<th data-field="numeroControl">No. de control</th>
						<th data-field="nombre">Nombre</th>
						<th data-field="fecha">Fecha</th>
						<th data-field="hora">Hora</th>
						<th data-field="accion">Acción</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>11170884</td>
						<td>Ana Patricia López Valenzuela</td>
						<td>02/10/2015</td>
						<td>14:15</td>
						<td>
							<a id= "btnAtender" class="btn waves-effect waves-light  green darken-2 "name="action">Atender</a>
							<a class="btn waves-effect waves-light red darken-1" type="submit" name="action" id="btnEliminar">Eliminar</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
</section>
<div id="atenderSolicitud">
	<?php include 'atenderSolicitud.php';?>
</div>
