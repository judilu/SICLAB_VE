<section id="resumenReportes">
		<div class="row">
	        <div class="col s4 m4">
	          <div class="card blue-grey lighten-2">
	            <div class="card-content white-text">
	              <span class="card-title">Uso del laboratorio</span>
	              <p>Mes actual: 500 Alumnos</p>
	              <p>Mes anterior: 700 Alumnos</p>
	              <p>Mes con mayor uso: Marzo</p>
	            </div>
	          </div>
	        </div>
	        <div class="col s4 m4">
	          <div class="card red lighten-2">
	            <div class="card-content white-text">
	              <span class="card-title">Materiales</span>
	              <p>Mas solicitado: Cautin (100 veces)</p>
	              <p>Mas negado: Multimetro (10 veces)</p>
	              <p>Sin existencia: 5 articulos </p>
	            </div>
	          </div>
	        </div>
	        <div class="col s4 m4">
	          <div class="card orange lighten-1">
	            <div class="card-content white-text">
	              <span class="card-title">Uso del día</span>
	              <p><br></p>
	              <?php						
						require_once('../data/conexion.php');
						$conexion		= conectaBDSICLAB();
						$consulta 		= sprintf("SELECT count(*) as Contador FROM lbentradasalumnos where cast(fechaEntrada as date) = cast(curdate() as date)");
						$res 			= mysql_query($consulta);
						if($row = mysql_fetch_array($res))
							echo '<p value="'.$row["Contador"].'">'.$row["Contador"].' Usuarios internos</p>';
						?>
	              <?php						
						require_once('../data/conexion.php');
						$conexion		= conectaBDSICLAB();
						$consulta 		= sprintf("SELECT count(*) as Contador FROM lbentradasexternos where cast(fechaEntrada as date) = cast(curdate() as date)");
						$res 			= mysql_query($consulta);
						if($row = mysql_fetch_array($res))
							echo '<p value="'.$row["Contador"].'">'.$row["Contador"].' Usuarios externos</p>';
						?>
	            </div>
	          </div>
	        </div>
	        <script type="text/javascript">
    		var datos = $.ajax({
    		url:'../data/datosgrafica.php',
    		type:'post',
    		dataType:'json',
    		async:false    		
    	}).responseText;
    	
    	datos = JSON.parse(datos);
    	google.load("visualization", "1", {packages:["corechart"]});
      	google.setOnLoadCallback(dibujarGrafico);
      
      	function dibujarGrafico() {
        	var data = google.visualization.arrayToDataTable(datos);

        	var options = {
          	title: 'GRAFICA USO MENSUAL',
          	hAxis: {title: 'MESES', titleTextStyle: {color: 'green'}},
          	vAxis: {title: 'VISITAS', titleTextStyle: {color: '#FF0000'}},
          	backgroundColor:'grey ligthten-3',
          	legend:{position: 'bottom', textStyle: {color: 'blue', fontSize: 12}},
          	width:630,
            height:370
        	};

        	var grafico = new google.visualization.LineChart(document.getElementById('grafica'));
        	grafico.draw(data, options);
      	}
      	</script>
	        <div class="col s8 m8">
	          <div class="card grey lighten-3">
	            <div class="card-content black-text" id="grafica">
	              <span class="card-title">Grafica Uso Por Mes</span>
	              
	            </div>
	          </div>
	        </div>
	        <div class="col s4 m4">
	          <div class="card grey lighten-3">
	            <div class="card-content black-text">
	              <span class="card-title">Materiales sin stock</span>
	              <p><br></p>
	              <p><br></p>
	              <p><br></p>
	              <p><br></p>
	              <p><br></p>
	              <p><br></p>
	              <p><br></p>
	              <p><br></p>
	              <p><br></p>
	              <p><br></p>
	              <p><br></p>
	              <p><br></p>
	              <p><br></p>
	            </div>
	          </div>
	        </div>
	        <div class="col s12 m12">
	          <div class="card grey lighten-3">
	            <div class="card-content black-text">
	              <span class="card-title">Próximos apartados</span>
					<table>
					        <thead>
					          <tr>
					              <th data-field="id">Materia</th>
					              <th data-field="name">Profesor</th>
					              <th data-field="name">Fecha</th>
					              <th data-field="price">Hora</th>
					          </tr>
					        </thead>
					        <tbody>
					          <tr>
					            <td>Principios Electricos</td>
					            <td>Joel Bacilio</td>
					            <td>03/02/16</td>
					            <td>13:00</td>
					          </tr>
					          <tr>
					            <td>Fundamentos de electricidad</td>
					            <td>Nicomendes</td>
					            <td>05/03/16</td>
					            <td>11:00</td>
					          </tr>
					          <tr>
					            <td>Robotica</td>
					            <td>Por asignar</td>
					            <td>06/04/16</td>
					            <td>08:00</td>
					          </tr>
					        </tbody>
					      </table>
	            </div>
	          </div>
	        </div>
      </div>
</section>
