<?php

			/*Contar en el xml (LAB)
			$preguntas = simplexml_load_file('preguntas.xml');

			$count = $preguntas->children()->count();

			echo $count;
			*/
			include_once 'functions.php';
			$link = getDbLink();

			if (!$link)
			{
				echo "Fallo al conectar a MySQL: " . $link->connect_error;
			}

			$sql="SELECT * FROM preguntas";
			$preguntas = mysqli_query($link,$sql);
			echo mysqli_num_rows($preguntas);


?>			