<section id="atenderSolicitud2">
	<div class="row">
		<div class="col s12">
			<div class="row">
				<div class="input-field col s4">
					<input id="txtnombreAlumnoPrestamo" type="text" class="validate">
					<label for="txtnombreAlumnoPrestamo">Nombre</label>
				</div>
			</div>
			<div class="row">
				<div class="col s2">
					<p>Estatus: &nbsp;</p>
				</div>
				<div class="col s5 offset-s5">
					<div class="input-field col s6">
						<input id="txtcodigoBarrasPrestamo" type="text" class="validate">
						<label for="txtcodigoBarrasPrestamo">Código de barras</label>
					</div>
					<div class="col s6">
						<button class="btn waves-effect waves-light  blue darken-1" type="submit" name="agregar" id="btnAgregarArtPrestamo">Agregar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s5">
			<table class="bordered highlight responsive-table" id="tbListaMaterialPrestamo">
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
						
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col s8 offset-s4">
			<input type="hidden" id="txtClavePrestamo">
			<a class="btn waves-effect waves-light green darken-2 " type="submit" name="action" id="btnFinalizar">Finalizar</a>
			<a class="btn waves-effect waves-light red darken-1" type="submit" name="action" id="btnCancelarSolPendiente">Cancelar</a>
			<a class="btn waves-effect waves-light amber" type="submit" name="action">Eliminar</a>
		</div>
	</div>
</section>
