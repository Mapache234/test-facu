<?php
	/*Inicio la conección con la base de datos
	PDO(HOST,NOMBRE_DB,USER,PASS)
	*/
	$mbd = new PDO('mysql:host=localhost;dbname=FACU', "root", "");
	/*foreach($mbd->query('SELECT * from persona') as $fila) {
        echo $fila[1];
    }*/
?>