<?php 
session_start(); //Habilitamos la sessión para que pueda ser destruida
session_destroy(); //Destruimos la sessión iniciada, lo cual hara que se pierdan todos los valores almacenados en ellas.
//Reenviamos a la pagina inciial
header("Location: login.php");
?>