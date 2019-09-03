<!DOCTYPE html>
<html>
<head>
	<title>Form SumNumber</title>
	<style type="text/css">
		.error{
			color: red;
		}
	</style>
</head>
<body>
<?php
	$errA =  $errB = '';
	if(isset($_POST['tinh'])) {
		if ($_POST['a'] == '') {
			$errA = 'Vui long nhap a';
		} else {
			$errA = '';
		}
		if ($_POST['b'] == '') {
			$errB = 'Vui long nhap b';
		} else {
			$errB = '';
		}
		echo $_POST['a']." + ".$_POST['b']." = ".intval($_POST['a'] + $_POST['b']);
	}	
?>
	<h1>SumNumber Form</h1>
	<form action="#" method="POST" name="SumNumberForm">
		<p>Nhập a: 
			<input type="number" name="a">
			<p class="error"><?php echo $errA ;?></p>
		</p>
		<p>Nhập b: 
			<input type="number" name="b">
			<p class="error"><?php echo $errB ;?></p>
		</p>
		<p>
			<input type="submit" name="tinh" value="TÍNH">
		</p>
	</form>
</body>
</html>