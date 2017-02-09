<!DOCTYPE html>
<html lang="es">
<head>
    <title>Error</title>
    <meta charset="utf-8">
   	<link type="text/css" href="css/estilo2.css" rel="stylesheet" />
   	<link type="text/css" href="css/estilo_principal.css" rel="stylesheet" />
   	<link href='https://fonts.googleapis.com/css?family=Jockey+One' rel='stylesheet' type='text/css'>
</head>
 
<body>
    <div id="contenido">
		<?php
			session_start();
			session_destroy();
			echo '<h1>No tiene permisos para esta Pagina<h1>';
		?>
	</div>
</body>
</html>