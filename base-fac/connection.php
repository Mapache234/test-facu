<?php

//$mdb = new PDO('mysql:host=localhost;dbname=form_indeseables', 'root', '');

try 
{
	$mdb = new PDO('mysql:host=localhost;dbname=form_indeseables', 'root', '');

}
catch (PDOException $e) 
{
    echo 'Error: ' . $e->getMessage();
    exit();
}
echo 'Conectado a MySQL';

?>