<?php 
	/**
	 * 
	 */
	include 'model/backend_model.php';
	class BackendController
	{
		function handleRequest()
		{
			$controller = isset($_GET['controller'])?$_GET['controller']:'home';
			$action = isset($_GET['action'])?$_GET['action']:'admin';
			switch ($controller) {

				case 'home':
					$this-> checkLoginSession();
					break;
				
				case 'user':
					# code...
					$model = new BackendModel();
					$this->handleUser($action, $model);
					break;
				case 'product':
					# code...
					$model = new BackendModel();
					$this->handleProduct($action, $model);
					break;
				case 'comment':
					# code...
					$model = new BackendModel();
					$this->handleComment($action, $model);
					break;
				case 'order':
					# code...
					$model = new BackendModel();
					$this->handleOrder($action, $model);
					break;
				default:
					# code...
					break;
			}
		}
		function handleUser($action, $model) 
		{

			switch ($action) {
				case 'list_user':
					$this-> checkLoginSession();
					$listUser = $model->listUser();
					include 'view/users/list_user.php';
				break;
				case 'delete_user':
					$this-> checkLoginSession();
					$id = $_GET['id'];
					if($model->deleteUser($id) === TRUE){
						header("Location: admin.php?controller=user&action=list_user");
					}
				break;
				case 'edit_user':
					$this-> checkLoginSession();
					$id = $_GET['id'];
					$editUser =$model->getEditUser($id);
					if (isset($_POST['edit_user'])) {
						$username = $_POST['username'];
						$name = $_POST['name'];
						$email = $_POST['email'];
						$phone = $_POST['phone'];
						$birthday = date('Y-m-d', strtotime($_POST['birthday']));
						$image = $editUser['avatar'];
						if ($_FILES['avatar']['error'] == 0) {
				            $image = uniqid().'_'.$_FILES['avatar']['name'];
				            move_uploaded_file($_FILES['avatar']['tmp_name'], 'webroot/admin/uploads/avatar/'.$image);
				          }
						if($model->editUser($username, $name, $email, $phone, $birthday, $image, $id) === TRUE){
							header("Location: admin.php?controller=user&action=list_user");
						}

						# code...
					}
					include 'view/users/edit_user.php';
				break;
				case 'login':
					if (isset($_POST['login'])) {
						$username = $_POST['username'];
						$password = md5($_POST['password']);
						$checkogin = $model->login($username, $password);
						if ($checkogin->num_rows > 0) {
							$login['id'] = $model->get_ID($username)['id'];
							$login['role'] = $model->get_Role($username)['role'];
							$login['username'] = $username;
							$login['name'] = $model->get_Name($username)['name'];
							$login['avatar'] = $model->get_Avatar($username)['avatar'];
							$_SESSION['login'] = $login;
							header("Location: admin.php?controller=user&action=list_user");
						}
					}
					include 'view/users/login_ad.php';
					# code...
				break;
				case 'register':
						if (isset($_POST['register'])) {
							$username = $_POST['username'];
							$password = md5($_POST['password']);
							$name = $_POST['name'];
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$birthday = date('Y-m-d', strtotime($_POST['birthday']));
							$avatar = 'avatar.png';
							$pathUpload = 'webroot/index/uploads/avatar/';
							if ($_FILES['avatar']['error'] == 0) {
								move_uploaded_file($_FILES['avatar']['tmp_name'], $pathUpload.$_FILES['avatar']['name']);
								$avatar = $_FILES['avatar']['name'];
							}
							// save vao database
							$errorExistUser = '';
							$checkExistUser = $model->checkExistUser($username, $email);

							// check exist username or email
							if ($checkExistUser->num_rows == 0) {
								if ($model->register($username, $password, $name, $email, $phone, $birthday, $avatar) === TRUE) {
									// Dang nhap luon, sau khi dang ky thanh cong
									$login['id'] = $model->get_ID($username)['id'];
									$login['role'] = $model->get_Role($username)['role'];
									$login['username'] = $username;
									$login['name'] = $model->get_Name($username)['name'];
									$login['avatar'] = $model->get_Avatar($username)['avatar'];
									$_SESSION['login'] = $login;
									header("Location: admin.php?controller=user&action=list_user");
								}
							} else {
								$errorExistUser = 'Exist email or username';
							}

						}
						include 'view/users/register_ad.php';
						break;
				case 'logout':
					$this-> checkLoginSession();
					unset($_SESSION['login']);
					include 'view/users/login_ad.php';
				break;
				default:

				break;
			}
		}
		function handleProduct($action, $model) 
		{

			switch ($action) {

				case 'add_product':
					$this-> checkLoginSession();
					$listCategory = $model->listCategory();
					include 'view/products/add_product.php';
					if (isset($_POST['add_product'])) {
						$name = $_POST['product_name'];
						$category = $_POST['category'];
						$description = $_POST['description'];
						$price = $_POST['price'];
						$image = 'default.png';
						$pathUpload = 'webroot/admin/uploads/products/';
						if ($_FILES['image']['error'] == 0) {
							move_uploaded_file($_FILES['image']['tmp_name'], $pathUpload.$_FILES['image']['name']);
							$image = $_FILES['image']['name'];
						}
						// save vao database
						
						if ($model->AddProduct($name, $description,$category, $image, $price) === TRUE) {
							header("Location: admin.php?controller=product&action=list_product");
						}

					}
				break;
				case 'list_product':
					$this-> checkLoginSession();
					$listProduct = $model->listProduct();
					$listCategory = $model->listCategory();
					include 'view/products/list_product.php';
				break;
				case 'edit_product':
					$this-> checkLoginSession();
					$id = $_GET['id'];
					$listCategory = $model->listCategory();
					$editProduct =$model->getEditProduct($id);
					$Category_id= $model->getCategory_id($editProduct['product_category_id']);
					if (isset($_POST['edit_product'])) {
						$name = $_POST['product_name'];
						$category = $_POST['category'];
						$description = $_POST['description'];
						$price = $_POST['price'];
						$image = $editProduct['image'];
						$pathUpload = 'webroot/admin/uploads/products/';
						if ($_FILES['image']['error'] == 0) {
							move_uploaded_file($_FILES['image']['tmp_name'], $pathUpload.$_FILES['image']['name']);
							$image = $_FILES['image']['name'];
						}
						if($model->editProduct($name, $description,$category, $price, $image, $id) === TRUE){
								header("Location: admin.php?controller=product&action=list_product");
							}

						# code...
					}
					include 'view/products/edit_product.php';
				break;
				case 'delete_product':
					$this-> checkLoginSession();
					$id = $_GET['id'];
					if($model->deleteProduct($id) === TRUE){
						header("Location: admin.php?controller=product&action=list_product");
					}
					break;
				default:

				break;
			}
		}

		function handleComment($action, $model) 
		{

			switch ($action) {

				case 'listComment':
					$this-> checkLoginSession();
					$id = $_GET['id'];
					$listComment = $model->listComment($id);
					include 'view/comment/listComment.php';
				break;
				case 'enable':
					# code...
					$id = $_GET['id'];
					$model->Enable_cmt($id);
					$product_id = $model->get_productID($id)['product_id'];
					header("Location: admin.php?controller=comment&action=listComment&id=$product_id");
					break;
				case 'disable':
					# code...
					$id = $_GET['id'];
					$model->Disable_cmt($id);
					$product_id = $model->get_productID($id)['product_id'];
					header("Location: admin.php?controller=comment&action=listComment&id=$product_id");
					break;
				default:

				break;
			}
		}

		function handleOrder($action, $model) 
		{

			switch ($action) {

				case 'listOrder':
					$this-> checkLoginSession();
					$listOrder = $model->listOrder();
					include 'view/orders/listOrders.php';
				break;
				case 'listOrder_Details':
					$this-> checkLoginSession();
					$id = $_GET['id'];
					$listOrder_Details = $model->listOrder_Details($id);
					include 'view/orders/listOrder_Details.php';
				break;
				case 'edit_order':
					# code...
					$id = $_GET['id'];
					$model->duyet($id);
					$listOrder = $model->listOrder();
					include 'view/orders/listOrders.php';
					break;
				default:

				break;
			}
		}

		function checkLoginSession() {
			if ((!isset($_SESSION['login'])) or ($_SESSION['login']['role']) != 'admin') {
				header("Location: admin.php?controller=user&action=login");
			}
		}
		
		
	}
?>