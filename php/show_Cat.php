<?php
include "utils.php";
include "conexion.php";


$query = $pdo -> prepare('SELECT Name,Id
	FROM Category');

$showCat = $query ->execute();
$showCat = $query -> fetchAll();


$template = "show_Cat";
$path="../";
include "../www/layout.phtml";