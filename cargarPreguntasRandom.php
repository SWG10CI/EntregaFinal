<?php
session_start();
include_once 'functions.php';

$link = getDbLink();
$sql = "SELECT email, enunciado,correcta,incorrecta1,incorrecta2,incorrecta3,complejidad,tema,img FROM preguntas";

$preguntas = mysqli_query($link ,$sql);

if (!$preguntas)
{ 	
	die('Error: ' . mysqli_error($link));
	echo "No se ha podido insertar";
}

$array;
$i=0;
while ($pregunta =mysqli_fetch_array($preguntas)) {
	$array[$i]=$pregunta;
	$i++;
}

$_SESSION["preguntas"]=$array;

?>