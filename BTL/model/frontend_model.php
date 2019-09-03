<?php 
	include 'config/database.php';

	class FrontendModel extends DatabaseConnect {
		function register( $username, $password, $name, $email, $phone, $birthday, $avatar) {
		$created = date('Y-m-d h:i:s');
		$sql = "INSERT INTO users(role, username, password, name, email, phone, birthday, avatar, created) VALUES ('customer', '$username', '$password', '$name', '$email', '$phone', '$birthday', '$avatar', '$created')";
		return mysqli_query($this->connect(), $sql);
		}
		public function listUser() {
			$sql = "SELECT * FROM users";
			$listUser = mysqli_query($this->connect(), $sql);
			return $listUser;
		}
		public function listProduct() {
			$sql = "SELECT * FROM products";
			$listProduct = mysqli_query($this->connect(), $sql);
			return $listProduct;
		}
		function checkExistUser($username, $email) {
			$sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
			return mysqli_query($this->connect(), $sql);
		}
		function login($username, $password) {
			$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND role = 'customer'";
			return mysqli_query($this->connect(), $sql);

		}
		function get_Name($username){
			$sql = "SELECT name FROM users WHERE username = '$username'";
			$name = mysqli_query($this->connect(), $sql)->fetch_assoc();
			return $name;
		}
		function get_ID($username){
			$sql = "SELECT id FROM users WHERE username = '$username'";
			$id = mysqli_query($this->connect(), $sql)->fetch_assoc();
			return $id;
		}
		function get_Avatar($username){
			$sql = "SELECT avatar FROM users WHERE username = '$username'";
			$avatar = mysqli_query($this->connect(), $sql)->fetch_assoc();
			return $avatar;
		}
		function get_NameUser_id($id){
			$sql = "SELECT name FROM users WHERE id = '$id'";
			$name = mysqli_query($this->connect(), $sql)->fetch_assoc();
			return $name;
		}
		function get_Role($username){
			$sql = "SELECT role FROM users WHERE username = '$username'";
			$role = mysqli_query($this->connect(), $sql)->fetch_assoc();
			return $role;
		}
		function get_Product($id){
			$sql = "SELECT * FROM products WHERE id = $id";
			$Product = mysqli_query($this->connect(), $sql);
			return $Product->fetch_assoc();
		}
		function order($user_id){
			$created = date('Y-m-d h:i:s');
			$sql = "INSERT INTO orders(user_id, created, status) VALUES ('$user_id', '$created', 0)";
			return mysqli_query($this->connect(), $sql);
		}
		function get_order_id(){
			$sql = "SELECT id FROM orders ORDER BY id DESC LIMIT 0,1";
			return mysqli_query($this->connect(), $sql)->fetch_assoc();
		}
		function order_detail($order_id, $product_id, $quantity, $price){
			$sql = "INSERT INTO order_details(order_id, product_id, quantity, price) VALUES ('$order_id', '$product_id', '$quantity', '$price')";
			return mysqli_query($this->connect(), $sql);	
		}
		function comment($user_id, $product_id, $content){
			$created = date('Y-m-d h:i:s');
			$sql = "INSERT INTO comment(user_id, product_id, content, created, status) VALUES ('$user_id', '$product_id', '$content', '$created', '1')";
			return mysqli_query($this->connect(), $sql);
		}
		function get_comment($id){
			$sql = "SELECT * FROM comment WHERE product_id = $id";
			return mysqli_query($this->connect(), $sql);
		}
	}
?>