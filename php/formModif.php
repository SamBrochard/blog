<?php
// on se connecte a la base
include "conexion.php";

// recuperation des Auteur pour le formulaire
$query = $pdo-> prepare('
	SELECT FirstName , LastName,Id
	FROM Author
	ORDER BY LastName');
$Aut = $query->execute();
$Aut = $query ->fetchAll();

// on recupère la liste des catégories pour le formulaire
$PostSelect = $_GET['id'];
$query = $pdo-> prepare('
	SELECT Name , Id
	FROM Category
	ORDER BY Name');
$Cat = $query->execute();
$Cat = $query ->fetchAll();


// on recupère les données du post séléctionner pour pré remplir le formulaire de modification
$query = $pdo -> prepare('SELECT Post.Id, Category_Id, Author_Id, Contents,Title
	FROM Post
	WHERE Post.Id = ?');
$Post = $query-> execute([$PostSelect]);
$Post = $query -> fetch();
// on inclut le formulaire de modification 
$template = "formModif";
$path="../";
include "../www/layout.phtml";