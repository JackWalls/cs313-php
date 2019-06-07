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
		<title>Appointment</title>
	</head>
	<body>
		<h1>Given appointments</h1>
		<div class="tabs">
			<a id="tab" href="chooseContractor.php">Make an Appointment</a>
			<a id="tab" href="login.php">Contractor Login</a>
			<a id="tab" href="addContractor.php">Contractor Sign-up</a>
		</div>
		<hr/>
		<div class="body">
		<table>
		<?php
			$id = $_POST['id'];
			foreach ($_SESSION['db']->query("SELECT * FROM appoint WHERE contractor_id='$id'") as $row) {
				echo"<tr><td>Name: ".$row['firstname']." ".$row['lastname']."</td><td>Tele#: ".$row['telephone']."</td><td>Email: ".$row['email']."</td><td>Time: ".$row['time']."</td></tr>";
				echo"<tr><td>".$row['street']."</td><td></td><td rowspan='2' colspan='2'>Message: ".$row['message']."<td></tr>";
				echo"<tr class='row'><td>".$row['city'].", ".$row['state']."</td><td>".$row['postal']."</td></tr>";
			}
		?>
		</table>
		</div>
		<br><br>
	</body>
</html>
			