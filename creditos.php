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

    

	<div style="background-color: #6C7A89; width: 40%;

    height: 75%;

    float: left;

    border:5px solid #2C3E50;

    padding:20pt; 

    margin: auto;



    ">

    	<span style="color:white ;font-weight: bold;font-family: Verdana;">Especialidad: Ingeniería de software</span>

      <br></br>

      <span style="color:white ;font-weight: bold;font-family: Verdana;">Autor: Iván Valdés</span>



      <br></br>



    	<img style =" border-radius: 25px; width: 200px; margin-left: 155pt; height: 200px; float: left" src="img/ivan.jpg">

		



	</div>



	<div style="background-color: #6C7A89; width: 40%;

    height: 75%;

    float: right;

    border:5px solid #2C3E50;

    padding:20pt; 

    margin: auto;

    border-collapse: collapse;



    ">



    <span style="color:white ;font-weight: bold;font-family: Verdana">Especialidad: Ingeniería de software</span>

    <br></br>

    <span style="color:white ;font-weight: bold;font-family: Verdana">Autor: Christian Foncubierta</span>

    



      <br></br>

    	<img style ="border-radius: 25px; width: 200px; margin-left: 155pt; height: 200px; float: left" src="img/chris.jpg">





    </div>







    </section>

	<footer class='main' id='f1'>

		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>

		<a href='https://github.com/SWG10CI/Lab2A'>Link GITHUB</a>

	</footer>

</div>

</body>

</html>

