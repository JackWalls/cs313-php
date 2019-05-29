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
		<title>Team Activity 6</title>
	</head>
	<body>
		<form method="POST" action="ta6Insert.php">
			Book <input type="text" name="book"/><br>
			Chapter <input type="text" name="chapter"/><br>
			Verse <input type ="text" name="verse"/><br>
			Content <input type="text" name="content"/><br>
			<?php 
				foreach ($_SESSION['db']->query('SELECT id, name FROM topic') as $row) {
					echo "Faith <input type='checkbox' name='fatih' value='".$row['id']."'/><br>";
				}
			?>
			<input type="submit"/>
		</form>
	</body>
</html>