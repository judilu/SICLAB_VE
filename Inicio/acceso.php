<!DOCTYPE html>
<html lang="es">
<head>
	<?php include 'head.php';?>
	<script src="../js/usuarios.js"></script>
</head>
<body>
	<form class="acceso" id="body2">
		<div class="row">
			<div class="col s6 offset-s3 card-panel white">
				<div class="row">
					<div class="col s8 offset-s2"> 
						<h5>Ingrese sus datos de inicio:</h5>
					</div>
					<div class="col s12">
						<div class="input-field col s10 offset-s1">
				          <i class="material-icons prefix">account_circle</i>
				          <input id="txtUsuario" type="text" class="validate" autofocus>
				          <label for="txtUsuario">Usuario</label>
				        </div>
					</div>
					<div class="col s12">
						<div class="input-field col s10 offset-s1">
				          <i class="material-icons prefix">lock</i>
				          <input id="txtClave" type="password" class="validate">
				          <label for="txtClave">Contraseña</label>
				        </div>
					</div>
					<div class="col s12">
						<div class="col s6 offset-s4">
							<a class="waves-effect waves-light btn blue darken-1" id="btnIngresar"><i class="material-icons right">perm_identity</i>Ingresar</a>
						</div>
					</div>
				</div>
	        </div>
	    </div>
	</form>
	<?php include '../Alumno/accesoAlumno.php';?>
</body>
<footer>
		<?php include 'footer.php';?>
</footer>
</html>