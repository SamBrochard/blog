<?php

include "conexion.php";
	if(empty($_Post['img'])){
		$_Get['img'] = 'defaultImg.png';
	}
$query = $pdo-> prepare('
	INSERT INTO Post (
	Contents, Category_Id, Author_Id,Img, Title, CreationTimestamp) 
	VALUES (?,?,?,?,?,NOW())');

$Insert = $query->execute([$_POST["Content"],$_POST["Category"],$_POST["Author"],$_POST['img'],$_POST["Title"]]);

header("Location: admin.php");
exit;