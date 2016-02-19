<div id="sancionesAlumnos2">
	<h5>Aplicar sanción</h5>
	<div class="row">
		<div class="col s12">
			<div class="row">
				<div class="input-field col s2">
					<input id="txtClaveMaestro" type="text" class="validate">
					<label for="txtNumeroControl">Número de control</label>
				</div>
				<div class="input-field col s7">
					<input id="txtNombreMaestro" type="text" class="validate">
					<label for="txtNombreAlumno">Nombre del alumno</label>
				</div>
				<div class="input-field col s3">
					<input id="txtFolio" type="text" class="validate">
					<label for="txtIdentificadorArt">Artículo</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s2">
					<input type="date" class="datepicker">
					<label for="txtFecha">Fecha</label>
				</div>
				<div class="input-field col s5">
					<select>
						<option value="" disabled selected>Seleccione la sanción</option>
						<option value="1">Option 1</option>
						<option value="2">Option 2</option>
						<option value="3">Option 3</option>
					</select>
					<label>Sanciones</label>
				</div>
				<div class="input-field col s5">
					<textarea id="textarea1" class="materialize-textarea"></textarea>
					<label for="textarea1">Comentarios</label>
				</div>
			</div>
			<div class="row">
				<div class="col s4 offset-s4">
					<a class="waves-effect waves-light btn green darken-2 " id="btnFinalizar">Finalizar</a>
					<a class="waves-effect waves-light btn amber darken-2" id="btnRegresarSancion">Regresar</a>
				</div>
			</div>
		</div>
	</div>
</div>
