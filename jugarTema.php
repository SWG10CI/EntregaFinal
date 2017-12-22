<?php
session_start();
include_once 'functions.php';

if(!isset($_SESSION["pActual"])){
	cargarPreguntasTema($_POST['temaElegido']);
	siguientePregunta();
}

?>

<!DOCTYPE html>

<html>

  <head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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



	<div id = divJugar style="max-width: 100%;  ">
			<?php						
				printPregunta();
			?>



	</div>




	</div>

    </section>

	<footer class='main' id='f1'>

		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>

		<a href='https://github.com/SWG10CI/Lab2A'>Link GITHUB</a>

	</footer>

</div>


<script type="text/javascript">
	

function comprobarRespuesta(){

	if($('#quiz').serialize()==""){
		alert("Selcciona una repuesta");
		return;
	}

	$.ajax({
			 url: 'comprobarRespuesta.php',
			 type: "POST",
			 data: $('#quiz').serialize(),
			 success:function(datos){
			 	$('#divJugar').html(datos);
			 }

			});
}

function continuarQuiz(){
	$.ajax({
			 url: 'continuarQuiz.php',
			 success:function(datos){
			 	$('#divJugar').html(datos);
			 }

			});
}


function finalizarQuiz(){
	$.ajax({
			 url: 'finalizarQuiz.php',
			 success:function(datos){
			 	$('#divJugar').html(datos);
			 }

			});

}


function darLike(){

$('#bLike').prop("onclick", false);
$('#bDislike').prop("onclick", false);
$('#bLike').css("opacity", 0.4);
$('#bDislike').css("opacity", 0.4);

$.ajax({
			 url: 'darLike.php',
			 success:function(datos){
			 	$('#respuesta').html(datos);
			 }

			});

}


function darDislike(){

$('#bLike').prop("onclick", false);
$('#bDislike').prop("onclick", false);
$('#bLike').css("opacity", 0.4);
$('#bDislike').css("opacity", 0.4);

$.ajax({
			 url: 'darDislike.php',
			 success:function(datos){
			 	$('#respuesta').html(datos);
			 }

			});

}

</script>




</body>

</html>

