<!DOCTYPE html>
<html>
<head>
	<title>FormDangKy</title>
	<style type="text/css">
		.error{
			color: red;
		}
	</style>
</head>
<body>
<?php
	$errName =  $errEmail = $errGender = $errNumber = $errHome = $errDay = '';
	if(isset($_POST['dangky'])) {
		if ($_POST['name'] == '') {
			$errName = 'Please input your name';
		} else {
			$errName = '';
		}
		if ($_POST['email'] == '') {
			$errEmail = 'Please input your email';
		} else {
			$errEmail = '';
		}
		if ($_POST['number'] == '') {
			$errNumber = 'Please input your Phone Number';
		} else {
			$errNumber = '';
		}
		if (!isset($_POST['gender'])) {
					$errGender = 'Please input gender';
			} else {
					$errGender = '';
			}
		if ($_POST['home'] == '') {
			$errHome = 'Please input your Home town';
		} else {
			$errHome = '';
		}
		if ($_POST['date'] == '') {
			$errDay = 'Please input your Day Of Birth';
		} else {
			$errDay = '';
		}
		echo 'Name : '.$_POST['name']; 
		echo "<br>";
		echo 'Email :'.$_POST['email']; 
		echo "<br>";
		echo 'Phone Number : '.$_POST['number']; 
		echo "<br>";
		if (isset($_POST['gender'])) {
			echo 'Gender : '.$_POST['gender']; 
			echo "<br>";
		}
		echo 'Homeland : '.$_POST['home']; 
		echo "<br>";
		echo 'Birthday : '.$_POST['date']; 
		echo "<br>";
	}	
?>
	<h1>Form Đăng Ký</h1>
	<form action="#" method="POST" name="FormDangKy">
		<p>Name: 
			<input type="text" name="name">
			<p class="error"><?php echo $errName;?></p>
		</p>
		<p>Email:
			<input type="email" name="email">
			<p class="error"><?php echo $errEmail;?></p>
		</p>
		<p>Phone Number: 
			<input type="number" name="number">
			<p class="error"><?php echo $errNumber;?></p>
		</p>
		<p>Gender:
			<input type="radio" name="gender"  value="Nam" id="gioitinh">Nam
			<input type="radio" name="gender" value="Nữ" id="tinhgioi">Nữ
			<p class="error"><?php echo $errGender;?></p>
		</p>
		<p>Home town:
			<select name="home">
					<option ></option>
					<opton >Đà Nẵng</option>
					<option >Hà Nội</option>
					<option >HCM</option>
					<option >Quảng Nam</option>
					<option >Hà Tĩnh</option>
					<option >Quảng Trị</option>
			</select>
			<p class="error"><?php echo $errHome;?></p>
		</p>
		
		<p>Day of Birth:
			<input type="date" name="date">
			<p class="error"><?php echo $errDay?></p>
		</p>
		<p>
			<input type="submit" name="dangky" value="Đăng Ký">
		</p>
	</form>
</body>
</html>