<?php 
	include 'config/database.php';

	class BackendModel extends DatabaseConnect {
		function register( $username, $password, $name, $email, $phone, $birthday, $avatar) {
		$created = date('Y-m-d h:i:s');
		$sql = "INSERT INTO users(role, username, password, name, email, phone, birthday, avatar, created) VALUES ('admin', '$username', '$password', '$name', '$email', '$phone', '$birthday', '$avatar', '$created')";
		return mysqli_query($this->connect(), $sql);
		}
		function checkExistUser($username, $email) {
			$sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
			return mysqli_query($this->connect(), $sql);
		}
		public function listUser() {
			$sql = "SELECT * FROM users";
			$listUser = mysqli_query($this->connect(), $sql);
			return $listUser;
		}
		public function deleteUser($id) {
			$sql = "DELETE FROM users WHERE id ='$id'";
			return mysqli_query($this->connect(), $sql);
		}
		public function getEditUser($id) {
			$sql = "SELECT * FROM users where id ='$id'";
			$result = mysqli_query($this->connect(), $sql);
			return $result->fetch_assoc();
		}
		function editUser($username,$name, $email, $phone, $birthday, $image, $id) {
			$updated = date('Y-m-d h:i:s');
			$sql = "UPDATE users SET username ='$username',name= '$name', email ='$email', phone='$phone', birthday	='$birthday', avatar ='$image',  updated='$updated'where id ='$id'";
			return mysqli_query($this->connect(), $sql);
		}
		function login($username, $password) {
			$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND role = 'admin'";
			return mysqli_query($this->connect(), $sql);
		}
		function get_ID($username){
			$sql = "SELECT id FROM users WHERE username = '$username'";
			$id = mysqli_query($this->connect(), $sql)->fetch_assoc();
			return $id;
		}
		function get_Role($username){
			$sql = "SELECT role FROM users WHERE username = '$username'";
			$role = mysqli_query($this->connect(), $sql)->fetch_assoc();
			return $role;
		}
		function get_Name($username){
			$sql = "SELECT name FROM users WHERE username = '$username'";
			$name = mysqli_query($this->connect(), $sql)->fetch_assoc();
			return $name;
		}
		function get_NameUser_id($id){
			$sql = "SELECT name FROM users WHERE id = '$id'";
			$name = mysqli_query($this->connect(), $sql)->fetch_assoc();
			return $name;
		}
		function get_Avatar($username){
			$sql = "SELECT avatar FROM users WHERE username = '$username'";
			$avatar = mysqli_query($this->connect(), $sql)->fetch_assoc();
			return $avatar;
		}
		public function listCategory() {
			$sql = "SELECT * FROM product_categories";
			$listCategory = mysqli_query($this->connect(), $sql);
			return $listCategory;
		}
		function AddProduct( $name, $description, $category, $image, $price) {
		$created = date('Y-m-d h:i:s');
		$sql = "INSERT INTO products(product_category_id, name, description, image, price, created) VALUES ('$category', '$name', '$description', '$image', '$price', '$created')";
		return mysqli_query($this->connect(), $sql);
		var_dump($sql);
		}
		public function listProduct() {
			$sql = "SELECT * FROM products";
			$listProduct = mysqli_query($this->connect(), $sql);
			return $listProduct;
		}
		public function deleteProduct($id) {
			$sql = "DELETE FROM products WHERE id ='$id'";
			return mysqli_query($this->connect(), $sql);
		}
		public function getEditProduct($id) {
			$sql = "SELECT * FROM products where id ='$id'";
			$result = mysqli_query($this->connect(), $sql);
			return $result->fetch_assoc();
		}
		public function getCategory_id($id) {
			$sql = "SELECT * FROM product_categories where id ='$id'";
			$result = mysqli_query($this->connect(), $sql);
			return $result->fetch_assoc();
		}
		function editProduct1($name, $description,$category, $price, $id) {
			$updated = date('Y-m-d h:i:s');
			$sql = "UPDATE products SET name ='$name', description= '$description', product_categoryd_id ='$category', price='$price', updated='$updated' where id ='$id'";
			return mysqli_query($this->connect(), $sql);
		}
		function editProduct($name, $description,$category, $price,$image, $id) {
			$updated = date('Y-m-d h:i:s');
			$sql = "UPDATE products SET product_category_id ='$category', name ='$name', description= '$description', image='$image', price='$price',updated='$updated' where id ='$id'";
			return mysqli_query($this->connect(), $sql);
		}
		function get_NameProduct($id){
			$sql = "SELECT name FROM products where id ='$id'";
			$result = mysqli_query($this->connect(), $sql);
			return $result->fetch_assoc();
		}
		public function listComment($product_id) {
			$sql = "SELECT * FROM comment WHERE product_id = '$product_id'";
			$listComment = mysqli_query($this->connect(), $sql);
			return $listComment;
		}
		function Enable_cmt($id){
			$sql = "UPDATE comment SET status = 1 WHERE id = $id";
			return mysqli_query($this->connect(), $sql);
		}
		function Disable_cmt($id){
			$sql = "UPDATE comment SET status = 0 WHERE id = $id";
			return mysqli_query($this->connect(), $sql);
		}
		public function listOrder() {
			$sql = "SELECT * FROM orders";
			$listOrder = mysqli_query($this->connect(), $sql);
			return $listOrder;
		}
		public function listOrder_Details($id) {
			$sql = "SELECT * FROM order_details WHERE order_id = $id";
			$listOrder_Details = mysqli_query($this->connect(), $sql);
			return $listOrder_Details;
		}
		function get_ImageProduct($id){
			$sql = "SELECT image FROM products where id ='$id'";
			$result = mysqli_query($this->connect(), $sql);
			return $result->fetch_assoc();
		}
		public function duyet($id)
		{
			# code...
			$sql = "UPDATE orders SET status = '1' WHERE id = $id";
			return mysqli_query($this->connect(), $sql);
		}
		function get_productID($comment_id){
			$sql = "SELECT product_id FROM comment where id ='$comment_id'";
			$result = mysqli_query($this->connect(), $sql);
			return $result->fetch_assoc();
		}
	}
?>