<?php
session_start();
include_once 'functions.php';
$link = getDbLink();

if (!$link){
 	echo "Fallo al conectar a MySQL: " . $link->connect_error;
}

$sql="SELECT distinct tema FROM preguntas";


$temas= mysqli_query($link ,$sql);

echo '<form action= jugarTema.php method = "POST">';
echo '<select name = temaElegido>';
 while($tema=mysqli_fetch_array($temas)){
		
		echo '<option value = "';
		echo $tema['tema'];
		echo '">';
		echo $tema['tema'];
		echo '</option>';

 }

echo '</select>';
echo'<input type= "submit" value = "Enviar"></input>';
echo '</form>';
 mysqli_close($link);



?>