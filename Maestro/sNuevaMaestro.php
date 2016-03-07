<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" href="../css/maestro.css">
</head>
<body>
	<div id="solNuevaMaestro">
		<?php include '../data/conexion.php';?>
		<div class="row" id="nuevaMaestro">
			<h5>Nueva solicitud</h5>
			<div class="col s12">
				<div class="row">
					<div class="input-field col s8">
						<select id="cmbMateria">
							<option value="" disabled selected>Seleccione la materia</option>
							<?php						
							$conexion		= conectaBDSIE();
							$consulta 		= sprintf("select MATCVE, MATNOM from DMATER where MATNOM !=' ' ORDER BY MATNOM ASC");
							$res 			= mysql_query($consulta);
							while($row = mysql_fetch_array($res))
							{
								echo '<option value="'.$row["MATCVE"].'">'.$row["MATNOM"].'</option>';
							}?>
						</select>
						<label>Materia</label>
					</div>
					<div class="input-field col s2">
						<select id="cmbHoraMat">
							<option value="" disabled selected>Seleccione la hora</option>
							<option value="1">12:30</option>
							<option value="2">01:00</option>
							<option value="3">15:00</option>
						</select>
						<label>Hora de la materia</label>
					</div>
					<div class="input-field col s2">
						<input type="date" class="datepicker">
						<label for="txtFecha"></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s8">
						<select id="cmbPractica">
							<option value="" disabled selected>Seleccione la práctica</option>
							<?php		
							$conexion		= conectaBDSICLAB();
							$consulta 		= sprintf("select clavePractica, tituloPractica from lbpracticas WHERE estatus = 'V'");
							$res 			= mysql_query($consulta);
							while($row = mysql_fetch_array($res))
							{
								echo '<option value="'.$row["clavePractica"].'">'.$row["tituloPractica"].'</option>';
							}?>
						</select>
						<label>Práctica</label>
					</div>
					<div class="input-field col s2">
						<select id="cmbHoraPract">
							<option value="" disabled selected>Seleccione la hora</option>
							<option value="1">12:30</option>
							<option value="2">01:00</option>
							<option value="3">15:00</option>
						</select>
						<label>Hora de la práctica</label>
					</div>
					<div class="input-field col s2">
						<input id="txtCantAlumnos" type="number" class="validate">
						<label for="txtCantAlumnos">Cant. de alumnos</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s8">
						<select id="cmbLaboratorio">
							<option value="" disabled selected>Seleccione el laboratorio</option>
							<?php		
							$conexion		= conectaBDSICLAB();
							$consulta 		= sprintf("select claveLaboratorio, nombreLaboratorio from lblaboratorios");
							$res 			= mysql_query($consulta);
							while($row = mysql_fetch_array($res))
							{
								echo '<option value="'.$row["claveLaboratorio"].'">'.$row["nombreLaboratorio"].'</option>';
							}?>
						</select>
						<label>Laboratorio</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<textarea id="textarea1" class="materialize-textarea"></textarea>
						<label for="textarea1">Motivo de uso</label>
					</div>
					<div class="col s4 offset-s1">
						<a class="waves-effect waves-light btn amber darken-2" id="btnElegirMaterial">Elegir material</a>
					</div>
				</div>
			</div>
		</div>
		<!-- //elección material -->
		<div id="eleccionMaterial">
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
							<a class="waves-effect waves-light btn green darken-2 " id="btnFinalizar">Finalizar</a>
							<a class="waves-effect waves-light btn amber darken-2" id="btnRegresar">Regresar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Termina elección material -->
	</div>
</body>
</html>