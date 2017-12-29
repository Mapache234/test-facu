<?php
//including the database connection file
include("connection.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$sql = "DELETE FROM indeseables WHERE id=:id";
$query = $mdb->prepare($sql);
$query->execute(array(':id' => $id));

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
