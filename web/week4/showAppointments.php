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
		<title>Appointment</title>
	</head>
	<body>
		<h1>Given appointments</h1>
		<?php
			$id = $_POST['contractor'];
			foreach ($_SESSION['db']->query("SELECT * FROM appoint where contractor_id='$id'") as $row) {
				echo"<tr><td>Name: ".$row['name']."</td><td>Tele#: ".$row['telephone']."</td><td>Email: ".$row['email']."</td><td>Time: ".$row['time']."</td></tr>";
				echo"<tr><td>".$row['street']."</td><td></td><td rowspan='2' colspan='2'>Message: ".$row['message']."<td></tr>";
				echo"<tr><td>".$row['city'].", ".$row['state']."</td><td>".$row['postal']."</td></tr>";
			}
		?>
	</body>
</html>
			