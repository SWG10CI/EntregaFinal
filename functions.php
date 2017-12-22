<?php



function getDbLink(){

$local=true;


if ($local){
	return mysqli_connect("localhost", "root", "admin", "quiz");
}
else{
	return mysqli_connect("localhost", "id3982391_swg10", "SWG10", "id3982391_quiz");
}

}

function printMenu(){
	
	if(isset($_SESSION['autentificado'],$_SESSION['profesor'])){

	    echo"<span><a href='layout.php'>Inicio</a></span>";
	    echo"<span><a href='RevisarPreguntas.php'>Revisar Pregunta</a></span>";
	    echo"<span><a href='BorrarPreguntas.php'>Borrar Pregunta</a></span>";
	    echo"<span><a href='creditos.php'>Creditos</a></span>";

	  } 
	  
	  elseif(isset($_SESSION['autentificado'])){

	    echo"<span><a href='layout.php'>Inicio</a></span>";
	    echo"<span><a href='GestionPreguntas.php'>Gestion Preguntas</a></span>";
	    echo"<span><a href='creditos.php'>Creditos</a></span>";
	  }

	  else{

	    echo"<span><a href='layout.php'>Inicio</a></span>";
	    echo"<span><a href='menuJugar.php'>¿Cuanto sabes?</a></span>";
	    echo"<span><a href='creditos.php'>Creditos</a></span>";

	  }	

}


function printLoginMenu(){

	if(isset($_SESSION['autentificado'],$_SESSION['profesor'])){

	echo'<span class="right"><a href="logout.php">Logout</a></span>';
	} 

	elseif(isset($_SESSION['autentificado'])){

	echo'<span class="right"><a href="logout.php">Logout</a></span>';

	}

	else{

	echo'<span class="right"><a href="registrar.php">Registro</a></span>';
	echo'<span class="right"><a href="login.php">Login</a></span>';
	echo'<span class="right"><a href="modificarContrasena.php">Modificar contraseña</a></span>';
	}


}


function printLoggedDiv(){

	if(isset($_SESSION['autentificado'])){

		echo '<div style="margin:1%">';
		echo 'Identificado como : ';
		echo $_SESSION["email"];
		echo '<img style=" vertical-align:middle; width:50px;height:50px; border:2px solid black ; margin-left: 1%" src="data:image/jpeg;base64,'.base64_encode( $_SESSION['img'] ).'"/>	'	;
		echo '</div>';



	}


}


function contadorSumar(){
	$xml = simplexml_load_file('contador.xml');
	$cont = $xml->children()[0];
	$xml->contador=$xml->contador + 1;
	$xml->asXML('contador.xml');
}

function contadorRestar(){
	$xml = simplexml_load_file('contador.xml');
	$cont = $xml->children()[0];
	$xml->contador=$xml->contador - 1;
	$xml->asXML('contador.xml');
}




function cargarPreguntasRandom(){
		$link = getDbLink();
		$sql = "SELECT id , email, enunciado,correcta,incorrecta1,incorrecta2,incorrecta3,complejidad,tema,img FROM preguntas";

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
		mysqli_close($link);
		$_SESSION["preguntas"]=$array;
		$_SESSION['aciertos'] = 0;
		$_SESSION['fallos'] = 0;
		$_SESSION['sumatorio']=0;
}


function cargarPreguntasTema($tema){
	$link = getDbLink();
		$sql = "SELECT id , email, enunciado,correcta,incorrecta1,incorrecta2,incorrecta3,complejidad,tema,img FROM preguntas WHERE tema= '$tema'";

		$preguntas = mysqli_query($link ,$sql);

		if (!$preguntas)
		{ 	
			die('Error: ' . mysqli_error($link));
			echo "No se ha podido insertar";
		}
		$array;
		$i=0;
		while ($pregunta =mysqli_fetch_array($preguntas)) {
			if($i>2)
				break;
			$array[$i]=$pregunta;
			$i++;
		}

		mysqli_close($link);
		$_SESSION["preguntas"]=$array;
		$_SESSION['aciertos'] = 0;
		$_SESSION['fallos'] = 0;
		$_SESSION['sumatorio']=0;

}



//Borra la última pregunta y guarda una nueva. Si no quedan preguntas devuelve -1

function siguientePregunta(){


		if(isset($_SESSION["pActual"])){
			$index = $_SESSION["pActual"];
			unset($_SESSION["preguntas"][$index]);
		}

		if(count($_SESSION["preguntas"])==0){
			$_SESSION["pActual"] =  -1;
		}
		else{
			$_SESSION["pActual"] = array_rand($_SESSION["preguntas"]);
		}
	 	
}


function printPregunta(){

		$index = $_SESSION["pActual"];

		if($index==-1){
			echo'¡Has respondido a todas las preguntas!';
			echo'<br>';
			echo '<button class="button" onclick="finalizarQuiz()">Finalizar</button>';
			return;
		}


		echo '<form id = quiz>';
		echo '<tr>';

			echo	'<td>' . $_SESSION["preguntas"][$index]["enunciado"] . '</td>' ;

		echo '</tr>';

		


		echo '<table style = border: 1px solid black>';

			

		$respuesta;	
		$respuesta[0] = $_SESSION["preguntas"][$index]["correcta"];
		$respuesta[1] = $_SESSION["preguntas"][$index]["incorrecta1"];
		$respuesta[2] = $_SESSION["preguntas"][$index]["incorrecta2"];
		$respuesta[3] = $_SESSION["preguntas"][$index]["incorrecta3"];

		while(count($respuesta)>0){
			echo '<tr>';
			$rand = array_rand($respuesta);


			echo '<td style="max-width=25%" ><input type="radio" value="' . $respuesta[$rand] .  '" name="respuesta"></td>' ;
			echo	'<td>' . $respuesta[$rand] . '</td>' ;


			unset ($respuesta[$rand]);
			echo '</tr>';
		}	

			

		echo '</table>';


 		echo '</form>';

 		echo '<img style=" vertical-align:middle; width:50px;height:50px; border:2px solid black ; margin-left: 1%" src="data:image/jpeg;base64,'.base64_encode( $_SESSION["preguntas"][$index]["img"] ).'"/>	'	;

 		echo '<button class="button" onclick="comprobarRespuesta()">Comprobar</button>';
 		echo '<button class="button" onclick="finalizarQuiz()">Finalizar</button>';


}


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function cambiarContraseña($email,$codigo,$contraseña){
	session_start();
	if($codigo!=$_SESSION['recuperacion']){
		echo'codigo incorrecto';
	}
	else{
		$link = getDbLink();
		$hashed_password = crypt($contraseña,"SWG10");
		$sql = "UPDATE usuario SET pass= '$hashed_password'  WHERE mail='$email'";
		mysqli_query($link,$sql);
		mysqli_close($link);
		echo "Contraseña modificada";
	}

	

}


?>