<?php
include "conexion.php";

$id= $_GET['id'];

var_dump($id);

$query = $pdo -> prepare('
	DELETE FROM Comment 
	WHERE Id = ?');

$delete= $query->execute([$id]);
