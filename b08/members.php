<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Process</title>
</head>

<body>
	<div id="wrapper">
		<div class="title">MEMBER</div>
		<div id="form">
			<?php
			require_once 'functions.php';
			session_start();

			//Lấy dự liệu time out từ xml
			$xml = simplexml_load_file('./data/timeout.xml');
			$time = $xml->timeout;
			if (isset($_POST['timeout'])) {
				$timeout = $_POST['timeout'];
				$xml->timeout = $timeout;
				file_put_contents('./data/timeout.xml', $xml->asXML());
			}

			//Check time out
			if ($_SESSION['flagPermission'] == true) {
				if ($_SESSION['timeout'] + $time > time()) {
					if ($_SESSION['role'] == 'admin') {
						echo '<h3>Xin chào: ' . $_SESSION['fullName'] . '</h3>';
						echo '<form method="POST" action="">
								<h5>Time Out hiện tại : ' . $time . 's</h5>
								 Set Time Out <input type="text" name="timeout" />
								 <input name="submit" type="submit" value ="Save"/>
							 </form>
								<a href="logout.php">Đăng xuất</a>';
					}else{
						echo '<h3>Xin chào: ' . $_SESSION['fullName'] . '</h3>';
						echo '<a href="logout.php">Đăng xuất</a>';
					}
					
				} else {
					session_unset();
					header('location: login.php');
				}
			} else {
				header('location: login.php');
			}
			?>
		</div>

	</div>
</body>

</html>