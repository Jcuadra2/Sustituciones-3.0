<?php
	session_start();
	session_destroy();
	header("Location:identificacion.php");
?>