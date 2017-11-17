<?php
include "conexion.php";
include "utils.php";

$query = $pdo-> prepare('
	SELECT Title,FirstName,LastName,Name,Post.Id
	FROM Post
	INNER JOIN Author ON Post.Author_Id = Author.Id 
	INNER JOIN Category  ON Post.Category_Id = Category.Id
    ORDER BY CreationTimestamp DESC');
$post= $query->execute();
$post = $query->fetchAll();

$query = $pdo-> prepare('
	SELECT NickName,Comment.CreationTimestamp,Title,Comment.Id
	FROM Comment
	INNER JOIN Post ON Comment.Post_Id = Post.Id 
    ORDER BY CreationTimestamp DESC');
$com = $query->execute();
$com = $query->fetchAll();
$template = "admin";
$path="../";
include "../www/layout.phtml";