<?php 
	session_start();
	include 'controller/backend_controller.php';
?>
<?php
	include 'layout/admin/header.php';
	$backend = new BackendController();
	$backend -> handleRequest();

	include 'layout/admin/footer.php';
?>
