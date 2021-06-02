<?php
error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Process</title>
</head>

<body>
	<div id="wrapper">
		<div class="title">PROCESS</div>
		<div id="form">
			<?php
			require_once 'functions.php';
			session_start();
			$xml = simplexml_load_file('./timeout.xml');
			$time = $xml->timeout;
			if (isset($_POST['timeout'])) {
				$timeout = $_POST['timeout'];
				$xml->timeout = $timeout;
				file_put_contents('./timeout.xml', $xml->asXML());
			}		
			$xhmlForm = '<form method="POST" action="">
						<h5>Time Out hiện tại : '.$time.'s</h5>
			 			Set Time Out <input type="text" name="timeout" />
			 			<input name="submit" type="submit" value ="Save"/>
			  			</form>
						<a href="logout.php">Đăng xuất</a>';
			if ($_SESSION['flagPermission'] == true) {
				if ($_SESSION['timeout'] + $time > time()) {
					if ($_SESSION['fullName'] == 'Admin') {
						echo '<h3>Xin chào: ' . $_SESSION['fullName'] . '</h3>';
						echo $xhmlForm;
					} else {
						echo '<h3>Xin chào: ' . $_SESSION['fullName'] . '</h3>';
						echo '<a href="logout.php">Đăng xuất</a>';
					}
				} else {
					session_unset();
					header('location: login.php');
				}
			} else {
				if (!checkEmpty($_POST['username']) && !checkEmpty($_POST['password'])) {
					$username 	= $_POST['username'];
					$password 	= md5($_POST['password']);
					$data = file_get_contents("./users.json");
					$data = json_decode($data);
					foreach ($data as $key => $value) {
						$stdArray[$key] = (array) $value;
					}
					$userInfo = $stdArray[$username];

					if ($userInfo['username'] == $username && $userInfo['password'] == $password) {
						$_SESSION['fullName'] 		= $userInfo['fullname'];
						$_SESSION['flagPermission'] = true;
						$_SESSION['timeout'] 		= time();
						if ($username == 'admin') {
							echo '<h3>Xin chào: ' . $_SESSION['fullName'] . '</h3>';
							echo $xhmlForm;
						} else {
							echo '<h3>Xin chào: ' . $_SESSION['fullName'] . '</h3>';
							echo '<a href="logout.php">Đăng xuất</a><br/>';
						}
					} else {
						header('location: login.php');
					}
				} else {
					header('location: login.php');
				}
			}
			?>
		</div>

	</div>
</body>

</html>