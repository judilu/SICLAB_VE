<div id="mantenimientoArt">
	<div class="col s12 m8 offset-m2 l6 offset-l3">
		<div class="row">
			<div class="col s2">
				<img src="../img/persona.png" alt="" class="circle responsive-img">
			</div>
			<div class="col s3 offset-s1">
				<a class="waves-effect waves-light btn blue darken-1" id="btnSeleccionarImg">Seleccionar</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12">
			<div class="row">
				<div class="input-field col s4">
					<input id="txtCodigoBarras" type="text" class="validate">
					<label class="active" for="txtCodigoBarras">Código de barras</label>
				</div>
				<div class="input-field col s4 offset-s1">
					<input id="txtModeloArt" type="text" class="validate">
					<label class="active" for="txtModeloArt">Modelo</label>
				</div>
				<div class="input-field col s2 offset-s1">
					<input id="txtNumSerie" type="text" class="validate">
					<label class="active" for="txtNumSerie">Número de serie</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s4">
					<input id="txtNombreArt" type="text" class="validate">
					<label class="active" for="txtNombreArt">Nombre del artículo</label>
				</div>
				<div class="input-field col s4 offset-s1">
					<input id="txtMarcaArt" type="text" class="validate">
					<label class="active" for="txtMarcaArt">Marca</label>
				</div>
				<div class="input-field col s2 offset-s1">
					<input id="txtFechaCaducidad" type="text" class="validate">
					<label class="active" for="txtFechaCaducidad">Fecha de caducidad</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s5">
					<input id="txtLugarReparacion" type="text" class="validate">
					<label class="active" for="txtNombreArt">Lugar de reparación</label>
				</div>
				<div class="input-field col s4">
					<input type="date" class="datepicker">
					<label for="txtFecha"></label>
				</div>
				<div class="input-field col s2 offset-s1">
					<select>
						<option value="" disabled selected>Hora</option>
						<option value="1">10:00</option>
						<option value="2">11:00</option>
						<option value="3">12:00</option>
					</select>
					<label>Hora</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<textarea id="txtDescripcionUso" type="text" class="materialize-textarea"></textarea>
					<label class="active" for="txtDescripcionUso">Motivo de la reparación</label>
				</div>
			</div>
			<div class="row">
				<div class="col s5 offset-s7">
					<a id="btnGuardaMantenimiento" class="waves-effect waves-light btn green darken-2"><i class="material-icons left">done</i>Aceptar</a>
					<a id="btnCancelarBaja" class="waves-effect btn red darken-1"><i class="material-icons left">clear</i>Cancelar</a>
				</div>
			</div>
		</div>
	</div>
</div>
