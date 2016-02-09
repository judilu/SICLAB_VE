<!DOCTYPE html>
<html lang="es">
<head>
	<?php include '..\Inicio\head.php';?>
</head>
<body>
	<form class="accesoAlumno" id="body2">
		<div class="row">
			<div class="col s2">Fecha: 01/12/2015</div>
			<div class="row">
				<div class="col s3 offset-s9">
					<h6>Entrada:</h6>
					<form action="#">
						<div class="col s6">
							<input name="grpRdoEntrada" type="radio" id="rdoAlumno" checked/>
							<label for="rdoAlumno">Alumno</label>
						</div>
						<div class="col s6">
							<input name="grpRdoEntrada" type="radio" id="rdoExterno" />
							<label for="rdoExterno">Externo</label>
						</div>
					</form>
				</div>
			</div>
			<div class="col s2">
				<p>
					<img class="materialboxed col s12" src="..\img\persona.png">
				</p>
			</div>
			<section class="col s5">      
				<div class="row">
					<div class="input-field col s12">
						<input id="txtNControl" type="text" class="validate" autofocus>
						<label active for="txtNControl">Número de control</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="txtNombre" type="text" class="validate">
						<label for="txtNombre">Nombre</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="txtCarrera" type="text" class="validate">
						<label for="txtCarrera">Carrera</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="txtSemestre" type="number" class="validate">
						<label for="txtSemestre">Semestre</label>
					</div>
				</div>
				<div class="row">
					<div class="col s6 offset-s2">
						<h6>Material:</h6>
						<form action="#">
							<div class="col s4">
								<input name="grpRdoMaterial" type="radio" id="rdoSi" checked/>
								<label for="rdoSi">Si</label>
							</div>
							<div class="col s4 offset-s3">
								<input name="grpRdoMaterial" type="radio" id="rdoNo" />
								<label for="rdoNo">No</label>
							</div>
						</form>
					</div>
				</div>
			</section>
			<div class="col s5" id="tecladoNumerico">
				<div class="row filaNumeros">
					<p>
						<a class="waves-effect waves-light btn-large light-blue darken-1 col s2 offset-s1" id="btn1">1</a>
					</p>
					<p>
						<a class="waves-effect waves-light btn-large light-blue darken-1 col s2 offset-s2" id="btn2">2</a>
					</p>
					<p>
						<a class="waves-effect waves-light btn-large light-blue darken-1 col s2 offset-s2" id="btn3">3</a>
					</p>
				</div>
				<div class="row filaNumeros">
					<p>
						<a class="waves-effect waves-light btn-large light-blue darken-1 col s2 offset-s1" id="btn4">4</a>
					</p>
					<p>
						<a class="waves-effect waves-light btn-large light-blue darken-1 col s2 offset-s2" id="btn5">5</a>
					</p>
					<p>
						<a class="waves-effect waves-light btn-large light-blue darken-1 col s2 offset-s2" id="btn6">6</a>
					</p>
				</div>
				<div class="row filaNumeros">
					<p>
						<a class="waves-effect waves-light btn-large light-blue darken-1 col s2 offset-s1" id="btn7">7</a>
					</p>
					<p>
						<a class="waves-effect waves-light btn-large light-blue darken-1 col s2 offset-s2" id="btn8">8</a>
					</p>
					<p>
						<a class="waves-effect waves-light btn-large light-blue darken-1 col s2 offset-s2" id="btn9">9</a>
					</p>
				</div>
				<div class="row filaNumeros">
					<p>
						<a class="waves-effect waves-light btn-large blue darken-3 col s2 offset-s1" id="btnDel">DEL</a>
					</p>
					<p>
						<a class="waves-effect waves-light btn-large light-blue darken-1 col s2 offset-s2" id="btn0">0</a>
					</p>
					<p>
						<a class="waves-effect waves-light btn-large blue darken-3 col s2 offset-s2" id="btnMA">MA</a>
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s5 offset-s4">
				<button class="btn waves-effect waves-light  green darken-2" type="submit" name="action" id="btnEntrar">Entrar
				</button>
				<a class="waves-effect waves-light btn red darken-1" id="btnCancelar">Cancelar</a>
			</div>
		</div>
	</form>
</body>
<footer>
		<?php include '..\Inicio\footer.php';?>
</footer>
</html>