<!DOCTYPE html>
<html lang="es">
<head>
	<?php include '..\Inicio\head.php';?>
</head>
<body>
	<section id="atenderSolicitud" class="body2">
		<div class="row">
			<div class="col s12">
				<div class="row">
					<div class="input-field col s4">
						<input id="txtnombre" type="text" class="validate">
						<label for="txtnombre">Nombre</label>
					</div>
				</div>
				<div class="row">
					<div class="col s2">
						<p>Estatus: &nbsp;</p>
					</div>
					<div class="col s5 offset-s5">
						<div class="input-field col s6">
							<input id="txtcodigoBarras" type="text" class="validate">
							<label for="txtcodigoBarras">Código de barras</label>
						</div>
						<div class="col s6">
							<button class="btn waves-effect waves-light  blue darken-1" type="submit" name="agregar" id="btnAgregar">Agregar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s5">
				<table class="bordered highlight responsive-table">
					<thead>
						<tr>
							<th data-field="cantidad">Cantidad</th>
							<th data-field="descripcion">Descripcion</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Osiloscopio</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col s6 offset-s1">
				<table class="bordered highlight responsive-table">
					<thead>
						<tr>
							<th data-field="cantidad">Cantidad</th>
							<th data-field="descripcion">Descripcion</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Pasta para soldar</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col s6 offset-s6">
				<button class="btn waves-effect waves-light  light-blue darken-2" type="submit" name="action">Finalizar</button>
				<button class="btn waves-effect waves-light amber" type="submit" name="action" id="btnCancelar">Cancelar</button>
				<button class="btn waves-effect waves-light amber" type="submit" name="action">Eliminar</button>
				<button class="btn waves-effect waves-light green darken-2 " type="submit" name="action" id="btnFinalizar">Finalizar</button>
				<button class="btn waves-effect waves-light red darken-1" type="submit" name="action" id="btnCancelar">Cancelar</button>
			</div>
		</div>
	</section>
</body>
</html>