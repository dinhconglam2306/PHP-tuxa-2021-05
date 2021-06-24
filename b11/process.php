<?php
error_reporting(E_ALL & ~E_NOTICE);
require_once 'libs/functions.php';
require_once 'define.php';
require_once 'connectLogin.php';
session_start();
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
		
			//Time out
			$xml = simplexml_load_file(DIR_DATA.'timeout.xml');
			$time = $xml->timeout;
			//check Time Out
			if ($_SESSION['flagPermission'] == true) {
				if ($_SESSION['timeout'] + $time > time()) {
					redirect('admin/list.php');
				} else {
					session_unset();
					redirect('index.php');
				}
			} else {
				if (!checkEmpty($_POST['username']) && !checkEmpty($_POST['password'])) {
					$username 	= $_POST['username'];
					$password 	= md5($_POST['password']);

					$query = "SELECT `id`, `username`, `password` FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
					$userInfo =$database->singleRecord($query);
					if (!empty($userInfo)) {
						$_SESSION['flagPermission'] = true;
						$_SESSION['timeout'] 		= time();
						redirect('admin/list.php');
					} else {
						redirect('index.php');
					}
				} else {
					redirect('index.php');
				}
			}
			?>
		</div>

	</div>
</body>

</html>