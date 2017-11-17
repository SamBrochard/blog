<?php
include "conexion.php";
include "utils.php";

$author = $_GET['idAuthor'];
$query = $pdo->prepare(
	'SELECT Title, Contents, CreationTimestamp, FirstName, Post.Id,LastName,Name,Category_Id, Author_Id
    FROM Post
	INNER JOIN Author ON Post.Author_Id = Author.Id 
	INNER JOIN Category  ON Post.Category_Id = Category.Id
	WHERE Author.Id = ?
    ORDER BY CreationTimestamp DESC');
$author = $query->execute([$author]);
$author =$query->fetchAll();
$template = "author";
$path="../";
include "../www/layout.phtml";