<!DOCTYPE html>
<html lang="es">
<head>
	<script src="..\js\maestros.js"></script>
</head>
<body>
	<div id = "editarSolLab">
		<?php require_once('../data/conexion.php');?>
		<div class="row" id="editarSol">
			<h5>Editar Solicitud</h5>
			<div class="col s12">
				<div class="row">
					<div class="input-field col s8">
						<select id="cmbMateriaE">
							<option value="" disabled selected>Seleccione la materia</option>
							<option value="Ingenieria Web">Ingenieria Web</option>
						</select>
						<label>Materia</label>
					</div>
					<div class="input-field col s2">
						<select id="cmbHoraMatE">
							<option value="" disabled selected>Seleccione la hora</option>
							<option value="1">11:30</option>
							<option value="2">12:30</option>
						</select>
						<label>Hora de la materia</label>
					</div>
					<div class="input-field col s2">
						<input id="txtFechaE" type="date" class="datepicker">
						<label for="txtFechaE"></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s8">
						<select id="cmbPracticaE">
							<option value="" disabled selected>Seleccione la práctica</option>
							<option value="1">Aprendiendo</option>
						</select>
						<label>Práctica</label>
					</div>
					<div class="input-field col s2">
						<select id="cmbHoraPractE">
							<option value="" disabled selected>Seleccione la hora</option>
							<option value="1">10:00</option>
							<option value="2">11:00</option>
							<option value="3">12:30</option>
						</select>
						<label>Hora de la práctica</label>
					</div>
					<div class="input-field col s2">
						<input id="txtCantAlumnosE" type="number" class="validate">
						<label class="active" for="txtCantAlumnosE">Cant. de alumnos</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s8">
						<select id="cmbLaboratorioE">
							<option value="" disabled selected>Seleccione el laboratorio</option>
							<option value="1">Diseño movil</option>
							<option value="2">Programacion web</option>
						</select>
						<label>Laboratorio</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<textarea id="textarea1E" class="materialize-textarea"></textarea>
						<label for="textarea1E">Motivo de uso</label>
					</div>
					<div class="col s4 offset-s1">
						<a class="waves-effect waves-light btn amber darken-2" id="btnElegirMaterialE">Elegir material</a>
					</div>
				</div>
			</div>
		</div>
		<!-- //elección material -->
		<div id="eleccionMaterialE">
			<div class="row">
				<div class="col s12">
					<div class="row">
						<div class="input-field col s4 offset-s1">
							<input id="txtNombreArticulo" type="text" class="validate">
							<label for="txtNombreArticulo">Nombre del artículo</label>
						</div>
						<div class="col s3">
							<a class="waves-effect waves-light btn blue darken-1"><i class="material-icons left">search</i>Buscar</a>
						</div>
					</div>
					<div class="row">
						<div class="col s10 offset-s1">
							<table class="bordered">
								<thead>
									<tr>
										<th data-field="txtCantidad" class="col s2">Cantidad</th>
										<th data-field="txtDescripcion" class="col s6">Descripción</th>
										<th data-field="txtDescripcion" class="col s2">Seleccionar</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="col s2">1</td>
										<td class="col s6">Osciloscopio</td>
										<td class="col s2">
											<p>
												<input type="checkbox" class="filled-in" id="chbSeleccionar1" />
												<label for="chbSeleccionar1"></label>
											</p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col s4 offset-s4">
							<a class="waves-effect waves-light btn green darken-2 " id="btnFinalizarE">Finalizar</a>
							<a class="waves-effect waves-light btn amber darken-2" id="btnRegresarE">Regresar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Termina elección material -->
	</div>

</body>
</html>