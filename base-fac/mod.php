<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$nombre=$_POST['nombre'];
	$nacimiento=$_POST['nacimiento'];
		
	// checking empty fields
	if(empty($nombre) || empty($nacimiento)) {	
			
		if(empty($nombre)) {
			echo "<font color='red'>El campo NOMBRE está vacío.</font><br/>";
		}
		
		if(empty($nacimiento)) {
			echo "<font color='red'>El campo NACIMIENTO está vacío.</font><br/>";
		}
		
	} else {	
		//updating the table
		$sql = "UPDATE indeseables SET nombre=:nombre, nacimiento=:nacimiento WHERE id=:id";
		$query = $mdb->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':nombre', $nombre);
		$query->bindparam(':nacimiento', $nacimiento);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM indeseables WHERE id=:id";
$query = $mdb->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$nombre = $row['nombre'];
	$nacimiento = $row['nacimiento'];
}
?>
<html>
<head>	
	<title>Modificar información</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<body>
	<a href="index.php">Inicio</a>
	<br/><br/>
<!-- FORMULARIO -->
	<div class="container" style="margin-top: 50px;">
		<?php 
		   	//hace a la fecha tomada de la base de datos presentable
			$date = date_create($nacimiento);
			//para poder darle el formato necesario
			$fecha = date_format($date, 'd/m/Y'); 
			?>
		<h2>Modificar</h2>
		<p style="margin-top: 30px"><span style="font-weight: bold;">Nombre original:</span> <?php echo $nombre ?></p>
		<p><span style="font-weight: bold;">Nacimiento original:</span> <?php echo $fecha ?></p>
	<form id="formulario" action="mod.php" method="POST">
	<div class="input-group mb-3" style="margin-top: 30px">
	<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>">
	</div>
	<div id="error_text"></div>
	<div class="input-group mb-3">
	<input type="date" class="form-control" id="nacimiento" name="nacimiento" value="<?php echo $nacimiento;?>">		
	</div>
	<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
	<button class="btn btn-block btn-primary" name="update" type="submit">Modificar</button>
	</form>
	</div>
<!-- FIN FORMULARIO -->
</body>
</html>
