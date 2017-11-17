<?php
include "php/utils.php";
include "php/conexion.php";
$query = $pdo->prepare('SELECT Title, Contents,Img,CreationTimestamp, FirstName, Post.Id,LastName,Name,Category_Id,Author_Id
    FROM Post
	INNER JOIN Author ON Post.Author_Id = Author.Id 
	INNER JOIN Category  ON Post.Category_Id = Category.Id
    ORDER BY CreationTimestamp DESC LIMIT 10');
$post = $query->execute();
$post =$query->fetchAll();
$template = "index";
$path = "";
include "www/layout.phtml";


/***************corection******************/
/*
<?php

// index.php

$pdo = new PDO('mysql:host=localhost;dbname=blog;','root','troiswa');
$pdo->exec("SET NAMES UTF8");

$resultSet = $pdo->query('
	SELECT Title, Contents, CreationTimestamp, FirstName, LastName
    FROM Post
	INNER JOIN Author ON Post.Author_Id = Author.Id 
    ORDER BY CreationTimestamp DESC');

$resultSet->execute();

$posts = $resultSet->fetchAll(PDO::FETCH_ASSOC);

include "index.phtml";


// index.phtml

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
    <title>blog !</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
		
	<?php foreach($posts as $post): ?>
		<h2><?= $post['Title'] ?></h2>
		<h3>Par : <?= $post['FirstName'] ?> <?= $post['LastName'] ?></h3>
		<p><?= $post['Contents'] ?></p>
	<?php endforeach ?>
	
</body>
</html>
*/
