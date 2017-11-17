<?php


include "conexion.php";
// recuperation des categories pour le formulaire
$query = $pdo-> prepare('
	SELECT Name , Id
	FROM Category
	ORDER BY Name');
$Cat = $query->execute();
$Cat = $query ->fetchAll();


// recuperation des auteurs 


$query = $pdo-> prepare('
	SELECT FirstName , LastName,Id
	FROM Author
	ORDER BY LastName');
$Aut = $query->execute();
$Aut = $query ->fetchAll();

$template = "InserPost";
$path="../";
include "../www/layout.phtml";