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
		<title>Confirmation</title>
	</head>
	<body>
		<?php
			try {
				$query = 'INSERT INTO occupy.contractor (name , state) 
				VALUES(:name, :state)';
					
				$statement = $_SESSION['db']->prepare($query);
				
				$statement->bindValue(':name', $_POST['name']);
				$statement->bindValue(':state', $_POST['state']);
				
				$statement->execute();
				
				echo "<p>Contractor Registered</p>";
				
				$contractorId = $_SESSION['db']->lastInsertId("occupy.contractor_id_seq");
				$schedule = $_POST['time'];
				
				foreach ($schedule as $i) {
					$statement = $_SESSION['db']->prepare('INSERT INTO occupy.time (contractor_id, time) VALUES (:id, :time)');
					
					$statement->bindValue(':id', $contractorId);
					$statement->bindValue(':time', $i);
					
					$statement->execute();
				}
				catch (Exception $ex) {
					echo "<p>Appointment did not register".$ex."</p>";
					echo "<button onclick='window.location.href = 'clientForm.php';'>Go back</button>";
					die();
				}
			}
		?>
	</body>
</html>
					