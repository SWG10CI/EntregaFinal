<?php

session_start ();



if(!isset($_SESSION['autentificado'],$_SESSION['profesor'])){

	header ("Location: layout.php");

}





?>

<!DOCTYPE html>



<html>



  <head>



  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">



	<title>Borrar</title>



    <link rel='stylesheet' type='text/css' href='estilos/style.css' />



	<link rel='stylesheet' 



		   type='text/css' 



		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'



		   href='estilos/wide2.css' />



	<link rel='stylesheet' 



		   type='text/css' 



		   media='only screen and (max-width: 480px)'



		   href='estilos/smartphone.css' />



  </head>



  <body>



  <div id='page-wrap'>



	<header class='main' id='h1'>



	<?php
	include_once 'functions.php';
	printLoginMenu();
	?>



		<h2>Quiz: el juego de las preguntas</h2>

		<?php
		include_once 'functions.php';
		printLoggedDiv();
		?>


    </header>



	<nav class='main' id='n1' role='navigation'>



		<?php
		include_once 'functions.php';
		printMenu();
		?>



	</nav>



    <section class="main" id="s1">



    <span>Selecciona una fila para borrarla</span>

    <br><br>



	<div style="float: left; overflow: scroll; height: 300px; ">



		



		<?php


			include_once 'functions.php';




			//Contectar con la base de datos 

			$link = getDbLink();

			if (!$link)



			{



			 echo "Fallo al conectar a MySQL: " . $link->connect_error;



			}







			//Insertar los datos



			$preguntas=mysqli_query($link, "SELECT * FROM preguntas");





			//Error al consultar



			if (!$preguntas)



			 { 	



				die('Error: ' . mysqli_error($link));

				echo "No se ha podido insertar";



			 }




			 echo '<form enctype="multipart/form-data" onreset="rmvImg()" style="float: left" id="fpreguntas" name="fpreguntas" action=pregunta.php? method="post">';


			 //Crear la tabla







			 echo '<table class = "hoverTable" id="tPreguntas" border=1> 

			 	 <tr>

			 	 <th> ID </th>

			 	 <th> Email </th>

			 	 <th> Enunciado </th>

			 	 <th> RCorrecta </th>

			 	 <th> RIncorrecta1 </th>

			 	 <th> RIncorrecta2 </th>

			 	 <th> RIncorrecta3</th>

			 	 <th> Complejidad </th>

			 	 <th> Tema </th>

				 </tr>';



				 $i = 1;



				while ($row = mysqli_fetch_array($preguntas)) {
						echo '<tr onclick = "selectPregunta(' . $i . ')">

							 <td>' . $row["id"] . '</td>

							 <td>' . $row["email"] . '</td>

							 <td>' . $row["enunciado"] .'</td>

							 <td>' . $row["correcta"] .'</td> 

							 <td>' . $row["incorrecta1"] .'</td>

							 <td>' . $row["incorrecta2"] .'</td>

							 <td>' . $row["incorrecta3"] .'</td>

							 <td>' . $row["complejidad"] .'</td>

							 <td>' . $row["tema"] .'</td>

						</tr>';

						$i = $i + 1;

				}

				echo '</table>';


			// Cerrar conexión
			mysqli_close($link);

		?>

		<div id = "response" style="margin: 1%"></div>

		<br>

			

		<br>



		</form>


	



	</div>

	<input onclick="borrarPregunta()" style="margin-top: 20px" id="button" type="button" value="Borrar">

	<script>



	function borrarPregunta(){



		var s =$("#fpreguntas").serialize() + "&id=" + $var1;


		$.ajax({

		    type: "post",

		    url: "deletePreguntas.php",

		    data: s,

		    success: function( response ) {

		    	$("#response").html(response);


      		}

    	});


	}



		function selectPregunta(index) {

			var table =  document.getElementById("tPreguntas");
			cleanRows(table);
			table.rows[index].style.background = "#BDC3C7";
			$var1 = table.rows[index].cells[0].innerHTML;


			$("#id").val(table.rows[index].cells[0].innerHTML);

    	}



    	function cleanRows(table){

    			for (var i =0; i<table.rows.length;i++)
    				table.rows[i].style.background = "";
    	}


	</script>









    </section>



	<footer class='main' id='f1'>



		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>



		<a href='https://github.com/SWG10CI/Lab2A'>Link GITHUB</a>



	</footer>



</div>



</body>



</html>



