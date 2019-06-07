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
		<title>Choose Contractor</title>
	</head>
	<body>
		<h1>Choose a Contractor within your State<h1>
		<form action='clientForm.php' method='post'>
			Available Contractors
			<?php 
				echo "<select name='contractor'>";
				foreach ($db->query('SELECT id, contractor, state FROM occupy.contractor') as $row) {
					echo "<option value=" . $row['id'] . ">" . $row['contractor'] . " -- " . $row['state'] . "</option>";
				}
				echo "</select><br>";
			?>
			Please choose a Contractor within the site to be worked upon.
			<input type="submit">
		</form>
</select> 