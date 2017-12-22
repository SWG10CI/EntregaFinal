<?php
session_start();
echo "<h1>Quiz finalizado</h1>";
echo "<br>";
echo "Has contestado correctamente a ";
echo $_SESSION["aciertos"];
echo " preguntas";
echo "<br>";
echo "Has contestado incorrectamente a ";
echo $_SESSION["fallos"];
echo " preguntas";
echo "<br>";
if(isset($_SESSION["sumatorio"])){
	$total=$_SESSION["aciertos"] +$_SESSION["fallos"];
	if($total==0){
	    $complejMedia= "No se han respondido preguntas";
	}else{
	    $complejMedia = (float)$_SESSION["sumatorio"] / (float) $total ;
	}
	echo 'La complejidad media de las preguntas: ';
	echo "$complejMedia";
}
echo '<br>';
echo '<a href="menuJugar.php">Volver</a>';
unset($_SESSION["preguntas"]);
unset($_SESSION["aciertos"]);
unset($_SESSION["fallos"]);
unset($_SESSION["pActual"]);

?>