<div id="devolucionMaterial2">
	<h5>Devolución de material</h5>
	<div class="row">
		<div class="col s12">
			<div class="row">
				<div class="input-field col s4">
					<input id="txtnombre" type="text" class="validate">
					<label for="txtnombre">Nombre</label>
				</div>
			</div>
			<div class="row">
				<div class="col s5 offset-s7">
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
		<div class="col s8 offset-s2">
			<table class="bordered highlight responsive-table" id="tbListaArticulosDevolucion">
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col s7 offset-s5">
			<a class="btn waves-effect waves-light green darken-2 " type="submit" name="action" id="btnFinalizarDevolucion">Finalizar</a>
			<a class="btn waves-effect waves-light red darken-1" type="submit" name="action" id="btnCancelarDevolucion">Cancelar</a>
		</div>
	</div>		
</div>
<div id="aplicaSanciones">
	<?php include 'sanciones.php';?>
</div>
