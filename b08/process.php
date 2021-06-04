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

			//Time out
			$xml = simplexml_load_file('./data/timeout.xml');
			$time = $xml->timeout;

			// Lấy dự liệu từ file json
			$data = file_get_contents("./data/users.json");
			$data = json_decode($data);
			foreach ($data as $key => $value) {
				$stdArray[$key] = (array) $value;
			}

			//check Time Out
			if ($_SESSION['flagPermission'] == true) {
				if ($_SESSION['timeout'] + $time > time()) {
					if ($_SESSION['role'] == 'member') {
						header('location:members.php');
					} else 	if ($_SESSION['role'] == 'admin') {
						header('location:admin.php');
					}
				} else {
					session_unset();
					header('location: login.php');
				}
			} else {
				if (!checkEmpty($_POST['username']) && !checkEmpty($_POST['password'])) {
					$username 	= $_POST['username'];
					$password 	= md5($_POST['password']);
					foreach ($stdArray as $valueArr) {
						if ($valueArr['username'] == $username && $valueArr['password'] == $password) {
							$_SESSION['fullName'] 		= $valueArr['fullname'];
							$_SESSION['role'] 		= $valueArr['role'];
							$_SESSION['flagPermission'] = true;
							$_SESSION['timeout'] 		= time();
							if ($valueArr['role'] == 'member') header('location:members.php');
							if ($valueArr['role'] == 'admin') header('location:admin.php');
							break;
						} else {
							header('location: login.php');
						}
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