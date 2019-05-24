<?php
	session_start();
	try {
		$dbUrl = getenv('DATABASE_URL');

		$dbOpts = parse_url($dbUrl);

		$dbHost = $dbOpts["host"];
		$dbPort = $dbOpts["port"];
		$dbUser = $dbOpts["user"];
		$dbPassword = $dbOpts["pass"];
		$dbName = ltrim($dbOpts["path"],'/');

		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
		
		$_SESSION['db'] = $db;

		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $ex) {
		echo 'Error!: ' . $ex->getMessage();
		die();
	}
?>
<DOCTYPE! html>
<html>
	<head>
		<title>Client Form</title>
	</head>
	<body>
		<h1>Enter your name and the state that you work in</h1>
		<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
			Name	<input name="firstname" type="text">
			State	<input name="state" type="text"><br> <br>
			<table>
				<tr>
					<th>Check the times that you are unavailable</th>
				</tr>
			<?php
				$count = 9;
				$half = false;
				for ($i = 0; $i <= 17; $i++) {
					if ($count > 12) {
						$time = $count - 12;
					}
					else {
						$time = $count;
					}
					if ($half == true) {
							$half = false;
							echo "<tr><td id = 'closed'><input type='radio' name='time' value='".$time."'>" . $time . ":30</td></tr>";
					}
					else {
							$half = true;
							echo "<tr><td id = 'closed'><input type='radio' name='time' value='".$time."'>" . $time . ":00</td></tr>";
					}
				}
			?>
			</table>
			<input type="submit">
		</form>
	</body>
</html>
						
		