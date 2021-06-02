<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$xhtml = '';
$xml = simplexml_load_file('./timeout.xml');
$time = $xml->timeout;
if (isset($_POST['timeout'])) {
	$timeout = $_POST['timeout'];
	$xml->timeout = $timeout;
	file_put_contents('./timeout.xml', $xml->asXML());
}
$xhmlForm = '<h3>Xin chào: ' . $_SESSION['fullName'] . '</h3>
			<h5>Time Out hiện tại : ' . $time . 's</h5>
			<form method="POST" action="">
			Set Time Out <input type="text" name="timeout" />
			<input name="submit" type="submit" value ="Save"/>
			</form>
			<a href="logout.php">Đăng xuất</a>';
if ($_SESSION['flagPermission'] == true) {
	if ($_SESSION['timeout'] + $time > time()) {
		if ($_SESSION['fullName'] == 'Admin') {
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

	$xhtml = '<form action="process.php" method="post" name="add-form">
		<div class="row">
			<p>Username</p>
			<input type="text" name="username" />
		</div>

		<div class="row">
			<p>Password</p>
			<input type="password" name="password" />
		</div>

		<div class="row">
			<input type="submit" value="Đăng nhập" name="submit">
		</div>
	</form>';
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Login</title>
</head>

<body>
	<div id="wrapper">
		<div class="title">LOGIN</div>
		<div id="form">
			<?= $xhtml; ?>
		</div>

	</div>
</body>

</html>