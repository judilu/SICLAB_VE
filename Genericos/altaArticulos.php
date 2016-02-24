<div id="altaArticulos2">
	<div class="col s12">
		<div class="row">
			<div class="col s6">
				<form action="#">
					<div class="file-field input-field">
						<div class="btn">
							<span>File</span>
							<input type="file">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" id="txtImg">
						</div>
					</div>
				</form>
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
					<select id="cmbNombreArt">
						<option value="" disabled selected>Seleccione</option>
						<option value="1">Osiloscopio</option>
						<option value="2">Cautín</option>
						<option value="3">Pasta</option>
					</select>
					<label>Nombre del artículo</label>
				</div>
				<div class="input-field col s4 offset-s1">
					<input id="txtMarcaArt" type="text" class="validate">
					<label class="active" for="txtMarcaArt">Marca</label>
				</div>
				<div class="input-field col s2 offset-s1">
					<input id="txtTipoContenedor" type="text" class="validate">
					<label class="active" for="txtTipoContenedor">Tipo de contenedor</label>
				</div>		
			</div>
			<div class="row">
				<div class="input-field col s2">
					<select id="cmbUm">
						<option value="" disabled selected>Seleccione</option>
						<option value="1">Pieza</option>
						<option value="2">Litros</option>
						<option value="3">Mililitros</option>
						<option value="4">Kilogramos</option>
						<option value="5">Gramos</option>
						<option value="6">Miligramos</option>
					</select>
					<label>Unidad medida</label>
				</div>
				<div class="input-field col s2">
					<input id="txtClaveKit" type="text" class="validate">
					<label class="active" for="txtClaveKit">Clave kit</label>
				</div>
				<div class="input-field col s3  offset-s1">
					<input id="txtFechaCaducidad" type="text" class="validate">
					<label class="active" for="txtFechaCaducidad">Caducidad(dd/mm/aaaa)</label>
				</div>
				<div class="input-field col s3 offset-s1">
					<input id="txtUbicacion" type="text" class="validate">
					<label class="active" for="txtUbicacion">Ubicación(Estante#,cajón#)</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<textarea id="txtDescripcionArt" type="text" class="materialize-textarea"></textarea>
					<label class="active" for="txtDescripcionArt">Descripción del artículo</label>
				</div>
				<div class="input-field col s6">
					<textarea id="txtDescripcionUso" type="text" class="materialize-textarea"></textarea>
					<label class="active" for="txtDescripcionUso">Descripción de uso</label>
				</div>
			</div>
			<div class="row">
				<div class="col s5 offset-s7">
					<a id="btnAltaArt" class="waves-effect waves-light btn green darken-2"><i class="material-icons left">done</i>Dar de alta</a>
					<a id="btnCancelarAlta" class="waves-effect red darken-1 btn"><i class="material-icons left">clear</i>Cancelar</a>
				</div>
			</div>
		</div>
	</div>
</div>
