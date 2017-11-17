<?php
include "utils.php";
include "conexion.php";


$query = $pdo -> prepare('SELECT FirstName,LastName,Id
	FROM Author');

$showAut = $query ->execute();
$showAut = $query -> fetchAll();


$template = "show_Author";
$path="../";
include "../www/layout.phtml";