<?php
//conectar base de datos
	require_once("connection.php");

	$nombre = "";
	$nacimiento = "";
	if(!empty($_REQUEST['nombre']) && !empty($_REQUEST['nacimiento']))
	{
		$nombre = $_REQUEST['nombre'];
		$nacimiento = $_REQUEST['nacimiento'];

		$insertar = $mdb->prepare("INSERT INTO indeseables (nombre,nacimiento) VALUES (:nombre,:nacimiento)");
		$insertar->bindParam(':nombre',$nombre);
		$insertar->bindParam(':nacimiento',$nacimiento);

		if(!$insertar->execute())
		{
			echo "Revisar el código de la base de datos.";
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Personas NO Gratas</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
		<div class="fondo">
			<div class="container" style="margin-top: 50px;">
				<div class="jumbotron jumbotron-fluid">
			  		<div class="container">
			    		<h2 class="display-5">Bienvenido</h2>
			    		<h2 class="display-4">Base de datos de Personas NO Gratas</h2>
			    		<p class="lead">Aquí usted podrá ingresar el nombre de las personas que le joden la vida y así poder mantener un registro de las mismas 
				y advertir a otras personas antes de que ellas mismas se vean comprometidas.</p>
			  		</div>
				</div>
				<div class="card">
			
				<p class="card-text" style="text-align: center; font-weight: bold;">Ingrese los datos de la persona indeseable.</p>
				</div>
			
			<!-- FORMULARIO -->
				<form id="formulario" action="#" method="POST">
				<div class="input-group mb-3" style="margin-top: 30px">
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el Nombre del indeseable">
				</div>
				<div class="input-group mb-3">
				<input type="date" class="form-control" id="nacimiento" name="nacimiento" >		
				</div>
				<button class="btn btn-block btn-info" type="submit">Agregar</button>
				</form>
			<!-- FIN FORMULARIO -->
			</div>
		
			<div class="container" style="text-align: center; ">
			
				<p><?php
						if($nombre){ ?>
							<span class="registro">El indeseable <span style="color:red;"><?=htmlspecialchars($_REQUEST['nombre'])?></span> nacido el <span style="color:red;"><?=htmlspecialchars($_REQUEST['nacimiento'])?></span> ha sido ingresado en la base de datos.<?php } ?></span>
				</p>
			
			<?php
			// Se conecta otra vez para poder mostrar la tabla con los indeseables
			    //include_once "connection.php";
			    $sql = $mdb->prepare("SELECT id, nombre, nacimiento FROM indeseables") ; 
			    // todavía no entiendo muy bien todas las funciones y cuándo se pasan variables en execute() por ej.
			    $sql->execute() ; 
			?>
					<table class="table table-hover table-inverse table-sm table-responsive ">
					    <thead>
					        <tr>
					            <th>ID</th>
					            <th>Nombre</th>
					            <th>Nacimiento</th>
					        </tr>
					    </thead>
					    <tbody>
					        <!--Usando un loop para crear cada fila-->
					        <?php while( $row = $sql->fetch()) : ?>
					        	<?php 
					        	//hace a la fecha tomada de la base de datos presentable
								$date = date_create($row['nacimiento']);
								//para poder darle el formato necesario
								$fecha = date_format($date, 'd/m/Y'); 
								?>
					        <tr>
					            <!--Cada columna es hecha eco en cada celda de la tabla-->
					            <td><?php echo $row['id']; ?></td>
					            <td><?php echo $row['nombre']; ?></td>
					            <td><?php echo $fecha; ?></td> <!-- //$row['nacimiento']; ?></td> -->
					            
					            <td><?php echo "<a href=\"mod.php?id=$row[id]\" name=\"borrar\" class=\"btn btn-dark\">Modificar</a>" ?> </td>
					            <td><?php echo "<a href=\"del.php?id=$row[id]\" onClick=\"return confirm('¿Seguro querés borrar a $row[nombre] del registro?')\" name=\"borrar\" class=\"btn btn-danger\">borrar</a></td>" ?></td>
					        </tr>
					        <?php endwhile ?>
					    </tbody>
					</table>
			</div>
		</div>
	</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
		$("#formulario").submit(function()
		{
			if(!$("#nombre").val().length && !$("#nacimiento").val().length)
				return false;
			if(!$("#nacimiento").val().type("date"))
				$('#error_date').html("<span>Tenés que usar el formato de fecha AAAA-MM-DD.</span>")
				return false;
		}
	})
</script>

<style type="text/css">
	td,th
	{
		text-align: center;
		vertical-align: center;
		padding-bottom: 0.5em;
		background-color: rgba(255,255,255,0.5);
	}
	.registro
	{
		text-decoration: underline;
		text-decoration-color: rgb(70,20,30);
		color:blue;
	}
	.jumbotron
	{
		background-color: rgba(255,155,80,0.6);
		background-blend-mode: luminosity;
		/*opacity: 0.5;*/
	}
	.card
	{
		background-color: rgba(255,255,255,0.5);
	}
	table
	{
		background-color: rgba(255,255,255,0.5);
	}
	body
	{
		background-color: rgba(255,200,155,0.7);
		
	}
	html 
	{
  		background: url('https://upload.wikimedia.org/wikipedia/commons/0/0f/Mario_Hart.jpg') no-repeat center center fixed;
  		-webkit-background-size: cover;
  		-moz-background-size: cover;
  		background-size: cover;
  		-o-background-size: cover;
	}
</style>