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
