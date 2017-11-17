<?php
include "conexion.php";



if (empty($_POST['comm']) == false && empty($_POST['author']) == false && empty($_POST['comm']) == false  && empty($_POST['id']) == false){

	/*$today = getdate();
	echo $test;
	$today2 = $today['year']."-".$today['mon']."-".$today['mday']." ".$today['hours'].":".$today['minutes'].":".$today['seconds'];*/
	$nickname = $_POST["author"];
	$commInsert = $_POST["comm"];
	$id_Article = $_POST['id'];
	
	$query = $pdo->prepare(
		'INSERT INTO Comment 
		(NickName , Contents,CreationTimestamp, Post_Id) 
		VALUES (?,?,NOW(),?)');
	$commInsert = $query ->execute([$nickname, $commInsert,$id_Article]);
	$template = "add_comment";
    $path="../";
}
else{
	header("Location: ./index.php");
	exit;
}



/*header ("LOcation: article.php?id=".$id_Article."");*/


