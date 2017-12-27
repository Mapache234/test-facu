<?php
	//Llamo a la conección de la base de datos.
	require_once("conection.php");

	$nombre = "";
	//REQUEST acepta tanto POST como GET
	if(!empty($_REQUEST['nombre'])){
		$nombre = $_REQUEST['nombre'];
		//Preparo el insert
	    $insertar = $mbd->prepare("INSERT INTO persona (nombre) VALUES (:nombre)");
	    //Remplazo el ":nombre" con el valor de $nombre
	    $insertar->bindParam(":nombre",$nombre);
	    //Ejecuto la query. Si falla, BARDO!
	    if(!$insertar->execute())
	    	echo "BARDO!";
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>FACU</title>
		<meta charset="utf-8">
		<?php /*LLAMO A BOOTSTRAP 4.0*/ ?>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<?php
			if($nombre){ ?>
				<span class="caca">Vos escribiste <?=htmlspecialchars($_REQUEST['nombre'])?> como tu nombre, pero parece demasiado ridículo como para ser verdad.<?php } ?></span>
			<div class="row" style="margin-top: 30px;">
				<div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-6">
				    <form id="formPENE" action="#" method="POST">
					    <div class="input-group mb-3">
					        <input type="text" class="form-control" maxlength="20" id="nombre" value="<?=($nombre)?$nombre:""?>" name="nombre" placeholder="Nombre">
					    </div>
				        <button class="btn btn-dark" type="submit">Enviar datos</button>
				    </form>
				</div>
				<div class="col-12 col-sm-4 col-md-6 col-lg-6 col-xl-6" style="background-color: red; height: 30px;">
				</div>
			</div>
		</div>
	</body>
</html>
<?php /* LLAMO A JQUERY.CND es un coso que ta en la nube para que boludos como nosotros no se bajen las cosas al pedo y usemos las de arriba. */ ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	//Cuando el documento(la pagina) esté cargada por completo, hago lo siguiente...
	$(document).ready(function(){
		//En el submit, hago lo siguiten...
		$("#formPENE").submit(function(){
			if(!$("#nombre").val().length)
				return false;//Cancelo el submit;
		});
	});
</script>
<style type="text/css">
	.caca{
		font-size: 50px;
		color: #ff0000;
		border: 3px solid #00ff00;
		border-radius:5px;
	}

	@media(min-width: 500px){
		*{
			color:red!important;
		}
	}
</style>