<?php
include "conexion.php";

$id_Article = $_GET['id'];


if (!ctype_digit($id_Article) || empty($_GET['id'])) {
	header("Location: index.php");
	exit;
}
else{

	$query = $pdo->prepare(
		'SELECT Title, Contents,img, CreationTimestamp, FirstName, LastName,Name,Category_Id,Author_Id
		FROM Post
		INNER JOIN Author ON Post.Author_Id = Author.Id 
		INNER JOIN Category  ON Post.Category_Id = Category.Id
		WHERE Post.Id = ?
		ORDER BY CreationTimestamp DESC');
	$article = $query->execute([$id_Article]);
	$article =$query->fetch();

	if ($article == false) {
		$template = "Error404";
	}
	else{
		$template = "article";
	}
}

$query = $pdo -> prepare(
	'SELECT NickName, Contents,CreationTimestamp
	FROM Comment
	WHERE Post_Id = ?
	ORDER BY CreationTimestamp DESC');

$commAffiche = $query ->execute([$id_Article]);
$commAffiche =$query-> fetchAll();
$path="../";
include "../www/layout.phtml";


	





