<?php

include "utils.php";
include "conexion.php";


$query = $pdo->prepare('
	UPDATE Post
	SET Title = ?,Contents = ?,Category_Id = ?,Author_Id = ?
	WHERE Id = ? ');
$updatePost = $query -> execute([$_POST["Title"],$_POST["Content"],$_POST["Category"],$_POST["Author"],$_POST["secret2"]]);


header("Location:admin.php");
exit;