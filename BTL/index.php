<?php 
	session_start();
	include 'controller/frontend_controller.php';
?>


<?php 
	$frontend = new FrontendController();
	$frontend -> handleRequest();
?>