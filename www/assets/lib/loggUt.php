<?php
	session_start();
	//unset session for å stoppe en session og "logge ut" en bruker

	unset($_SESSION['login']);

	//sender deg tilbake til logg-inn siden
	header('location:../../../www/index.php');
?>