<!DOCTYPE html>
<html>
<head>
	<title>Form example</title>
	<style type="text/css">
		.error{
			color: red;
		}
	</style>
</head>
<body>
<?php
	$errName =  $errPass = '';
	if(isset($_POST['register'])) {
		if ($_POST['name'] == '') {
			$errName = 'Please input your name';
		} else {
			$errName = '';
		}
		if ($_POST['password'] == '') {
			$errPass = 'Please input your password';
		} else {
			$errPass = '';
		}
		echo $_POST['name'];
		echo "<br>";
		echo $_POST['password'];
	}	
?>
	<h1>Register form</h1>
	<form action="#" name="RegisterForm" method="POST">
		<p>Name: 
			<input type="text" name="name">
			<p class="error"><?php echo $errName;?></p>
		</p>
		<p>Password:
			<input type="password" name="password">
			<p class="error"><?php echo $errPass;?></p>
		</p>
		<p>
			<input type="submit" name="register" value="Register">			
		</p>
	</form>
</body>
</html>