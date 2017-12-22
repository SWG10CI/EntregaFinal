<?php
session_start();
include_once 'functions.php';
$index= $_SESSION['pActual'];
$id = $_SESSION['preguntas'][$index]['id'];

$link = getDbLink();

if (!$link){
 	echo "Fallo al conectar a MySQL: " . $link->connect_error;
}

$sql="UPDATE preguntas SET 
likes=likes+1
WHERE id='$id'";

if (!mysqli_query($link ,$sql)){ 	
	die('Error: ' . mysqli_error($link));
	echo "No se ha podido insertar";
 }
 mysqli_close($link);
 echo "Has indicado que te gusta la pregunta";

?>