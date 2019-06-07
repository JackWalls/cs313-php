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
		<link rel="stylesheet" type="text/css" href="mainStyle.css"/>
		<title>New Contractor</title>
	</head>
	<body>
		<h1>Enter your name and the state that you work in</h1>
		<div class="tabs">
			<a id="tab" href="chooseContractor.php">Make an Appointment</a>
			<a id="tab" href="login.php">Contractor Login</a>
			<a id="tab" href="addContractor.php">Contractor Sign-up</a>
		</div>
		<hr/>
		<div class="body">
		<form action='confirmation.php' method='post'>
			Name	<input name="name" type="text">
			State	<input name="state" type="text"><br> <br>
			<table>
				<tr>
					<th>Check the times that you are unavailable</th>
				</tr>
				<tr></tr>
			<?php
				$count = 9;
				$half = false;
				for ($i = 0; $i <= 16; $i++) {
					if ($count > 12) {
						$time = $count - 12;
					}
					else {
						$time = $count;
					}
					if ($half == true) {
							$half = false;
							echo "<tr class='row'><td id = 'closed'><input type='checkbox' name='time[]' value='".$time.":30'>" . $time . ":30</td></tr>";
							$count = $count + 1;
					}
					else {
							$half = true;
							echo "<tr class='row'><td id = 'closed'><input type='checkbox' name='time[]' value='".$time.":00'>" . $time . ":00</td></tr>";
					}
				}
			?>
			</table><br><br>
			<input type="submit"><br><br>
		</form>
		</div>
	</body>
</html>
						
		