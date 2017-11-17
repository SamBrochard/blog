<?php
include "conexion.php";

$id= $_GET['id'];

$query = $pdo -> prepare('
	DELETE FROM POST 
	WHERE Id = $id');

$delete= $query->execute();

header("Location:admin.php");
exit;

