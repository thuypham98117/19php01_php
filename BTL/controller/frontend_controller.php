<?php 
	include 'model/frontend_model.php';
	class FrontendController {
		function checkLoginSession() {
			if ((!isset($_SESSION['login'])) or ($_SESSION['login']['role']) != 'customer') {
				header("Location: admin.php?controller=user&action=login");
			}
		}
		function handleRequest() {
			$controller = isset($_GET['controller'])?$_GET['controller']:'home';
			$action = isset($_GET['action'])?$_GET['action']:'home';
			switch ($controller) {
				case 'home':
					$this->handeHome();
					break;
				case 'user':
					$this->handleUser($action);
					break;
				case 'product':
					$model = new FrontendModel();
					$this->handleProduct($action, $model);
					break;
				default:
					# code...
					break;
			}
		}
		function handeHome() {
			include('view/home/contentHome.php');
		}
		function handleUser($action) {
				switch ($action) {
					case 'register':
						if (isset($_POST['register'])) {
							$username = $_POST['username'];
							$password = md5($_POST['password']);
							$name = $_POST['name'];
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$birthday = date('Y-m-d', strtotime($_POST['birthday']));
							$avatar = 'avatar.png';
							$pathUpload = 'webroot/admin/uploads/avatar/';
							if ($_FILES['avatar']['error'] == 0) {
								move_uploaded_file($_FILES['avatar']['tmp_name'], $pathUpload.$_FILES['avatar']['name']);
								$avatar = $_FILES['avatar']['name'];
							}
							// save vao database
							$model = new FrontendModel();
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
									header("Location: index.php");
								}
							} else {
								$errorExistUser = 'Exist email or username';
							}

						}
						include 'view/users/register_customer.php';
						break;
					case 'login':
						if (isset($_POST['login'])) {
							$username = $_POST['username'];
							$password = md5($_POST['password']);
							$model = new FrontendModel();
							$checkogin = $model->login($username, $password);
							if ($checkogin->num_rows > 0) {
								$login['role'] = $model->get_Role($username)['role'];
								$login['id'] = $model->get_ID($username)['id'];
								$login['username'] = $username;
								$login['name'] = $model->get_Name($username)['name'];
								$login['avatar'] = $model->get_Avatar($username)['avatar'];
								$_SESSION['login'] = $login;
								header("Location: index.php");
							}
						}
						include 'view/users/login_customer.php';
						# code...
						break;
					case 'logout':
						unset($_SESSION['login']);
						header("Location: index.php");
					default:
						# code...
						break;
				}
		}
		function handleProduct($action, $model) {
			switch ($action) {
				case 'list_product':
					$listProduct = $model->listProduct();
					include 'layout/customers/product_list.php';
					break;
				case 'product_detail':
					$id = $_GET['id'];
					$product = $model->get_Product($id);
					$comment = $model->get_comment($id);
					include 'layout/customers/product_detail.php';
					break;
				case 'comment':
					# code...
				 	$this->checkLoginSession();
					$id = $_GET['id'];
					if (isset($_POST['Comment'])){
						$user_id = $_SESSION['login']['id'];
						$content = $_POST['content'];
						$model->comment($user_id, $id, $content);
					}
					$product = $model->get_Product($id);
					$comment = $model->get_comment($id);
					include 'layout/customers/product_detail.php';
					break;
				case 'add_cart':
					# code...
					$listProduct = $model->listProduct();
					$id = $_GET['id'];
					$product = $model->get_Product($id);
					if (isset($_SESSION['cart'][$id])){
						 $_SESSION['cart'][$id]['quantity']++;
					}
					else {
						$_SESSION['cart'][$id]=array( 
	                        "quantity" => 1, 
	                        "price" => $product['price'] 
	                    );
					}
					include 'layout/customers/product_list.php';
					break;
				case 'add_carts':
					# code...
					$id = $_GET['id'];
					if (isset($_POST['add_carts'])){
						$quantity = $_POST['quantity'];
						$product = $model->get_Product($id);
						if (isset($_SESSION['cart'][$id])){
							 $_SESSION['cart'][$id]['quantity'] += $quantity;
						}
						else {
							$_SESSION['cart'][$id]=array( 
		                        "quantity" => $quantity, 
		                        "price" => $product['price'] 
		                    ); 
						}
					}
					include 'layout/customers/product_detail.php';
					break;
				case 'remove_cart':
					# code...
					$id = $_GET['id'];
					unset($_SESSION['cart'][$id]);
					$_SESSION['cart_quantity']--;
					include 'layout/customers/cart.php';
					break;
				case 'show_cart':
					# code...
					include 'layout/customers/cart.php';
					break;
				case 'order':
					$this->checkLoginSession();
					$user_id = $_SESSION['login']['id'];
					$model->order($user_id);
					$order_id = (int)$model->get_order_id()['id'];
					foreach ($_SESSION['cart'] as $id => $value) {
						# code...
						$model->order_detail($order_id, (int)$id, $_SESSION['cart'][$id]['quantity'], $_SESSION['cart'][$id]['price']);
					}
					unset($_SESSION['cart']);
					unset($_SESSION['cart_quantity']);
					$listProduct = $model->listProduct();
					include 'layout/customers/product_list.php';
					break;
				default:
					# code...
					break;
			}
		}
	}
?>