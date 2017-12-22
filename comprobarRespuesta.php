<?php
session_start();
$respuesta = $_POST['respuesta'];
$index= $_SESSION['pActual'];
$respuestaC = $_SESSION['preguntas'][$index]['correcta'];
$_SESSION['sumatorio']= (float)$_SESSION['sumatorio'] + (float) $_SESSION['preguntas'][$index]['complejidad'];
if($respuesta == $respuestaC){
	echo '<h1>DING DING !</h1>';
	echo '<br>';
	echo "Enhorabuena respuesta correcta ";
	$_SESSION['aciertos'] = $_SESSION['aciertos'] + 1;
}
else{
	echo '<h1>Ohhhhh</h1>';
	echo '<br>';
	echo "Lo sentimos has fallado.La respuesta correcta era ";
	echo $respuestaC;
	$_SESSION['fallos'] = $_SESSION['fallos'] + 1;
}
echo '<br>';

echo'<img id="bLike" style=" max-width:3%;max-height:3%; border:1px solid black;box-shadow: 1px 1px;" src="img/like.png" onclick="darLike()">';
echo'<img  id="bDislike" style=" max-width:3%;max-height:3%; border:1px solid black;box-shadow: 1px 1px;" src="img/dislike.png" onclick="darDislike()">';

echo '<br>';
echo '<button class="button" onclick="continuarQuiz()">Continuar</button>';
echo '<br>';
echo '<button class="button" onclick="finalizarQuiz()">Finalizar</button>';
echo '<br>';
echo '<div id="respuesta"></div>';

?>