<?php

	include_once 'functions.php';
	

		//Contectar con la base de datos 


		$link = getDbLink();

		if (!$link)

		{

			echo "Fallo al conectar a MySQL: " . $link->connect_error;

		}



		//Borrar los datos

			$sql="DELETE FROM preguntas WHERE id='$_POST[id]'";

		//Error al insertar


		if (!mysqli_query($link ,$sql))

		 { 	

			die('Error: ' . mysqli_error($link));

			echo "No se ha podido borrar";

		 }


		 echo 'Se ha borrado la pregunta correctamente en la BD';

		// Cerrar conexión

		mysqli_close($link);


?>