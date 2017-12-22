<?php
include_once 'functions.php';
session_start();
session_destroy();
contadorRestar();
header ("Location: layout.php");

?>