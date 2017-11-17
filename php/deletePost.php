<?php
include "conexion.php";

$id= $_GET['id'];

$query = $pdo -> prepare('
	DELETE FROM Post 
	WHERE Id = ?');

$delete= $query->execute([$id]);



