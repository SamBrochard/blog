<?php
include "utils.php";
include "conexion.php";
$Cat = $_GET['idCat'];
$query = $pdo->prepare(
	'SELECT Title, Contents, CreationTimestamp, FirstName, Post.Id,LastName,Name,Category_Id,Author_Id
    FROM Post
	INNER JOIN Author ON Post.Author_Id = Author.Id 
	INNER JOIN Category  ON Post.Category_Id = Category.Id
	WHERE Category.Id = ?
    ORDER BY CreationTimestamp DESC');
$category = $query->execute([$Cat]);
$category =$query->fetchAll();

$template = "category";
$path="../";
include "../www/layout.phtml";