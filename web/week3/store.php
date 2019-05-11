<?php
	session_start();

	if(!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}
	
	if (isset ( $_POST ["buy"] )) {
		if (!in_array($_POST ["buy"], $_SESSION['cart'])) {
			$_SESSION ['cart'][] = $_POST["buy"];
		}
	}
?>
<DOCTYPE! html>
<html>
	<head>
		<title>Store Page</title>
	</head>
	<body>
		<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
		<?php
		echo "hello";
    ?>
		</form>
	</body>
</html>