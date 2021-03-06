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
		<title>Confirmation</title>
	</head>
	<body>
		<h1>Confirmation</h1>
		<div class="tabs">
			<a id="tab" href="chooseContractor.php">Make an Appointment</a>
			<a id="tab" href="login.php">Contractor Login</a>
			<a id="tab" href="addContractor.php">Contractor Sign-up</a>
		</div>
		<hr/>
		<div class="body">
		<?php
			try {
				$query = 'INSERT INTO occupy.contractor (contractor, state) 
				VALUES(:name, :state)';
					
				$statement = $_SESSION['db']->prepare($query);
				
				$statement->bindValue(':name', $_POST['name']);
				$statement->bindValue(':state', $_POST['state']);
				
				$statement->execute();
				
				echo "<p>Contractor Registered</p>";
				
				$contractorId = $_SESSION['db']->lastInsertId("occupy.contractor_id_seq");
				echo "<p>Your ID: ".$contractorId."</p><br><br>";
				$schedule = $_POST['time'];
				
				if(!empty($schedule)) {
					foreach ($schedule as $i) {
						$statement = $_SESSION['db']->prepare('INSERT INTO occupy.time (contractor_id, time) VALUES (:id, :time)');
					
						$statement->bindValue(':id', $contractorId);
						$statement->bindValue(':time', $i);
					
						$statement->execute();
					}
				}
			}
			catch (Exception $ex) {
				echo "<p>Appointment did not register".$ex."</p>";
				echo "<button onclick='window.location.href = 'addContractor.php';'>Go back</button>";
				die();
			}
		?>
		</div>
	</body>
</html>
					