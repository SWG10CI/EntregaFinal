<?php


			include_once 'functions.php';
			session_start();
			$link = getDbLink();

			if (!$link)
			{
				echo "Fallo al conectar a MySQL: " . $link->connect_error;
			}

			$sql="SELECT * FROM preguntas where email = '". $_SESSION["email"] ."' ";
			$preguntas = mysqli_query($link,$sql);
			echo mysqli_num_rows($preguntas);

			/*
			$preguntas = simplexml_load_file('preguntas.xml');

			$count=0;



			if(!isset($_GET["mail"]))

				echo "MAL";



			else



			{



			foreach ($preguntas->children() as $pregunta){

				if(($pregunta->attributes()->author)==$_GET["mail"]){

					$count =$count+1;

				}		

			}



			echo $count;
		}*/

?>			

