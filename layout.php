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

	Bienvenidos a QUIZ: el juego de preguntas!! 

	</div>

    </section>

	<footer class='main' id='f1'>

		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>

		<a href='https://github.com/SWG10CI/Lab2A'>Link GITHUB</a>

	</footer>

</div>

</body>

</html>

