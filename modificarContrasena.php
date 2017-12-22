<?php
session_start();
?>

<!DOCTYPE html>

<html>

  <head>

    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">

	<title>Preguntas</title>

    <link rel='stylesheet' type='text/css' href='estilos/style.css' />

	<link rel='stylesheet' 

		   type='text/css' 

		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'

		   href='estilos/wide.css' />

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

    

	<div style="float: left;">
		<h1 style="margin-bottom:2%">Modificar Contraseña</h1>
	<form  method="POST" action="modificarContrasena.php" style=" float: left ;margin-top: 6%">
		<span>Inserta un correo válido</span>
		<br>
		<input type="text" name="email">
		<br>
		<input type="submit" value = "Enviar correo de recuperación" >	

	</form>


	<?php
	    $email;
		include_once 'functions.php';
		if(isset($_POST['email'])){
			$str = generateRandomString();
			$_SESSION["recuperacion"]=$str;
			$email=$_POST['email'];
			mail($_POST["email"], "Petición para modificar la contraseña", 'Tu código para modificar la contraseña es '. $str);
			echo $str;
			echo "<br>";
			echo 'Correo enviado';
			echo "<br>";
			echo '<form method ="POST" action="modificarContrasena.php"> ';
			    echo "Vuelve a escribir el  email: ";
			    echo'<input type="text" name="email2" ></input>';
			
			    echo "Código recibido por email: ";
			    echo'<input type="text" name = "codigo"></input>';
			echo "<br>";
			echo "Nueva contraseña: ";
			echo'<input type="text" name = "contraseña"></input>';
			echo '<input type="submit" value = "Modificar Contraseña "';
		}

		if(isset($_POST['codigo'], $_POST['contraseña'],$_POST["email2"])){			
			cambiarContraseña($_POST['email2'],$_POST['codigo'],$_POST['contraseña']);
		}



	?>
	
	</div>





    </section>

	<footer class='main' id='f1'>

		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>

		<a href='https://github.com/SWG10CI/Lab2A'>Link GITHUB</a>

	</footer>

</div>

</body>

</html>

