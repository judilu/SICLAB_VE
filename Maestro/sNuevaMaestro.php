<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" href="../css/maestro.css">
</head>
<body>
	<div class="solNuevaMaestro">
		<div class="row" id="principal">
			<div class="col s12">
				<div class="row">
					<div class="input-field col s2">
						<input id="txtClaveMaestro" type="text" class="validate">
						<label for="txtClaveMaestro">Clave del maestro</label>
					</div>
					<div class="input-field col s8">
						<input id="txtNombreMaestro" type="text" class="validate">
						<label for="txtNombreMaestro">Nombre del maestro</label>
					</div>
					<div class="input-field col s2">
						<input id="txtFolio" type="text" class="validate">
						<label for="txtFolio">Folio</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s2">
						<input type="date" class="datepicker">
						<label for="txtFecha"></label>
					</div>
					<div class="input-field col s5">
						<select>
							<option value="" disabled selected>Seleccione el grupo</option>
							<option value="1">Option 1</option>
							<option value="2">Option 2</option>
							<option value="3">Option 3</option>
						</select>
						<label>Grupo</label>
					</div>
					<div class="input-field col s5">
						<select>
							<option value="" disabled selected>Seleccione la práctica</option>
							<option value="1">Option 1</option>
							<option value="2">Option 2</option>
							<option value="3">Option 3</option>
						</select>
						<label>Práctica</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<textarea id="textarea1" class="materialize-textarea"></textarea>
						<label for="textarea1">Motivo de uso</label>
					</div>
					<div class="col s4">
						<a class="waves-effect waves-light btn amber darken-2" id="btnElegirMaterial">Elegir material</a>
					</div>
				</div>
			</div>
		</div>
		<div id="eleccionMaterial">
			<div class="row">
				<div class="col s12">
					<div class="row">
						<div class="input-field col s4 offset-s1">
							<input placeholder="Nombre del artículo" id="txtNombreArticulo" type="text" class="validate">
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
							<a class="waves-effect waves-light btn green darken-2 " id="btnFinalizar">Finalizar</a>
							<a class="waves-effect waves-light btn amber darken-2" id="btnRegresar">Regresar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>